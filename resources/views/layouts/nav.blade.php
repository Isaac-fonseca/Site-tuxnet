<nav class="navbar navbar-expand-lg navbar-dark bg-primary-tuxnet shadow-sm">
    <div class="container">
        <a class="navbar-brand font-montserrat fw-bold d-flex align-items-center" href="{{ route('home') }}">
            <img src="{{ asset('img/logo.png') }}" alt="Tuxnet Logo" class="tuxnet-logo"> {{-- Classe adicionada, estilo inline removido --}}
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            {{-- Para garantir a centralização, verificamos se a ul dos links é o único elemento flexível principal entre a marca e os itens da direita --}}
            {{-- A classe mx-auto na ul dos links centrais funciona melhor quando os elementos à esquerda e à direita têm larguras definidas ou são flexíveis de forma equilibrada. --}}
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">Início</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('sobre') ? 'active' : '' }}" href="{{ url('/sobre') }}">Sobre a Empresa</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('planos.servicos') ? 'active' : '' }}" href="#" id="navbarDropdownPlanos" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Conhecer Planos
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownPlanos">
                        <li><a class="dropdown-item" href="{{ route('planos.servicos', ['categoria' => 'pessoal']) }}">Para Você</a></li>
                        <li><a class="dropdown-item" href="{{ route('planos.servicos', ['categoria' => 'empresarial']) }}">Para Empresa</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}#cta-whatsapp">Contato</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto"> {{-- ms-auto empurra para a direita --}}
                <li class="nav-item">
                    <a class="btn btn-outline-secondary-tuxnet" href="{{ url('/cliente/login') }}">
                        Área do Cliente
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
