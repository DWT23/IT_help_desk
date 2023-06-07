<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeeModel extends Model
{
    protected $table = 'employees';
    protected $primaryKey = 'nip';
    protected $allowedFields = [
        'nip',
        'fullname',
        'photo',
        'phone_number',
        'address',
        'email',
        'username',
        'password',
        'birth_date',
        'gender',
    ];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';

    public function countAll()
    {
        $builder = $this->db->table('employees');
        return $builder->countAll();
    }

    protected function beforeInsert(array $data)
    {
        $data = $this->passwordHash($data);
        $data['data']['created_at'] = date('Y-m-d H:i:s');

        return $data;
    }

    protected function beforeUpdate(array $data)
    {
        $data = $this->passwordHash($data);
        $data['data']['updated_at'] = date('Y-m-d H:i:s');
        return $data;
    }

    protected function passwordHash(array $data)
    {
        if (isset($data['data']['password']))
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);

        return $data;
    }
}
