<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class FetchController extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }
    // Ajax
    public function index($table)
    {
        $data =  $this->db->table($table)->get()->getResult();

        return $this->response->setJSON($data);
    }

    public function getTicket($id)
    {
        $tickets = $this->ticketModel->getTicketBy($id);

        return $this->response->setJSON($tickets);
    }
}
