<nav class="navbar navbar-expand-lg navbar-dark bg-primary-tuxnet shadow-sm py-2">
    <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ route('home') }}">
            <img src="{{ asset('img/logo.png') }}" alt="Tuxnet Logo" class="tuxnet-logo">
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
                
                <li class="nav-item d-lg-none mt-2 mb-1">
                    <a class="btn btn-secondary-tuxnet w-100" href="{{ url('/cliente/login') }}">
                        Área do Cliente
                    </a>
                </li>
            </ul>

            
            <ul class="navbar-nav ms-auto d-none d-lg-flex"> 
                <li class="nav-item">
                    <a class="btn btn-outline-secondary-tuxnet" href="{{ url('/cliente/login') }}">
                        Área do Cliente
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
