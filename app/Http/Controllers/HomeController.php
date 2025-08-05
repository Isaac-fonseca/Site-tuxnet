<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public function index()
    {


        $lojasPath = storage_path('app/data/lojas.json');
        if (!File::exists($lojasPath)) {
            $lojasPorCidade = [];
        } else {
            $lojasJson = File::get($lojasPath);
            $lojasPorCidade = json_decode($lojasJson, true);
        }
        ksort($lojasPorCidade);

        $path = storage_path('app/data/planos.json');
        if (!File::exists($path)) {
            $planos = [];
        } else {
            $json_data = File::get($path);
            $planos = json_decode($json_data, true);
        }

        $planosDestaque = array_filter($planos, function($plano) {
            return isset($plano['destaque']) && $plano['destaque'] === true;
        });

       
        return view('home', [
            'lojasPorCidade' => $lojasPorCidade,
            'planosDestaque' => $planosDestaque
        ]);
    }
}
