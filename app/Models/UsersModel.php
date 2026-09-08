<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
     protected $table            = 'users';     
     protected $primaryKey       = 'id';     
     protected $useAutoIncrement = true;     
     protected $returnType       = 'array';     
     protected $useSoftDeletes   = false;     
     protected $protectFields    = true;     
     protected $allowedFields    = ['name', 'username', 'email', 'password']; 
      protected bool $allowEmptyInserts = false;     
      protected bool $updateOnlyChanged = true;       
      // Dates     
      protected $useTimestamps = true;     
      protected $dateFormat    = 'datetime';     
      protected $createdField  = 'created_at';     
      protected $updatedField  = 'updated_at';       
      // Validasi utama tetap dilakukan di controller (AuthController) via $this->validate(),     
      // // supaya pesan errornya bisa ditampilkan rapi di form register.     
      protected $validationRules      = [];     
      protected $validationMessages   = [];     
      protected $skipValidation       = false;       
      // Callbacks: password otomatis di-hash setiap insert/update     
      protected $allowCallbacks = true;     
      protected $beforeInsert   = ['hashPassword'];     
      protected $beforeUpdate   = ['hashPassword'];       
      protected function hashPassword(array $data)     
      {         
        if (isset($data['data']['password']) && $data['data']['password'] !== '') {
                         $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);         
                         }         
                         return $data;     
                         } 
     
}
