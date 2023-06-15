<?php

namespace App\Models;

use CodeIgniter\Model;

class Ships extends Model
{
    protected $table            = 'ships';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['ship_name', 'flag'];

    public function getById($id)
    {
        return $this->where('id', $id)->first();
    }
}