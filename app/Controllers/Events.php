<?php

namespace App\Controllers;

use App\Models\EventModel;
use App\Models\EventRegistrationModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Events extends BaseController
{
    protected $eventModel;
    protected $regModel;

    public function __construct()
    {
        $this->eventModel = new EventModel();
        $this->regModel   = new EventRegistrationModel();
    }

    /** Daftar semua kegiatan */
    public function index(): string
    {
        $type   = $this->request->getGet('type');
        $builder = $this->eventModel->orderBy('date', 'DESC');
        if ($type) {
            $builder->where('type', $type);
        }

        $events = $builder->findAll();
        $types  = array_unique(array_column(
            $this->eventModel->select('type')->findAll(), 'type'
        ));

        return view('events_list', [
            'events'      => $events,
            'types'       => $types,
            'active_type' => $type,
        ]);
    }

    /** Detail kegiatan */
    public function detail($id): string
    {
        $event = $this->eventModel->find((int) $id);
        if (!$event) {
            throw PageNotFoundException::forPageNotFound();
        }

        $totalReg = $this->regModel->where('event_id', $id)->countAllResults();

        return view('events_detail', [
            'event'    => $event,
            'totalReg' => $totalReg,
        ]);
    }

    /** Form pendaftaran */
    public function registerForm($id): string
    {
        $event = $this->eventModel->find((int) $id);
        if (!$event) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('events_register', ['event' => $event]);
    }

    /** Proses submit pendaftaran */
    public function registerStore($id)
    {
        $event = $this->eventModel->find((int) $id);
        if (!$event) {
            throw PageNotFoundException::forPageNotFound();
        }

        // Validasi
        $rules = [
            'full_name'    => ['label' => 'Nama Lengkap', 'rules' => 'required|min_length[3]|max_length[150]'],
            'institution'  => ['label' => 'Institusi',    'rules' => 'required|max_length[200]'],
            'email'        => ['label' => 'Email',        'rules' => 'required|valid_email|max_length[150]'],
            'phone'        => ['label' => 'No. HP',       'rules' => 'required|max_length[20]'],
            'role'         => ['label' => 'Peran',        'rules' => 'required|in_list[Mahasiswa,Dosen,Umum]'],
            'study_program'=> ['label' => 'Program Studi','rules' => 'permit_empty|max_length[150]'],
            'notes'        => ['label' => 'Catatan',      'rules' => 'permit_empty|max_length[1000]'],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $email = $this->request->getPost('email', FILTER_SANITIZE_EMAIL);

        // Cek duplikasi
        if ($this->regModel->alreadyRegistered((int) $id, $email)) {
            return redirect()->back()->withInput()->with('error', 'Email ini sudah terdaftar untuk kegiatan tersebut.');
        }

        $this->regModel->insert([
            'event_id'      => (int) $id,
            'full_name'     => strip_tags($this->request->getPost('full_name')),
            'institution'   => strip_tags($this->request->getPost('institution')),
            'email'         => $email,
            'phone'         => strip_tags($this->request->getPost('phone')),
            'study_program' => strip_tags($this->request->getPost('study_program')),
            'role'          => $this->request->getPost('role'),
            'notes'         => strip_tags($this->request->getPost('notes')),
            'status'        => 'pending',
        ]);

        return redirect()->to('/events/' . $id . '/register/success')
                         ->with('reg_name', $this->request->getPost('full_name'))
                         ->with('reg_event', $event['title']);
    }

    /** Halaman sukses */
    public function registerSuccess($id): string
    {
        $event = $this->eventModel->find((int) $id);
        return view('events_register_success', [
            'event'     => $event,
            'reg_name'  => session()->getFlashdata('reg_name'),
            'reg_event' => session()->getFlashdata('reg_event'),
        ]);
    }
}
