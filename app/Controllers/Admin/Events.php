<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\EventModel;

class Events extends BaseController
{
    protected $eventModel;

    public function __construct()
    {
        $this->eventModel = new EventModel();
    }

    public function index()
    {
        $data = [
            'events' => $this->eventModel->orderBy('date', 'DESC')->findAll(),
            'title'  => 'Manajemen Kegiatan'
        ];

        return view('admin/events/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Kegiatan Baru',
            'types' => ['conference', 'workshop', 'seminar', 'webinar']
        ];

        return view('admin/events/form', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'title'    => 'required|min_length[5]|max_length[255]',
            'date'     => 'required|valid_date',
            'location' => 'required',
            'type'     => 'required',
            'status'   => 'required|in_list[open,closed]'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->eventModel->save([
            'title'       => $this->request->getPost('title'),
            'date'        => $this->request->getPost('date'),
            'location'    => $this->request->getPost('location'),
            'type'        => $this->request->getPost('type'),
            'status'      => $this->request->getPost('status'),
            'description' => $this->request->getPost('description'),
            'link'        => $this->request->getPost('link') ?: null,
        ]);

        return redirect()->to('/admin/events')->with('success', 'Kegiatan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $event = $this->eventModel->find($id);

        if (!$event) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title' => 'Edit Kegiatan',
            'event' => $event,
            'types' => ['conference', 'workshop', 'seminar', 'webinar']
        ];

        return view('admin/events/form', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'title'    => 'required|min_length[5]|max_length[255]',
            'date'     => 'required|valid_date',
            'location' => 'required',
            'type'     => 'required',
            'status'   => 'required|in_list[open,closed]'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->eventModel->update($id, [
            'title'       => $this->request->getPost('title'),
            'date'        => $this->request->getPost('date'),
            'location'    => $this->request->getPost('location'),
            'type'        => $this->request->getPost('type'),
            'status'      => $this->request->getPost('status'),
            'description' => $this->request->getPost('description'),
            'link'        => $this->request->getPost('link') ?: null,
        ]);

        return redirect()->to('/admin/events')->with('success', 'Kegiatan berhasil diperbarui');
    }

    public function delete($id)
    {
        $this->eventModel->delete($id);
        return redirect()->to('/admin/events')->with('success', 'Kegiatan berhasil dihapus');
    }
}
