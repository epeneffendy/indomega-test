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

    public function getShipPrice()
    {
        $data = $this->db->table('ships');
        $data->join('pricing', 'ships.id = pricing.ship_id');
        $query = $data->get()->getResult();
        return $query;
    }
}