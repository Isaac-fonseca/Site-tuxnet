@extends('layouts.app')

@section('title', 'Trabalhe Conosco')

@push('styles')

@endpush

@section('content')

{{-- Seção de Cabeçalho e Benefícios Unificada --}}
<section class="hero-trabalhe-conosco">
    <div class="container">
        <div class="hero-content text-center" data-aos="fade-up">
            <h1 class="display-4 fw-bold text-white">Faça Parte da Nossa Equipe</h1>
            <p class="lead text-white-50 mx-auto" style="max-width: 700px;">Estamos sempre em busca de novos talentos para conectar a Bahia. Se você é apaixonado por tecnologia e desafios, seu lugar é aqui!</p>
        </div>

        <div class="benefits-content">
            <div class="text-center mb-5" data-aos="fade-up" data-aos-delay="100">
                <h2 class="font-montserrat text-white">Por que ser da Tuxnet?</h2>
                <p class="lead text-white-50">Oferecemos um ambiente dinâmico, inovador e cheio de oportunidades.</p>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="benefit-card-trabalhe">
                        <div class="icon"><i class="bi bi-graph-up-arrow"></i></div>
                        <h5 class="fw-bold">Crescimento Profissional</h5>
                        <p>Investimos no desenvolvimento dos nossos colaboradores com treinamentos e planos de carreira.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="benefit-card-trabalhe">
                        <div class="icon"><i class="bi bi-lightbulb-fill"></i></div>
                        <h5 class="fw-bold">Ambiente Inovador</h5>
                        <p>Faça parte de uma equipe que respira tecnologia e está sempre buscando as melhores soluções do mercado.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="benefit-card-trabalhe">
                        <div class="icon"><i class="bi bi-people-fill"></i></div>
                        <h5 class="fw-bold">Cultura de Equipe</h5>
                        <p>Valorizamos a colaboração, o respeito e um ambiente de trabalho positivo e acolhedor.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Seção do Formulário --}}
