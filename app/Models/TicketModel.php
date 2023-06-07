<?php

namespace App\Models;

use CodeIgniter\Model;

class TicketModel extends Model
{
    protected $table = 'tickets';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'summary',
        'assignee',
        'creator',
        'organization_id',
        'description',
        'priority',
        'category',
        'status',
        'created',
        'updated',
        'due_date',
        'response_time',
        'close_time',
    ];

    protected $useTimestamps = true;

    public function countAll()
    {
        $builder = $this->db->table('tickets');
        return $builder->countAll();
    }

    public function getAllReference()
    {
        $builder = $this->db->table('tickets');
        $builder->join('employees', 'employees.nip = tickets.creator', 'left');
        $builder->join('organizations', 'organizations.id = tickets.organization_id', 'left');
        // $builder->where('ticket_chats.ticket_id', $id);
        // $query = $builder->getWhere(['ticket_chats.ticket_id' => $id]);
        $query = $builder->get();
        return $query->getResult();
    }

    public function getEmployee()
    {
        $builder = $this->db->table('tickets');
        $builder->join('employees', 'employees.nip = tickets.creator');
        $query = $builder->get();
        return $query->getResult();
    }

    public function getTicketBy($id)
    {
        $query = $this->db->table('tickets')
            ->join('employees', 'employees.nip = tickets.creator')
            ->join('organizations', 'organizations.id = tickets.organization_id')
            ->where('tickets.ticket_id', $id)
            ->get();
        return $query->getRow();
    }
}
