<?php

namespace App\Controllers\Admin;

class DashboardController extends BaseController
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        return view('admin/dashboard/index', $data);
    }
}
