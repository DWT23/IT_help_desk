<?php

namespace App\Controllers;

class HomeController extends BaseController
{

    public function index()
    {
        $data['totalTicket'] = $this->ticketModel->countAll();
        $data['totalUser'] = $this->employeeModel->countAll();
        $data['totalOrganization'] = $this->organizationModel->countAll();
        return view('pages/home', $data);
    }
}
