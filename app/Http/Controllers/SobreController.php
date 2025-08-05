<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// 1. Importe a classe 'File'
use Illuminate\Support\Facades\File;

class SobreController extends Controller
{
    public function index()
    {

        $path = storage_path('app/data/sobre.json');


        if (!File::exists($path)) {

            abort(500, "O arquivo de dados da página Sobre não foi encontrado.");
        }

        $jsonData = File::get($path);
        $data = json_decode($jsonData, true);


        $empresa = $data['empresa'] ?? [];
        $valoresDetalhados = $data['valoresDetalhados'] ?? [];
        $faq = $data['faq'] ?? [];


        return view('sobre', compact('empresa', 'valoresDetalhados', 'faq'));
    }
}
