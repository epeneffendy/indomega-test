<?php

namespace App\Models;

use CodeIgniter\Model;

class Rents extends Model
{
    protected $table            = 'rents';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['ship_id', 'rent_start', 'duration_in_day', 'pricing_id', 'renter'];

    public function getAll()
    {
        $data = $this->db->table('rents');
        $data->join('ships', 'ships.id = rents.ship_id');
        $data->join('pricing', 'pricing.id = rents.pricing_id');
        $query = $data->get()->getResult();
        return $query;
    }

    public function getById($id)
    {
        return $this->where('id', $id)->first();
    }
}