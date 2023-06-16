<?php

namespace App\Controllers\Admin;

use App\Models\Pricing;
use App\Models\Ships;
use App\Models\Rents;

class DashboardController extends BaseController
{
    protected $ships, $pricing, $rents;

    public function __construct()
    {
        $this->pricing  = new Pricing();
        $this->ships = new Ships();
        $this->rents = new Rents();
    }


    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['ships'] = $this->ships->findAll();
        $data['pricing'] = $this->pricing->findAll();
        $data['rents'] = $this->rents->findAll();
        return view('admin/dashboard/index', $data);
    }
}