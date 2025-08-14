<nav class="navbar navbar-expand-lg navbar-dark bg-primary-tuxnet shadow-sm pt-2 ">
    <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ route('home') }}">
            <img src="{{ asset('img/logo.png') }}" alt="Tuxnet Logo" class="tuxnet-logo">
        </a>


<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <button class="btn-close-nav d-lg-none" aria-label="Close">
                <i class="bi bi-x-lg"></i> </button>
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">Início</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('sobre') ? 'active' : '' }}" href="{{ url('/sobre') }}">Sobre a Empresa</a>
                </li>
                <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle {{ request()->routeIs('planos.servicos') ? 'active' : '' }}" href="#" id="navbarDropdownPlanos" role="button" data-bs-toggle="dropdown" aria-expanded="false">
       Planos
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdownPlanos">
        <div class="dropdown-menu-inner">
            <li><a class="dropdown-item" href="{{ route('planos.servicos', ['categoria' => 'pessoal']) }}"> <i class="bi bi-house-door-fill"></i> Para Você</a></li>
            <li><a class="dropdown-item" href="{{ route('empresa.servicos', ['categoria' => 'empresarial']) }}"> <i class="bi bi-building-fill"></i> Para Empresa</a></li>
        </div>
    </ul>
</li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}#cta-whatsapp">Contato</a>
                </li>
  <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('trabalhe-conosco') ? 'active' : '' }}" href="{{ url('/trabalhe-conosco') }}">Trabalhe conosco</a>
                </li>
               <li class="nav-item d-lg-none mt-4">
    <a class="btn btn-secondary-tuxnet" href="{{ url('/cliente/login') }}">
        Área do Cliente
    </a>
</li>
            </ul>

            <ul class="navbar-nav ms-auto d-none d-lg-flex">
                <li class="nav-item">
                    <a class="btn btn-outline-secondary-tuxnet" href="https://central.tuxnet.hubsoft.com.br/central/login">
                        Área do Cliente
                    </a>
                </li>
            </ul>
            <div class="mobile-menu-logo d-lg-none">
        <img src="{{ asset('img/logo.png') }}" alt="Tuxnet Logo">
    </div>

        </div>
    </div>
</nav>
