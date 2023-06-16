<?php

namespace App\Models;

use CodeIgniter\Model;

class Pricing extends Model
{
    protected $table            = 'pricing';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['ship_id', 'price_per_day'];

    public function getAll()
    {
        $data = $this->db->table('pricing');
        $data->join('ships', 'ships.id = pricing.ship_id');
        $query = $data->get()->getResult();
        return $query;
    }

    public function getById($id)
    {
        return $this->where('id', $id)->first();
    }

    public function getByShip($id)
    {
        return $this->where('ship_id', $id)->first();
    }
}