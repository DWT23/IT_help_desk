<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use ArrayObject;

class TicketChatsController extends BaseController
{
    public function index($ticketId)
    {
        $ticketChat = $this->ticketChatModel->ticket($ticketId);

        return $this->response->setJSON($ticketChat);
    }
    public function create()
    {
        $dataObject = new ArrayObject($this->request->getPost());
        $data = $dataObject->getArrayCopy();

        $this->ticketChatModel->insert($data);

        return csrf_hash();
    }
}
