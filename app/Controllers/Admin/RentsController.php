<?php

namespace App\Controllers\Admin;

use App\Models\Pricing;
use App\Models\Ships;
use App\Models\Rents;

class RentsController extends BaseController
{
    protected $model, $ships, $pricing;
    protected $js_page = 'rents/rents.js';

    public function __construct()
    {
        $this->model = new Rents();
        $this->pricing  = new Pricing();
        $this->ships = new Ships();
    }

    public function index()
    {
        $data['title'] = 'Rental Ships';
        $data['models'] = $this->model->getAll();
        return view('admin/rents/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Create Rental';
        $data['js_page'] = $this->js_page;
        $data['isNewRecord'] = true;
        $data['ships'] = $this->ships->getShipPrice();
        $data['validation'] = \Config\Services::validation();
        return view('admin/rents/form', $data);
    }

    public function get_price()
    {
        $post = $this->request->getPost();
        $price = $this->pricing->getByShip($post['id']);
        echo json_encode($price);
    }

    public function save()
    {
        $post = $this->request->getPost();
        if (isset($post['isNewRecord'])) {
            $this->model->save([
                'ship_id' => $post['ship_id'],
                'rent_start' => date("Y-m-d", strtotime($post['rent_start'])),
                'duration_in_day' => $post['duration_in_day'],
                'pricing_id' => $post['pricing_id'],
                'renter' => $post['renter'],
            ]);
        } else {
            $this->model->save([
                'id' => $post['id'],
                'ship_id' => $post['ship_id'],
                'rent_start' => date("Y-m-d", strtotime($post['rent_start'])),
                'duration_in_day' => $post['duration_in_day'],
                'pricing_id' => $post['pricing_id'],
                'renter' => $post['renter'],
            ]);
        }
        session()->setFlashdata('success', 'Data saved successfully!');
        return redirect()->to('/rents');
    }

    public function edit($id = null)
    {
        $model = $this->model->getById($id);
        if (isset($model)) {
            $data['title'] = 'Update Ship';
            $data['isNewRecord'] = false;
            $data['model'] = $model;
            return view('admin/ships/form', $data);
        } else {
            session()->setFlashdata('failed', 'Data not found!');
            return redirect()->to('/ships');
        }
    }
}