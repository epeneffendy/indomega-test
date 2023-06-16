<?php

namespace App\Controllers\Admin;

use App\Models\Pricing;
use App\Models\Ships;
use Config\Services;
use PSpell\Config;

class PricingController extends BaseController
{
    protected $model, $ships;

    public function __construct()
    {
        $this->model  = new Pricing();
        $this->ships = new Ships();
    }

    public function index()
    {
        $data['title'] = 'Price';
        $data['models'] = $this->model->getAll();
        return view('admin/pricing/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Create Price';
        $data['isNewRecord'] = true;
        $data['ships'] = $this->ships->findAll();
        $data['validation'] = \Config\Services::validation();
        return view('admin/pricing/form', $data);
    }

    public function save()
    {
        $post = $this->request->getPost();
        if (isset($post['isNewRecord'])) {
            $this->model->save([
                'ship_id' => $post['ship_id'],
                'price_per_day' => $post['price_per_day'],
            ]);
        } else {
            $this->model->save([
                'id' => $post['id'],
                'ship_id' => $post['ship_id'],
                'price_per_day' => $post['price_per_day'],
            ]);
        }
        session()->setFlashdata('success', 'Data saved successfully!');
        return redirect()->to('/pricing');
    }

    public function edit($id = null)
    {
        $model = $this->model->getById($id);
        if (isset($model)) {
            $data['title'] = 'Update Pricing';
            $data['isNewRecord'] = false;
            $data['model'] = $model;
            $data['ships'] = $this->ships->findAll();
            return view('admin/pricing/form', $data);
        } else {
            session()->setFlashdata('failed', 'Data not found!');
            return redirect()->to('/pricing');
        }
    }

    public function delete($id = null)
    {
        $this->model->delete($id);
        session()->setFlashdata('success', 'Data deleted successfully!');
        return redirect()->to('/pricing');
    }
}
