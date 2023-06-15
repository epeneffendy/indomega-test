<?php

namespace App\Controllers\Admin;

use App\Models\Ships;
use Config\Services;
use PSpell\Config;

class ShipsController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model  = new Ships();
    }

    public function index()
    {
        $data['title'] = 'Ships';
        $data['models'] = $this->model->findAll();
        return view('admin/ships/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Create Ship';
        $data['isNewRecord'] = true;
        $data['validation'] = \Config\Services::validation();
        return view('admin/ships/form', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'ship_name' => 'required',
            'flag' => 'required',
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/ships/create')->withInput()->with('validation', $validation);
        };

        $post = $this->request->getPost();
        if (isset($post['isNewRecord'])) {
            $this->model->save([
                'ship_name' => $post['ship_name'],
                'flag' => $post['flag'],
            ]);
        } else {
            $this->model->save([
                'id' => $post['id'],
                'ship_name' => $post['ship_name'],
                'flag' => $post['flag'],
            ]);
        }
        session()->setFlashdata('success', 'Data saved successfully!');
        return redirect()->to('/ships');
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

    public function delete($id = null)
    {
        $this->model->delete($id);
        session()->setFlashdata('success', 'Data deleted successfully!');
        return redirect()->to('/ships');
    }
}