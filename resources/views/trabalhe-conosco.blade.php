@extends('layouts.app')

@section('title', 'Trabalhe Conosco')
@push('styles')
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
@endpush
@section('content')

{{-- Seção de Cabeçalho da Página --}}
<section class="section-padding bg-light">
    <div class="container text-center">
        <div class="animate-on-scroll fade-in-up">
            <h2 class="font-montserrat">Faça Parte da Nossa Equipe</h2>
            <p class="lead text-muted">Estamos sempre em busca de novos talentos para conectar a Bahia. Se você é apaixonado por tecnologia e desafios, seu lugar é aqui!</p>
        </div>
    </div>
</section>

{{-- Seção do Formulário --}}
<section class="section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card shadow-sm border-0 animate-on-scroll fade-in-up" data-animation-delay="0.2">
                    <div class="card-body p-4 p-md-5">
                        <h4 class="card-title text-center font-montserrat mb-4">Envie seu Currículo</h4>

                        {{-- O formulário começa aqui --}}
                        <form action="{{ route('trabalhe-conosco.store') }}" method="POST" class="row g-3">
                            @csrf

                            {{-- Nome Completo --}}
                            <div class="col-12">
                                <label for="nome_completo" class="form-label">Nome Completo</label>
                                <input type="text" class="form-control" id="nome_completo" name="nome_completo" required>
                            </div>

                            {{-- Cidade --}}
                            <div class="col-md-6">
                                <label for="cidade" class="form-label">Cidade</label>
                                <input type="text" class="form-control" id="cidade" name="cidade" required>
                            </div>

                            {{-- Data de Nascimento --}}
                            <div class="col-md-6">
                                <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
                            </div>

                            {{-- Escolaridade --}}
                            <div class="col-md-6">
                                <label for="escolaridade" class="form-label">Escolaridade</label>
                                <select id="escolaridade" name="escolaridade" class="form-select" required>
                                    <option selected disabled value="">Selecione...</option>
                                    <option value="medio_completo">Ensino Médio Completo</option>
                                    <option value="superior_incompleto">Ensino Superior Incompleto</option>
                                    <option value="superior_completo">Ensino Superior Completo</option>
                                </select>
                            </div>

                            {{-- Vaga --}}
                            <div class="col-md-6">
                                <label for="vaga" class="form-label">Vaga Desejada</label>
                                <select id="vaga" name="vaga" class="form-select" required>
                                    <option selected disabled value="">Selecione a vaga...</option>
                                    {{-- As vagas serão carregadas aqui dinamicamente --}}
                                    @foreach($vagas as $vaga)
                                        <option value="{{ $vaga->id }}">{{ $vaga->titulo }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Email --}}
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            {{-- Telefone --}}
                            <div class="col-md-6">
                                <label for="telefone" class="form-label">Telefone</label>
                                <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="(75) 99999-9999" required>
                            </div>

                            {{-- Habilitação e Vínculo Empregatício (lado a lado) --}}
                            <div class="col-md-6 mt-4">
                                <label class="form-label d-block">Possui CNH?</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="possui_cnh" id="cnh_sim" value="sim">
                                    <label class="form-check-label" for="cnh_sim">Sim</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="possui_cnh" id="cnh_nao" value="nao" checked>
                                    <label class="form-check-label" for="cnh_nao">Não</label>
                                </div>
                            </div>

                            <div class="col-md-6 mt-4">
                                <label class="form-label d-block">Trabalhando atualmente?</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="vinculo_empregaticio" id="vinculo_sim" value="sim">
                                    <label class="form-check-label" for="vinculo_sim">Sim</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="vinculo_empregaticio" id="vinculo_nao" value="nao" checked>
                                    <label class="form-check-label" for="vinculo_nao">Não</label>
                                </div>
                            </div>

                            {{-- Pretensão Salarial --}}
                            <div class="col-12">
                                <label for="pretensao_salarial" class="form-label">Pretensão Salarial (Opcional)</label>
                                <input type="text" class="form-control" id="pretensao_salarial" name="pretensao_salarial" placeholder="R$ 0,00">
                            </div>

                            {{-- Disponibilidade de Horários --}}
                            <div class="col-12 mt-4">
                                <label class="form-label d-block">Disponibilidade de Horário:</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="disponibilidade[]" id="horario_manha" value="manha">
                                    <label class="form-check-label" for="horario_manha">Manhã</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="disponibilidade[]" id="horario_tarde" value="tarde">
                                    <label class="form-check-label" for="horario_tarde">Tarde</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="disponibilidade[]" id="horario_noite" value="noite">
                                    <label class="form-check-label" for="horario_noite">Noite</label>
                                </div>
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="disponibilidade[]" id="horario_integral" value="integral">
                                    <label class="form-check-label" for="horario_integral">Integral</label>
                                </div>
                            </div>

                            {{-- Motivo da Aplicação --}}
                            <div class="col-12">
                                <label for="motivo" class="form-label">Por que você gostaria de trabalhar na Tuxnet?</label>
                                <textarea class="form-control" id="motivo" name="motivo" rows="4" required></textarea>
                            </div>

                            {{-- Botão de Envio --}}
                            <div class="col-12 text-center mt-4">
                                <button type="submit" class="btn btn-primary-tuxnet btn-lg px-5">Enviar Candidatura</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
