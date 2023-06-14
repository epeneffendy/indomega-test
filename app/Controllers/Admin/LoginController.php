<?php

namespace App\Controllers\Admin;

class LoginController extends BaseController
{
    public function index()
    {
        return view('admin/authentication/login');
    }
}