<section class="section-padding bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <h6 class="alert-heading">Por favor, corrija os erros abaixo:</h6>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="card form-card border-0" data-aos="fade-up" data-aos-delay="200">
                    <div class="card-body p-4 p-md-5">
                        <h4 class="card-title text-center font-montserrat mb-4">Envie seu Currículo</h4>
                        <form action="{{ route('trabalhe-conosco.store') }}" method="POST" enctype="multipart/form-data" class="row g-4">
                            @csrf

                            <div class="col-12" data-aos="fade-up" data-aos-delay="300">

                                <div class="form-control-icon">

                                    <i class="bi bi-person-fill input-icon"></i>
                                    <label for="nome_completo" class="form-label">Nome Completo</label>
                                    <input type="text" class="form-control" id="nome_completo" name="nome_completo" value="{{ old('nome_completo') }}" required>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="350">

                                <div class="form-control-icon">
                                    <i class="bi bi-envelope-fill input-icon"></i>
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">

                                <div class="form-control-icon">
                                    <i class="bi bi-telephone-fill input-icon"></i>
                                    <label for="telefone" class="form-label">Telefone</label>
                                    <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="(75) 99999-9999" value="{{ old('telefone') }}" required>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="450">
                                <label for="cidade" class="form-label">Sua Cidade</label>
                                <select id="cidade" name="cidade" class="form-select" required>
                                    <option value="" disabled selected>Carregando...</option>
                                </select>
                            </div>

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
                                <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="{{ old('data_nascimento') }}" required>
                            </div>

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="550">
                                <label for="escolaridade" class="form-label">Escolaridade</label>
                                <select id="escolaridade" name="escolaridade" class="form-select" required>
                                    <option selected disabled value="">Selecione...</option>
                                    <option value="medio_completo" @if(old('escolaridade')=='medio_completo' ) selected @endif>Ensino Médio Completo</option>
                                    <option value="superior_incompleto" @if(old('escolaridade')=='superior_incompleto' ) selected @endif>Ensino Superior Incompleto</option>
                                    <option value="superior_completo" @if(old('escolaridade')=='superior_completo' ) selected @endif>Ensino Superior Completo</option>
                                </select>
                            </div>

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="600">
                                <label for="vaga" class="form-label">Vaga Desejada</label>
                                <select id="vaga" name="vaga" class="form-select" required>
                                    <option selected disabled value="">Selecione a vaga...</option>
                                    @foreach($vagas as $vaga)
                                    <option value="{{ $vaga->id }}" @if(old('vaga')==$vaga->id) selected @endif>{{ $vaga->titulo }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 mt-4" data-aos="fade-up" data-aos-delay="650">
                                <label class="form-label d-block">Possui CNH?</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="possui_cnh" id="cnh_sim" value="sim" @if(old('possui_cnh')=='sim' ) checked @endif>
                                    <label class="form-check-label" for="cnh_sim">Sim</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="possui_cnh" id="cnh_nao" value="nao" @if(old('possui_cnh', 'nao' )=='nao' ) checked @endif>
                                    <label class="form-check-label" for="cnh_nao">Não</label>
                                </div>
                            </div>

                            <div class="col-md-6 mt-4" data-aos="fade-up" data-aos-delay="700">
                                <label class="form-label d-block">Trabalhando atualmente?</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="vinculo_empregaticio" id="vinculo_sim" value="sim" @if(old('vinculo_empregaticio')=='sim' ) checked @endif>
                                    <label class="form-check-label" for="vinculo_sim">Sim</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="vinculo_empregaticio" id="vinculo_nao" value="nao" @if(old('vinculo_empregaticio', 'nao' )=='nao' ) checked @endif>
                                    <label class="form-check-label" for="vinculo_nao">Não</label>
                                </div>
                            </div>

                            <div class="col-12" data-aos="fade-up" data-aos-delay="750">
                                <label for="pretensao_salarial" class="form-label">Pretensão Salarial (Opcional)</label>
                                <input type="text" class="form-control" id="pretensao_salarial" name="pretensao_salarial" placeholder="R$ 0,00" value="{{ old('pretensao_salarial') }}">
                            </div>

                            <div class="col-12 mt-4" data-aos="fade-up" data-aos-delay="800">
                                <label class="form-label d-block">Disponibilidade de Horário:</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="disponibilidade[]" id="horario_manha" value="manha" @if(is_array(old('disponibilidade')) && in_array('manha', old('disponibilidade'))) checked @endif>
                                    <label class="form-check-label" for="horario_manha">Manhã</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="disponibilidade[]" id="horario_tarde" value="tarde" @if(is_array(old('disponibilidade')) && in_array('tarde', old('disponibilidade'))) checked @endif>
                                    <label class="form-check-label" for="horario_tarde">Tarde</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="disponibilidade[]" id="horario_noite" value="noite" @if(is_array(old('disponibilidade')) && in_array('noite', old('disponibilidade'))) checked @endif>
                                    <label class="form-check-label" for="horario_noite">Noite</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="disponibilidade[]" id="horario_integral" value="integral" @if(is_array(old('disponibilidade')) && in_array('integral', old('disponibilidade'))) checked @endif>
                                    <label class="form-check-label" for="horario_integral">Integral</label>
                                </div>
                            </div>

                            <div class="col-12" data-aos="fade-up" data-aos-delay="850">
                                <label for="motivo" class="form-label">Por que você gostaria de trabalhar na Tuxnet?</label>
                                <textarea class="form-control" id="motivo" name="motivo" rows="4" placeholder="Conte-nos um pouco sobre seus objetivos e como você pode contribuir com nossa equipe." required>{{ old('motivo') }}</textarea>
                            </div>

                            <div class="col-12" data-aos="fade-up" data-aos-delay="900">
                                <label for="curriculo" class="form-label">Anexe seu Currículo</label>
                                <input class="form-control" type="file" id="curriculo" name="curriculo" accept=".pdf,.doc,.docx" required>
                                <div class="form-text">Formatos aceitos: PDF, DOC e DOCX (máximo 2MB).</div>
                            </div>

                            <div class="col-12 text-center mt-4" data-aos="fade-up" data-aos-delay="950">
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

@push('scripts')
<script>
    window.addEventListener('load', function() {
        AOS.init({
            duration: 800,
            once: true,
            offset: 50,
        });
    });
</script>

@endpush