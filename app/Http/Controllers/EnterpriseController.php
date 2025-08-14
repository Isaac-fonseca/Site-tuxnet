<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnterpriseController extends Controller
{
    
    public function index()
    {

        return view('empresas');
    }
}
