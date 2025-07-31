<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str; 

class SobreController extends Controller
{
    public function index()
    {
        $empresa = [
            'apresentacao_completa' => "Somos a TUXNET, uma operadora de telecomunicações com presença regional, criada para oferecer ao mercado infraestrutura de alta capacidade e uma plataforma multiserviços para tráfego dados, voz e imagem de alta confiabilidade.\nNossa rede possui pontos de presença (POP) em diversos municípios, e está presente nos pontos de troca de tráfego com as principais operadoras do mercado, sendo possível oferecer soluções de comunicação de alta qualidade para qualquer destino do mundo, através de uma rede IP híbrida, compostas por enlaces em fibra óptica e rádios digitais com total redundância.\nOferecemos soluções diferenciadas e personalizadas, de acordo com a necessidade de cada cliente. Mais do que um serviço de transporte de dados, a TUXNET desenvolve soluções, com análise técnica e financeira, a fim de indicar o melhor serviço para atender as necessidades do cliente, sempre com o objetivo de garantir que seu empreendimento obtenha resultados positivos, aumentando a eficiência com redução de custo operacional.\nSabemos que o investimento feito por sua empresa deve ter um retorno associado, e pensando nisso, a TUXNET traça suas metas na integração da comunicação dos usuários e na transmissão de qualquer tipo de informação com segurança, rapidez e eficiência.",
            'missao' => "Oferecer serviços de telecomunicações com qualidade e bom atendimento, superando as expectativas dos clientes.",
            'visao' => "Ser uma empresa de excelência, referência em infraestrutura e conhecimento técnico, com reconhecimento dos usuários."
            // 'valores_resumo' foi removido
        ];

        $valoresDetalhados = [
            [
                'nome' => 'Ética',
                'icone' => 'bi-shield-check',
                'descricao' => 'Conduzimos nossos negócios com integridade e transparência, respeitando clientes, colaboradores e parceiros.'
            ],
            [
                'nome' => 'Profissionalismo',
                'icone' => 'bi-briefcase-fill',
                'descricao' => 'Compromisso com a excelência técnica, buscando sempre a melhoria contínua e a entrega de resultados superiores.'
            ],
            [
                'nome' => 'Trabalho em Equipe',
                'icone' => 'bi-people-fill',
                'descricao' => 'Valorizamos a colaboração e o compartilhamento de conhecimento para alcançar objetivos comuns e fortalecer a empresa.'
            ],
            [
                'nome' => 'Respeito',
                'icone' => 'bi-heart-fill',
                'descricao' => 'Cultivamos um ambiente de respeito mútuo, valorizando a diversidade de ideias e pessoas.'
            ],
            [
                'nome' => 'Honestidade',
                'icone' => 'bi-patch-check-fill',
                'descricao' => 'Agimos com sinceridade e clareza em todas as nossas relações e comunicações.'
            ]
        ];

        $faq = [
            [
                'pergunta' => 'A internet da Tux é boa?',
                'resposta' => 'Sim! A tecnologia utilizada na conexão é de alta performance com fibra óptica de ponta a ponta, o que faz com que o sinal de internet seja de extrema qualidade e garanta que as velocidades de download e upload sejam realmente muito altas.'
            ],
            [
                'pergunta' => 'Vale a pena assinar a Tuxnet?',
                'resposta' => 'Com planos ilimitados, internet via fibra óptica de ponta a ponta e velocidades altas em todos os planos, a Tuxnet Internet é a melhor opção para você navegar pelas redes sociais, plataformas de streamings, jogar online e muito mais, sem ter que ficar se preocupando com quedas ou instabilidades.'
            ],
            [
                'pergunta' => 'Quais são as vantagens da Tuxnet?',
                'resposta' => 'Todos os planos da Tuxnet tem Wi-Fi grátis com sinal dual band e, dependendo do plano, acesso a serviços de valor agregado como Deezer, Skeelo, MAX, GloboPlay, entre outros. Além disso, oferecemos instalação gratuita (sob consulta de viabilidade) e suporte técnico especializado.'
            ],
            [
                'pergunta' => 'Como posso pagar a fatura?',
                'resposta' => 'Você pode pagar a sua fatura de diversas formas: pela área do cliente no nosso site, pelo aplicativo da Tuxnet, pelo app do seu banco utilizando o código de barras, ou presencialmente em uma de nossas lojas ou pontos autorizados.'
            ],
            [
                'pergunta' => 'O que são os "APPS INCLUSOS" mencionados em alguns planos?',
                'resposta' => 'Os "APPS INCLUSOS" são serviços de valor agregado que oferecemos em parceria com outras empresas, como plataformas de streaming de música (Deezer), leitura (Skeelo), vídeo (MAX, GloboPlay), antivírus, entre outros, dependendo do plano contratado. Eles enriquecem sua experiência de conexão sem custo adicional.'
            ],
            [
                'pergunta' => 'Preciso de algum equipamento especial para os planos de Fibra Óptica?',
                'resposta' => 'Nós fornecemos o modem Wi-Fi de alta performance necessário para a sua conexão fibra óptica. A instalação é feita por nossos técnicos especializados para garantir a melhor qualidade de sinal.'
            ],
            [
                'pergunta' => 'Como funciona o serviço Mesh Premium?',
                'resposta' => 'A tecnologia Mesh Premium cria uma rede Wi-Fi única e inteligente em sua casa ou empresa, utilizando múltiplos pontos de acesso. Isso elimina pontos cegos de sinal, garantindo cobertura total e estável em todos os ambientes, ideal para residências maiores ou com muitas paredes.'
            ],
            [
                'pergunta' => 'A instalação é realmente gratuita para todos os planos?',
                'resposta' => 'Sim, a instalação é gratuita para nossos planos de fibra óptica, mas está sempre sujeita à consulta de viabilidade técnica no seu endereço. Nossa equipe verificará as condições para garantir que podemos oferecer o serviço com a qualidade Tuxnet.'
            ]
        ];

        

        return view('sobre', compact('empresa', 'valoresDetalhados', 'faq', ));
    }
}
