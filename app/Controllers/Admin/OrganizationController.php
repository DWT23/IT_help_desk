<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use ArrayObject;

class OrganizationController extends BaseController
{
    public function index()
    {
        $data['organization'] = $this->organizationModel->findAll();
        return view('pages/data/organization', $data);
    }

    public function create()
    {
        if (!$this->request->getPost()) return view('pages/form/addOrganization');

        $validation = $this->getValidationRules();

        if (!$this->validate($validation)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $dataObject = new ArrayObject($this->request->getPost());
        $data = $dataObject->getArrayCopy();

        $this->organizationModel->insert($data);
        return redirect()->to('organization');
    }

    public function edit($id)
    {
        if (!$this->request->getPost()) {
            $data['organization'] = $this->organizationModel->find($id);

            return view('pages/form/editOrganization', $data);
        }

        $validation = $this->getValidationRules();
        if (!$this->validate($validation)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $dataObject = new ArrayObject($this->request->getPost());
        $data = $dataObject->getArrayCopy();

        $this->organizationModel->update($id, $data);
        return redirect()->to('organization');
    }

    public function delete($id)
    {
        $this->organizationModel->delete($id);
        return redirect()->to('organization');
    }

    private function getValidationRules()
    {
        return [
            'name' => [
                'label'  => 'first_name',
                'rules'  => 'required',
            ],
        ];
    }
}
