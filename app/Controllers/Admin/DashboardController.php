<?php

namespace App\Controllers\Admin;

class DashboardController extends BaseController
{
    public function index()
    {
        return view('admin/layouts/main_layout');
    }
}
