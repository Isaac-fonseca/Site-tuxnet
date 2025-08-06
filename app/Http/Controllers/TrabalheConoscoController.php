<?php

namespace App\Http\Controllers;

use App\Models\Candidatura;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TrabalheConoscoController extends Controller
{

    public function create()
    {

        $vagas = collect([
            (object)['id' => 1, 'titulo' => 'Técnico(a) de Suporte'],
            (object)['id' => 2, 'titulo' => 'Analista de Redes'],
            (object)['id' => 3, 'titulo' => 'Vendedor(a) Externo'],
            (object)['id' => 4, 'titulo' => 'Auxiliar Administrativo'],
        ]);


        return view('trabalhe-conosco', ['vagas' => $vagas]);
    }


    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'nome_completo' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'escolaridade' => 'required|string',

            'vaga' => ['required', 'integer', Rule::in([1, 2, 3, 4])],
            'email' => 'required|email|max:255',
            'telefone' => 'required|string|max:20',
            'possui_cnh' => 'required|in:sim,nao',
            'vinculo_empregaticio' => 'required|in:sim,nao',
            'pretensao_salarial' => 'nullable|string|max:50',
            'disponibilidade' => 'nullable|array',
            'motivo' => 'required|string',
            'curriculo' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);


        $caminhoArquivo = null;
        if ($request->hasFile('curriculo')) {

            $caminhoArquivo = $request->file('curriculo')->store('curriculos', 'public');
        }


        Candidatura::create([
            'nome_completo' => $validatedData['nome_completo'],
            'cidade' => $validatedData['cidade'],
            'data_nascimento' => $validatedData['data_nascimento'],
            'escolaridade' => $validatedData['escolaridade'],
            'vaga_id' => $validatedData['vaga'],
            'email' => $validatedData['email'],
            'telefone' => $validatedData['telefone'],
            'possui_cnh' => ($validatedData['possui_cnh'] === 'sim'),
            'vinculo_empregaticio' => ($validatedData['vinculo_empregaticio'] === 'sim'),
            'pretensao_salarial' => $validatedData['pretensao_salarial'],
            'disponibilidade' => $validatedData['disponibilidade'],
            'motivo' => $validatedData['motivo'],
            'caminho_curriculo' => $caminhoArquivo,
        ]);

       
        return redirect()->back()->with('success', 'Candidatura enviada com sucesso! Agradecemos o seu interesse.');
    }
}
