<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="index.html" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
        <h1 class="m-0 text-primary">StageEntry</h1>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="/" class="nav-item nav-link active">Accueil</a>
            <a href="entreprise.index" class="nav-item nav-link">Entreprises</a>
            <a href="offre.index" class="nav-item nav-link">Offres</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Mon compte</a>
                <div class="dropdown-menu rounded-0 m-0">
                    @auth
                    <div class="dropdown-item">{{ Auth::user()->name }}</div>
                    <a href="{{ url('/profile') }}" class="dropdown-item"> Profile </a>
                    <a href="{{ url('/logout') }}" class="dropdown-item">Se decconnecter</a>
                    @else
                    <a href="{{ url('/login') }}" class="dropdown-item">Se connecter</a>
                        @if (Route::has('register'))
                        <a href="{{ url('/register') }}" class="dropdown-item">S'inscrire</a>
                        @endif
                    @endauth
                </div>
            </div>

        </div>
        <a href="" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Publier une offre<i class="fa fa-arrow-right ms-3"></i></a>
    </div>
</nav>