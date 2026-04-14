<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\IndividualMemberModel;
use App\Models\MemberInstitutionModel;
use App\Models\BoardMemberModel;

class Members extends BaseController
{
    protected $individualModel;
    protected $institutionModel;
    protected $boardModel;

    public function __construct()
    {
        $this->individualModel = new IndividualMemberModel();
        $this->institutionModel = new MemberInstitutionModel();
        $this->boardModel = new BoardMemberModel();
    }

    public function index()
    {
        $data = [
            'id_members'  => $this->individualModel->orderBy('name', 'ASC')->findAll(),
            'inst_members' => $this->institutionModel->orderBy('name', 'ASC')->findAll(),
            'board_members' => $this->boardModel->orderBy('order', 'ASC')->findAll(),
            'title'        => 'Manajemen Anggota & Instansi'
        ];

        return view('admin/members/index', $data);
    }

    // --- Individual Members ---
    public function createIndividual()
    {
        $data = ['title' => 'Tambah Anggota Individu'];
        return view('admin/members/individual_form', $data);
    }

    public function storeIndividual()
    {
        if (!$this->validate([
            'employeeNumber' => 'required',
            'name'           => 'required',
            'affiliation'    => 'required',
            'validityPeriod' => 'required|valid_date'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->individualModel->save($this->request->getPost());
        return redirect()->to('/admin/members')->with('success', 'Anggota individu berhasil ditambahkan');
    }

    public function editIndividual($id)
    {
        $member = $this->individualModel->find($id);
        if (!$member) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        $data = ['title' => 'Edit Anggota Individu', 'member' => $member];
        return view('admin/members/individual_form', $data);
    }

    public function updateIndividual($id)
    {
        if (!$this->validate([
            'name' => 'required',
            'affiliation' => 'required'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->individualModel->update($id, $this->request->getPost());
        return redirect()->to('/admin/members')->with('success', 'Anggota individu berhasil diperbarui');
    }

    public function deleteIndividual($id)
    {
        $this->individualModel->delete($id);
        return redirect()->to('/admin/members')->with('success', 'Anggota individu berhasil dihapus');
    }

    // --- Institutional Members ---
    public function createInstitution()
    {
        $data = ['title' => 'Tambah Instansi Anggota'];
        return view('admin/members/institution_form', $data);
    }

    public function storeInstitution()
    {
        if (!$this->validate([
            'name' => 'required',
            'type' => 'required'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->institutionModel->save($this->request->getPost());
        return redirect()->to('/admin/members')->with('success', 'Instansi berhasil ditambahkan');
    }

    public function editInstitution($id)
    {
        $member = $this->institutionModel->find($id);
        if (!$member) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        $data = ['title' => 'Edit Instansi Anggota', 'member' => $member];
        return view('admin/members/institution_form', $data);
    }

    public function updateInstitution($id)
    {
        if (!$this->validate(['name' => 'required'])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->institutionModel->update($id, $this->request->getPost());
        return redirect()->to('/admin/members')->with('success', 'Instansi berhasil diperbarui');
    }

    public function deleteInstitution($id)
    {
        $this->institutionModel->delete($id);
        return redirect()->to('/admin/members')->with('success', 'Instansi berhasil dihapus');
    }

    // --- Board Members ---
    public function createBoard()
    {
        $data = ['title' => 'Tambah Pengurus (Board)'];
        return view('admin/members/board_form', $data);
    }

    public function storeBoard()
    {
        if (!$this->validate([
            'name'       => 'required',
            'position'   => 'required',
            'department' => 'required',
            'period'     => 'required'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->boardModel->save($this->request->getPost());
        return redirect()->to('/admin/members')->with('success', 'Pengurus berhasil ditambahkan');
    }

    public function editBoard($id)
    {
        $member = $this->boardModel->find($id);
        if (!$member) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        $data = ['title' => 'Edit Pengurus (Board)', 'member' => $member];
        return view('admin/members/board_form', $data);
    }

    public function updateBoard($id)
    {
        if (!$this->validate(['name' => 'required'])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->boardModel->update($id, $this->request->getPost());
        return redirect()->to('/admin/members')->with('success', 'Pengurus berhasil diperbarui');
    }

    public function deleteBoard($id)
    {
        $this->boardModel->delete($id);
        return redirect()->to('/admin/members')->with('success', 'Pengurus berhasil dihapus');
    }
}
