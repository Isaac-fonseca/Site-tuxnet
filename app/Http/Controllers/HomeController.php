<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Precisamos da estrutura detalhada para montar os cards no modal
        $lojasPorCidade = [
             'Riachão do Jacuípe' => [
                [
                    'nome_local' => 'Matriz',
                    'endereco_completo' => 'Rua 2 Lot. Maria Luiza I e II, 49 - Mandacaru, Riachão do Jacuípe/BA - 44640-000',
                    'link_mapa' => 'https://www.google.com/maps/search/?api=1&query=Rua+2+Lot.+Maria+Luiza+I+e+II,+49+-+Mandacaru,+Riachão+do+Jacuípe'
                ],
                [
                    'nome_local' => 'Loja Centro',
                    'endereco_completo' => 'Rua Alexandre Carneiro Figueiredo, 138, Centro, Riachão do Jacuípe/BA - 44640-000',
                    'link_mapa' => 'https://www.google.com/maps/search/?api=1&query=Rua+Alexandre+Carneiro+Figueiredo,+138,+Centro,+Riachão+do+Jacuípe'
                ]
            ],

            'Feira de Santana' => [
                [
                    'nome_local' => 'Loja Campo Limpo',
                    'endereco_completo' => 'Rua Monsenhor Moisés Gonçalves do Couto, 2246, Campo Limpo, Feira de Santana/BA - 44032-491',
                    'link_mapa' => 'https://www.google.com/maps/search/?api=1&query=Rua+Monsenhor+Moisés+Gonçalves+do+Couto,+2246,+Campo+Limpo,+Feira+de+Santana'
                ],
                [
                    'nome_local' => 'Loja Tomba',
                    'endereco_completo' => 'Rua Salmo 38 nº 9 - Tomba, Feira de Santana/BA - 44025-280',
                    'link_mapa' => ''                ],
                [
                    'nome_local' => 'Loja Feira IX',
                    'endereco_completo' => 'Rua E, Feira IX, 340, Feira de Santana/BA - 44024-056',
                    'link_mapa' => 'https://www.google.com/maps/search/?api=1&query=Rua+E,+Feira+IX,+64,+Feira+de+Santana'
                ],
                [
                    'nome_local' => 'Loja Feira VII',
                    'endereco_completo' => 'Rua Comendador Gomes, Feira VII, 64, Feira de Santana/BA - 44024-056',
                    'link_mapa' => ''
                ],
            ],
           
            'Santaluz' => [
                [
                    'nome_local' => 'Loja Centro',
                    'endereco_completo' => 'Praça Major Benicio Viana, 7, Centro, Santaluz/BA - 48880-000',
                    'link_mapa' => 'https://www.google.com/maps/search/?api=1&query=Praça+Major+Benicio+Viana,+7,+Centro,+Santaluz'
                ]
            ],
            'Valente' => [
                [
                    'nome_local' => 'Loja Centro',
                    'endereco_completo' => 'Praça Professor Borges, 6 - Centro, Valente/BA - 48890-000',
                    'link_mapa' => 'https://www.google.com/maps/search/?api=1&query=Praça+Professor+Borges,+6+-+Centro,+Valente'
                ]
            ],
            'Retirolândia' => [
                [
                    'nome_local' => 'Loja Centro',
                    'endereco_completo' => 'Praça 27 de julho, Centro, Retirolândia/BA - 48750-000',
                    'link_mapa' => 'https://www.google.com/maps/search/?api=1&query=Praça+27+de+julho,+Centro,+Retirolândia'
                ]
            ],
            'Ichu' => [],
            'Pé de Serra' => [
                 [
                'nome_local' => 'Loja Centro',
                 'endereco_completo' => 'Praça Ruy barbosa, 5 - centro Pé de Serra/BA',
                  ]
            ],
            'São Domingos' => [],
            'Serra Preta' => [
                [
                 'nome_local' => 'Loja Centro',
                 'endereco_completo' => 'Av. Melquiades Figueiredo 158',
            ]
            ],
        ];
        
        ksort($lojasPorCidade);

        return view('home', [
            'lojasPorCidade' => $lojasPorCidade
        ]);
    }
}