<?php

namespace App\Models;

use CodeIgniter\Model;

class TicketChatModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'ticket_chats';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = ['ticket_id', 'sender_id', 'message', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';

    // Relationship dengan model Ticket
    public function ticket($id)
    {
        $builder = $this->db->table('ticket_chats');
        $builder->join('tickets', 'ticket_chats.ticket_id = tickets.ticket_id', 'left');
        $builder->join('employees', 'ticket_chats.sender_id = employees.nip', 'left');
        $builder->where('ticket_chats.ticket_id', $id);
        // $query = $builder->getWhere(['ticket_chats.ticket_id' => $id]);
        $query = $builder->get();
        return $query->getResult();
    }

    // Relationship dengan model Employee (sender)
    public function sender()
    {
        return $this->belongsTo(EmployeeModel::class, 'sender_id', 'id');
    }
}
