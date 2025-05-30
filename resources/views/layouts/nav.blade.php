<nav class="navbar navbar-expand-lg navbar-dark bg-primary-tuxnet shadow-sm">
    <div class="container">
        <a class="navbar-brand font-montserrat fw-bold" href="{{ route('home') }}">
            <img src="{{ asset('img/logo.png') }}" alt="Tuxnet Logo" style="height: 40px;"> {{-- Certifique-se que o caminho e o nome do arquivo da logo estão corretos --}}
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">Início</a>
                </li>
                <li class="nav-item">
                    {{-- Supondo que você terá uma rota chamada 'sobre' --}}
                    <a class="nav-link {{ request()->routeIs('sobre') ? 'active' : '' }}" href="{{ url('/sobre') }}">Sobre a Empresa</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('planos.servicos') || request()->routeIs('planos.para-voce') || request()->routeIs('planos.para-empresa') ? 'active' : '' }}" href="#" id="navbarDropdownPlanos" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Conhecer Planos
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownPlanos">
                        {{-- Por enquanto, ambos apontam para a página principal de planos.
                             Você pode criar rotas específicas como 'planos.para-voce' e 'planos.para-empresa' depois. --}}
                        <li><a class="dropdown-item" href="{{ route('planos.servicos', ['categoria' => 'pessoal']) }}">Para Você</a></li>
                        <li><a class="dropdown-item" href="{{ route('planos.servicos', ['categoria' => 'empresarial']) }}">Para Empresa</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                     {{-- Supondo que você terá uma rota chamada 'contato' --}}
                    <a class="nav-link {{ request()->routeIs('contato') ? 'active' : '' }}" href="{{ url('/contato') }}">Contato</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    {{-- Supondo que você terá uma rota para login do cliente --}}
                    <a class="btn btn-outline-secondary-tuxnet" href="{{ url('/cliente/login') }}">
                        Área do Cliente
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
