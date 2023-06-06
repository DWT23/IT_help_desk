<?php

namespace App\Models;

use CodeIgniter\Model;

class TicketChatModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'ticketchats';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = ['ticket_id', 'sender_id', 'message', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    // Relationship dengan model Ticket
    public function ticket()
    {
        return $this->belongsTo(TicketModel::class, 'ticket_id', 'id');
    }

    // Relationship dengan model Employee (sender)
    public function sender()
    {
        return $this->belongsTo(EmployeeModel::class, 'sender_id', 'id');
    }
}
