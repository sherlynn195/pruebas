<?php

namespace App\Http\Controllers\Gerente;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('gerente.dashboard');
    }
}