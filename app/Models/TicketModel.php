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
        'organization',
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

    public function getEmployee()
    {
        $builder = $this->db->table('tickets');
        $builder->join('employees', 'employees.nip = tickets.creator');
        $query = $builder->get();
        return $query->getResult();
    }

    public function getTicketBy($id)
    {
        $builder = $this->db->table('tickets');
        $builder->join('employees', 'employees.nip = tickets.creator');
        $query = $builder->getWhere(['id' => $id]);
        return $query->getRow();
    }
}
