<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PlanController extends Controller
{
    public function index(Request $request)
    {
        
        $planosVoceCarousel = [
            
            ['id_plano_link' => '#planos-boleto', 'nome' => 'Nossos Combos', 'imagem' => '500.png', 'alt' => 'Conheça Nossos Combos'],
            ['id_plano_link' => '#planos-empresas', 'nome' => 'Soluções Empresariais', 'imagem' => '700.png', 'alt' => 'Planos para Empresas'],
            ['id_plano_link' => '#planos-chip', 'nome' => 'Planos Móveis', 'imagem' => '900.png', 'alt' => 'Nossos Planos de Chip'],
            ['id_plano_link' => '#planos-fixo', 'nome' => 'Telefonia Fixa', 'imagem' => '1100.png', 'alt' => 'Planos com Telefone Fixo'],
        ];

       

        $combosBoleto = [
            ['id_plano' => 'boleto-100', 'nome_plano_card' => '100 MEGA', 'preco' => '69,99', 'tipo_pagamento' => 'BOLETO', 'observacao' => '*SOB CONSULTA DE VIABILIDADE', 'instalacao_info' => 'INSTALAÇÃO GRATUITA 100% FIBRA', 'inclusos' => ['100% Fibra Óptica', 'Instalação inclusa', 'Wi-fi de alta performance', 'Assistência Premium 24h', 'Upload 50% da velocidade'], 'destaque' => false, 'link_contratar' => '#'],
            ['id_plano' => 'boleto-400', 'nome_plano_card' => '400 MEGA', 'preco' => '79,99', 'tipo_pagamento' => 'BOLETO', 'observacao' => '*SOB CONSULTA DE VIABILIDADE', 'instalacao_info' => 'INSTALAÇÃO GRATUITA 100% FIBRA', 'inclusos' => ['100% Fibra Óptica', 'Instalação inclusa', 'Wi-fi de alta performance', 'Assistência Premium 24h', 'Upload 50% da velocidade'], 'destaque' => false, 'link_contratar' => '#'],
            ['id_plano' => 'boleto-600', 'nome_plano_card' => '600 MEGA', 'preco' => '89,99', 'tipo_pagamento' => 'BOLETO', 'observacao' => '*SOB CONSULTA DE VIABILIDADE', 'instalacao_info' => 'INSTALAÇÃO GRATUITA 100% FIBRA', 'inclusos' => ['100% Fibra Óptica', 'Instalação inclusa', 'Wi-fi de alta performance', 'Assistência Premium 24h', 'Upload 50% da velocidade'], 'destaque' => true, 'link_contratar' => '#'],
            ['id_plano' => 'boleto-800', 'nome_plano_card' => '800 MEGA', 'preco' => '109,99', 'tipo_pagamento' => 'BOLETO', 'observacao' => '*SOB CONSULTA DE VIABILIDADE', 'instalacao_info' => 'INSTALAÇÃO GRATUITA 100% FIBRA', 'inclusos' => ['100% Fibra Óptica', 'Instalação inclusa', 'Wi-fi de alta performance', 'Assistência Premium 24h', 'Upload 50% da velocidade'], 'destaque' => false, 'link_contratar' => '#'],
            ['id_plano' => 'boleto-1gb', 'nome_plano_card' => '1 GB', 'preco' => '134,99', 'tipo_pagamento' => 'BOLETO', 'observacao' => '*SOB CONSULTA DE VIABILIDADE', 'instalacao_info' => 'INSTALAÇÃO GRATUITA 100% FIBRA', 'inclusos' => ['100% Fibra Óptica', 'Instalação inclusa', 'Wi-fi de alta performance', 'Assistência Premium 24h', 'Upload 50% da velocidade'], 'destaque' => false, 'link_contratar' => '#'],
        ];

        

        $planosGloboPlay = [
            ['id_plano' => 'globoplay-500', 'nome_plano_card' => 'COMBO PLUS 500 MEGA + GloboPlay', 'velocidade' => '500 MEGA', 'preco' => '99,98', 'tipo_pagamento' => 'CARTÃO/BOLETO', 'observacao' => '*SOB CONSULTA DE VIABILIDADE', 'instalacao_info' => 'INSTALAÇÃO GRATUITA 100% FIBRA', 'inclusos' => ['Globo Play Incluso', '100% Fibra Óptica', 'Wi-fi de alta performance'], 'destaque' => false, 'link_contratar' => '#'],
           
        ];

        $planosMesh = [
            ['id_plano' => 'mesh-100', 'nome_plano_card' => 'COMBO BÁSICO 100 MEGA + Mesh', 'velocidade' => '100 MEGA', 'preco' => '94,98', 'tipo_pagamento' => 'BOLETO', 'observacao' => '*SOB CONSULTA DE VIABILIDADE', 'instalacao_info' => 'INSTALAÇÃO GRATUITA 100% FIBRA', 'inclusos' => ['Tecnologia Mesh Premium', 'APPS INCLUSOS', '100% Fibra Óptica', 'Wi-fi de alta performance'], 'destaque' => false, 'link_contratar' => '#'],
            ['id_plano' => 'mesh-400', 'nome_plano_card' => 'COMBO PLUS 400 MEGA + Mesh', 'velocidade' => '400 MEGA', 'preco' => '104,98', 'tipo_pagamento' => 'BOLETO', 'observacao' => '*SOB CONSULTA DE VIABILIDADE', 'instalacao_info' => 'INSTALAÇÃO GRATUITA 100% FIBRA', 'inclusos' => ['Tecnologia Mesh Premium', 'APPS INCLUSOS', '100% Fibra Óptica', 'Wi-fi de alta performance'], 'destaque' => false, 'link_contratar' => '#'],
            ['id_plano' => 'mesh-600', 'nome_plano_card' => 'COMBO MAX 600 MEGA + Mesh', 'velocidade' => '600 MEGA', 'preco' => '114,98', 'tipo_pagamento' => 'BOLETO', 'observacao' => '*SOB CONSULTA DE VIABILIDADE', 'instalacao_info' => 'INSTALAÇÃO GRATUITA 100% FIBRA', 'inclusos' => ['Tecnologia Mesh Premium', 'APPS INCLUSOS', '100% Fibra Óptica', 'Wi-fi de alta performance'], 'destaque' => true, 'link_contratar' => '#'],
            ['id_plano' => 'mesh-800', 'nome_plano_card' => 'COMBO SUPER 800 MEGA + Mesh', 'velocidade' => '800 MEGA', 'preco' => '134,98', 'tipo_pagamento' => 'BOLETO', 'observacao' => '*SOB CONSULTA DE VIABILIDADE', 'instalacao_info' => 'INSTALAÇÃO GRATUITA 100% FIBRA', 'inclusos' => ['Tecnologia Mesh Premium', 'APPS INCLUSOS', '100% Fibra Óptica', 'Wi-fi de alta performance'], 'destaque' => false, 'link_contratar' => '#'],
            ['id_plano' => 'mesh-1gb', 'nome_plano_card' => 'PREMIUM 1GB + Mesh', 'velocidade' => '1 GB', 'preco' => '159,98', 'tipo_pagamento' => 'BOLETO', 'observacao' => '*SOB CONSULTA DE VIABILIDADE', 'instalacao_info' => 'INSTALAÇÃO GRATUITA 100% FIBRA', 'inclusos' => ['Tecnologia Mesh Premium', 'APPS INCLUSOS', '100% Fibra Óptica', 'Wi-fi de alta performance'], 'destaque' => false, 'link_contratar' => '#'],
            
        ];

        $combosEmpresas = [
            ['id_plano' => 'empresa-500', 'nome_plano_card' => 'PME 500 MEGA', 'velocidade' => '500 MEGA', 'preco' => '139,99', 'tipo_pagamento' => 'CORPORATIVO', 'observacao' => '*SOB CONSULTA DE VIABILIDADE', 'instalacao_info' => 'INSTALAÇÃO GRATUITA 100% FIBRA', 'inclusos' => ['Instalação Inclusa', 'IP VÁLIDO', 'Suporte Técnico Corporativo 24h', 'Wi-fi 6 incluso', 'Upload 50% da velocidade'], 'destaque' => false, 'link_contratar' => '#'],
            ['id_plano' => 'empresa-800', 'nome_plano_card' => 'PME 800 MEGA', 'velocidade' => '800 MEGA', 'preco' => '179,99', 'tipo_pagamento' => 'CORPORATIVO', 'observacao' => '*SOB CONSULTA DE VIABILIDADE', 'instalacao_info' => 'INSTALAÇÃO GRATUITA 100% FIBRA', 'inclusos' => ['Instalação Inclusa', 'IP VÁLIDO', 'Suporte Técnico Corporativo 24h', 'Wi-fi 6 incluso', 'Upload 50% da velocidade'], 'destaque' => true, 'link_contratar' => '#'],
            ['id_plano' => 'empresa-1gb', 'nome_plano_card' => 'PME 1 GB', 'velocidade' => '1 GB', 'preco' => '249,99', 'tipo_pagamento' => 'CORPORATIVO', 'observacao' => '*SOB CONSULTA DE VIABILIDADE', 'instalacao_info' => 'INSTALAÇÃO GRATUITA 100% FIBRA', 'inclusos' => ['Instalação Inclusa', 'IP VÁLIDO', 'Suporte Técnico Corporativo 24h', 'Wi-fi 6 incluso', 'Upload 50% da velocidade'], 'destaque' => false, 'link_contratar' => '#'],
        ];

        $planosPABX = [
            ['id_plano' => 'pabx-500', 'nome_plano_card' => '500 MEGA + PABX Virtual', 'velocidade' => '500 MEGA', 'preco' => '239,98', 'tipo_pagamento' => 'CORPORATIVO', 'observacao' => 'Verificar compatibilidade de telefone IP.', 'instalacao_info' => 'INSTALAÇÃO GRATUITA 100% FIBRA', 'inclusos' => ['PABX Virtual Avançado', 'Até 10 Ramais', 'Linha Fixa Ilimitada Brasil', 'Softphone Incluso'], 'destaque' => false, 'link_contratar' => '#', 'vantagens_pabx' => ['Baixo custo', 'Escalabilidade', 'URA', 'Gravações'], 'obs_pabx' => 'Telefone IP em locação: R$20,99/mês por unidade.'],
            ['id_plano' => 'pabx-avulso', 'nome_plano_card' => 'TUX PABX VIRTUAL (Avulso)', 'velocidade' => 'N/A', 'preco' => '99,99', 'tipo_pagamento' => 'MENSAL', 'observacao' => 'Verificar compatibilidade de telefone IP.', 'instalacao_info' => 'Consulte condições', 'inclusos' => ['Até 10 Ramais', 'Linha Fixa Ilimitada Brasil', 'Softphone Incluso', 'URA Personalizável'], 'destaque' => false, 'link_contratar' => '#', 'vantagens_pabx' => ['Baixo custo', 'Escalabilidade', 'URA', 'Gravações'], 'obs_pabx' => 'Telefone IP em locação: R$20,99/mês por unidade.'],
        ];

        $planosChip = [
            ['id_plano' => 'chip-5gb', 'nome_plano_card' => 'Chip 5GB', 'dados_total' => '5GB', 'dados_detalhe' => '(2GB plano + 2GB campanha + 1GB recorrência)', 'ligacoes' => '60 MIN', 'sms' => '60 SMS', 'preco' => '29,99', 'apps_inclusos' => ['SKEELO PREMIUM', 'WHATSAPP'], 'link_contratar' => '#'],
            ['id_plano' => 'chip-8gb', 'nome_plano_card' => 'Chip 8GB', 'dados_total' => '8GB', 'dados_detalhe' => '(3GB plano + 2GB campanha + 1GB recorrência + 1GB portabilidade)', 'ligacoes' => '60 MIN', 'sms' => '60 SMS', 'preco' => '39,99', 'apps_inclusos' => ['SKEELO PREMIUM', 'WHATSAPP'], 'link_contratar' => '#'],
            ['id_plano' => 'chip-12gb', 'nome_plano_card' => 'Chip 12GB', 'dados_total' => '12GB', 'dados_detalhe' => '(4GB plano + 4GB campanha + 3GB recorrência + 1GB portabilidade)', 'ligacoes' => 'ILIMITADAS BRASIL', 'sms' => '60 SMS', 'preco' => '44,99', 'apps_inclusos' => ['SKEELO PREMIUM', 'WHATSAPP'], 'link_contratar' => '#'],
        ];

        $planosTuxFixo = [
            ['id_plano' => 'fixo-100', 'nome_plano_card' => '100 MEGA + Fixo Ilimitado', 'velocidade' => '100 MEGA', 'preco' => '99,98', 'tipo_pagamento' => 'BOLETO', 'observacao' => '*SOB CONSULTA DE VIABILIDADE', 'instalacao_info' => 'INSTALAÇÃO GRATUITA 100% FIBRA', 'inclusos' => ['100% Fibra Óptica', 'Wi-fi de alta performance', 'Ligações Ilimitadas Brasil (Fixo)'], 'destaque' => false, 'link_contratar' => '#'],
        ];

        $categoriasDePlanos = [
            [
                'id_secao' => 'planos-boleto',
                'titulo_secao' => 'Combos Principais <span class="text-primary-tuxnet">(Boleto)</span>',
                'descricao_secao' => 'A melhor conexão com pagamento facilitado no boleto.',
                'planos' => $combosBoleto,
                'estilo_card_template' => 'plan-card-boleto'
            ],
         
            [
                'id_secao' => 'planos-globoplay',
                'titulo_secao' => 'Diversão Garantida com <span class="text-secondary-tuxnet">GloboPlay</span>', 
                'descricao_secao' => 'Internet de alta velocidade com acesso ao melhor do entretenimento nacional e internacional.',
                'planos' => $planosGloboPlay,
                'estilo_card_template' => 'plan-card-boleto' 
            ],
            [
                'id_secao' => 'planos-mesh',
                'titulo_secao' => 'Cobertura Total com <span class="text-info">Mesh Premium</span>',
                'descricao_secao' => 'Elimine pontos cegos de Wi-Fi em sua casa ou empresa com nossa tecnologia Mesh.',
                'texto_adicional_secao' => 'Ideal para residências maiores que 60m² ou com muitos obstáculos, a tecnologia Mesh cria uma rede Wi-Fi única, inteligente e contínua, garantindo a melhor cobertura e estabilidade em todos os cômodos.',
                'planos' => $planosMesh,
                'estilo_card_template' => 'plan-card-boleto' 
            ],
            [
                'id_secao' => 'planos-empresas',
                'titulo_secao' => 'Planos <span class="text-primary-tuxnet">Para Sua Empresa (PME)</span>',
                'descricao_secao' => 'Soluções robustas com IP válido e suporte dedicado para o seu negócio não parar.',
                'planos' => $combosEmpresas,
                'estilo_card_template' => 'plan-card-empresa'
            ],
            [
                'id_secao' => 'planos-pabx',
                'titulo_secao' => 'Comunicação Profissional com <span class="text-primary-tuxnet">PABX Virtual</span>',
                'descricao_secao' => 'Modernize a telefonia da sua empresa com nossa central PABX em nuvem, flexível e cheia de recursos.',
                'planos' => $planosPABX,
                'estilo_card_template' => 'plan-card-pabx'
            ],
            [
                'id_secao' => 'planos-chip',
                'titulo_secao' => 'Conectado em Qualquer Lugar: <span class="text-secondary-tuxnet">Planos de Chip</span>',
                'descricao_secao' => 'Leve a qualidade Tuxnet com você! Planos móveis com dados, ligações e SMS para suas necessidades.',
                'planos' => $planosChip,
                'estilo_card_template' => 'plan-card-chip'
            ],
            [
                'id_secao' => 'planos-fixo',
                'titulo_secao' => 'Telefonia Fixa <span class="text-primary-tuxnet">Confiável (Boleto)</span>',
                'descricao_secao' => 'Chamadas ilimitadas para todo o Brasil com a estabilidade da Tuxnet, combinadas com sua internet fibra.',
                'texto_adicional_secao' => 'O Tux Fixo oferece chamadas ilimitadas para todo o Brasil com estabilidade e qualidade. É possível manter seu número atual via portabilidade ou adquirir um novo. Ideal para quem precisa de um telefone fixo confiável e fácil de usar.',
                'planos' => $planosTuxFixo,
                'estilo_card_template' => 'plan-card-fixo'
            ],
        ];

        $servicosParaExibir = [];

        return view('planos', compact('planosVoceCarousel', 'categoriasDePlanos', 'servicosParaExibir'));
    }
}
