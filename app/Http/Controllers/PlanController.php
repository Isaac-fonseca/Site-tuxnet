<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        $servicos = [
            [
                'categoria' => 'Linha Móvel',
                'icone' => 'bi-phone',
                'titulo' => 'Linha Móvel',
                'descricao' => 'Planos móveis com cobertura nacional e dados ilimitados.',
            ],
            [
                'categoria' => 'Linha Fixa',
                'icone' => 'bi-telephone',
                'titulo' => 'Linha Fixa',
                'descricao' => 'Telefone fixo com tarifas competitivas e qualidade de áudio.',
            ],
            [
                'categoria' => 'Internet Banda Larga',
                'icone' => 'bi-wifi',
                'titulo' => 'Internet Banda Larga',
                'descricao' => 'Conexão rápida e estável para sua casa ou empresa.',
            ],
            [
                'categoria' => 'Link Dedicado',
                'icone' => 'bi-diagram-3',
                'titulo' => 'Link Dedicado',
                'descricao' => 'Internet corporativa com velocidade e estabilidade garantida.',
            ],
            [
                'categoria' => 'Hospedagem de Servidores',
                'icone' => 'bi-hdd-network',
                'titulo' => 'Hospedagem de Servidores',
                'descricao' => 'Infraestrutura de ponta para seus sistemas e dados.',
            ],
            [
                'categoria' => 'Serviços de Valor Agregado (SVA)',
                'icone' => 'bi-stars',
                'titulo' => 'Serviços de Valor Agregado',
                'descricao' => 'MAX, Deezer, Antivírus, Globoplay, PlayKids e mais.',
            ],
            [
                'categoria' => 'PABX Cloud',
                'icone' => 'bi-cloud-check',
                'titulo' => 'PABX Cloud',
                'descricao' => 'Central telefônica em nuvem, com mobilidade e economia.',
            ],
        ];

        return view('planos', compact('servicos'));
    }
}