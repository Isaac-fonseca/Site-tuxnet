<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public function index()
    {
        // --- LÓGICA DAS LOJAS ---
        $lojasPath = storage_path('app/data/lojas.json');
        $lojasPorCidade = File::exists($lojasPath) ? json_decode(File::get($lojasPath), true) : [];
        ksort($lojasPorCidade);

        // --- LÓGICA DOS PLANOS ---
        // Lê o arquivo de planos UMA VEZ
        $planosPath = storage_path('app/data/planos.json');
        $planos = File::exists($planosPath) ? json_decode(File::get($planosPath), true) : [];

        // Filtra os planos em destaque
        $planosDestaque = array_values(array_filter($planos, function($plano) {
            return isset($plano['destaque']) && $plano['destaque'] === true;
        }));

        // --- LÓGICA DOS PACOTES E ADICIONAIS ---
        $adicionaisPath = storage_path('app/data/adicionais.json');
        $adicionais = File::exists($adicionaisPath) ? json_decode(File::get($adicionaisPath), true) : [];

        // ADICIONADO: Leitura dos pacotes do carrossel inferior
        $pacotesPath = storage_path('app/data/adicionais-pacotes.json');
        $pacotes = File::exists($pacotesPath) ? json_decode(File::get($pacotesPath), true) : [];


        // --- ENVIA TODAS AS VARIÁVEIS PARA A VIEW ---
        return view('home', [
            'lojasPorCidade' => $lojasPorCidade,
            'planosDestaque' => $planosDestaque,
            'planos' => $planos,
            'adicionais' => $adicionais,
            'pacotes' => $pacotes 
        ]);
    }
}
