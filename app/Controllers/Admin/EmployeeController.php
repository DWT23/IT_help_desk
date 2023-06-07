<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UniqueKeyModel;

class EmployeeController extends BaseController
{
    protected $uniqueKey;

    public function __construct()
    {
        $this->uniqueKey = new UniqueKeyModel();
    }
    public function index()
    {
        $data['employee'] = $this->employeeModel->findAll();
        return view('pages/data/employee', $data);
    }

    public function create()
    {
        if (!$this->request->getPost()) return view('pages/form/addEmployee');

        $validation = $this->getValidationRules();

        if (!$this->validate($validation)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Generate Unique Key
        $dataForGenerateKey = ['table' => 'employees', 'pk' => $this->request->getPost('pk')];
        $tl = $this->request->getPost('tahun') . "-" . $this->request->getPost('bulan') . "-" . $this->request->getPost('tanggal');
        $primaryKey = $this->uniqueKey->generateUniqueKey($dataForGenerateKey, $tl);

        $fullName = ucfirst($this->request->getPost('first_name')) . ' ' . ucfirst($this->request->getPost('last_name'));
        $data = [
            'nip' => $primaryKey,
            'fullname' => $fullName,
            'phone_number' => $this->request->getPost('phone_number'),
            'address' => $this->request->getPost('alamat'),
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'birth_date' => $tl,
            'gender' => $this->request->getPost('gender'),
        ];
        // Validate Photo
        $gambar = $this->uploadGambar();
        if ($gambar === null) {
            return redirect()->back()->withInput()->with('errors', ['Gambar gagal diunggah.']);
        }
        $data['photo'] = $gambar;

        $this->employeeModel->insert($data);
        return redirect()->to('users');
    }

    public function edit($id)
    {
        if (!$this->request->getPost()) {
            $data['employee'] = $this->employeeModel->find($id);

            $fullName = explode(' ', $data['employee']['fullname']);
            $birthDate = explode('-', $data['employee']['birth_date']);
            $data['employee']['first_name'] = $fullName[0];
            $data['employee']['last_name'] = $fullName[1];

            $data['employee']['tahun'] = $birthDate[0];
            $data['employee']['bulan'] = $birthDate[1];
            $data['employee']['tanggal'] = $birthDate[2];

            return view('pages/form/editEmployee', $data);
        }

        $validation = $this->getValidationRules();
        if ($this->request->getFile('photo')) unset($validation['photo']);

        if (!$this->validate($validation)) {
            dd("test");
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $fullName = ucfirst($this->request->getPost('first_name')) . ' ' . ucfirst($this->request->getPost('last_name'));
        $tl = $this->request->getPost('tahun') . "-" . $this->request->getPost('bulan') . "-" . $this->request->getPost('tanggal');

        $data = [
            'nip' => $id,
            'fullname' => $fullName,
            'phone_number' => $this->request->getPost('phone_number'),
            'address' => $this->request->getPost('alamat'),
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'birth_date' => $tl,
            'gender' => $this->request->getPost('gender'),
        ];


        if ($this->request->getFile('photo')->getName()) {
            $gambar = $this->uploadGambar();
            if ($gambar === null) {
                return redirect()->back()->withInput()->with('errors', ['Gambar gagal diunggah.']);
            }
            $data['photo'] = $gambar;
        } else {
            $data['photo'] = $this->request->getPost('old_photo');
        }

        $this->employeeModel->update($id, $data);
        return redirect()->to('users');
    }

    public function delete($id)
    {
        $csrfToken = $this->request->getHeaderLine('X-CSRF-Token');
        // if (!csrf_verify($csrfToken)) {
        //     return $this->response->setStatusCode(403)->setJSON(['message' => 'Invalid CSRF token']);
        // }
        $this->employeeModel->delete($id);
    }

    private function getValidationRules()
    {
        return [
            'first_name' => [
                'label'  => 'first_name',
                'rules'  => 'required',
            ],
            'photo' => 'uploaded[photo]|max_size[photo,1024]|is_image[photo]',
            'alamat' => [
                'label'  => 'alamat',
                'rules'  => 'required',
            ],
            'email' => [
                'label'  => 'email',
                'rules'  => 'required',
            ],
            'username' => [
                'label'  => 'username',
                'rules'  => 'required',
            ],
            'password' => [
                'label'  => 'password',
                'rules'  => 'required',
            ],
            'tanggal' => 'required|integer',
            'bulan' => 'required',
            'tahun' => 'required|integer',
            'gender' => 'required|in_list[Male,Female]',
        ];
    }

    private function uploadGambar()
    {
        // Upload gambar jika ada
        if ($gambarFile = $this->request->getFile('photo')) {
            if ($gambarFile->isValid() && !$gambarFile->hasMoved()) {
                $gambarFileName = $gambarFile->getRandomName();
                $gambarFile->move(ROOTPATH . 'public/img/uploads', $gambarFileName);
                return $gambarFileName;
            }
        }
    }
}
