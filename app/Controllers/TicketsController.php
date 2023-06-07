<?php

namespace App\Controllers;

use ArrayObject;

class TicketsController extends BaseController
{
    public function index()
    {
        $data['tickets'] = $this->ticketModel->getAllReference();
        return view('pages/data/tickets', $data);
    }

    public function create()
    {
        $validation = $this->getValidationRules();

        if (!$this->validate($validation)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $dataObject = new ArrayObject($this->request->getPost());
        $data = $dataObject->getArrayCopy();
        $data['status'] = "open";

        $this->ticketModel->insert($data);
        return redirect()->to('tickets');
    }

    private function getValidationRules()
    {
        return [
            'summary' => [
                'label'  => 'summary',
                'rules'  => 'required',
            ],
            'organization_id' => [
                'label'  => 'organization_id',
                'rules'  => 'required',
            ],
            'creator' => [
                'label'  => 'creator',
                'rules'  => 'required',
            ],
            'priority' => [
                'label'  => 'priority',
                'rules'  => 'required',
            ],
            'category' => [
                'label'  => 'category',
                'rules'  => 'required',
            ],
        ];
    }
    private function uploadGambar()
    {
        // Upload gambar jika ada
        if ($file = $this->request->getFile('attach_file')) {
            if ($file->isValid() && !$file->hasMoved()) {
                $fileName = $file->getRandomName();
                $file->move(ROOTPATH . 'public/file/ticket', $fileName);
                return $fileName;
            }
        }
    }
}
