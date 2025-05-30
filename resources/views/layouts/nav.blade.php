<nav class="navbar navbar-expand-lg navbar-dark bg-primary-tuxnet shadow-sm">
    <div class="container">
        <a class="navbar-brand font-montserrat fw-bold" href="{{ url('/') }}">
         <img src="{{ asset('img/logo.png') }}" alt="Tuxnet Logo" width="120"> 
           </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mx-auto"> <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ url('/') }}">Início</a> </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/sobre') }}">Sobre a Empresa</a> {{-- Defina a rota '/sobre' depois --}}
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPlanos" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Conhecer Planos
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownPlanos">
                        <li><a class="dropdown-item" href="{{ url('/planos/para-voce') }}">Para Você</a></li> {{-- Defina as rotas depois --}}
                        <li><a class="dropdown-item" href="{{ url('/planos/para-empresa') }}">Para Empresa</a></li> {{-- Defina as rotas depois --}}
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/contato') }}">Contato</a> {{-- Defina a rota '/contato' depois --}}
                </li>
            </ul>

            <ul class="navbar-nav ms-auto"> {{-- ms-auto para alinhar à direita --}}
                <li class="nav-item">
                    <a class="btn btn-outline-secondary-tuxnet" href="{{ url('/cliente/login') }}">
                        Área do Cliente
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
