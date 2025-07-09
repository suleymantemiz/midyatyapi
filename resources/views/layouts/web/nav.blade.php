<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Midyat Emlak</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                    <a href="{{ route('home') }}" class="nav-link">Ana Sayfa</a>
                </li>
                <li class="nav-item {{ request()->routeIs('estate.properties') ? 'active' : '' }}">
                    <a href="{{ route('estate.properties') }}" class="nav-link">İlanlar</a>
                </li>
                <!--li class="nav-item {{ request()->routeIs('estate.advanced-search') ? 'active' : '' }}">
                    <a href="{{ route('estate.advanced-search') }}" class="nav-link">Gelişmiş Arama</a>
                </li>
                <li class="nav-item {{ request()->routeIs('parsel.index') ? 'active' : '' }}">
                    <a href="{{ route('parsel.index') }}" class="nav-link">Parsel Sorgula</a>
                </li-->
                <li class="nav-item {{ request()->routeIs('favorites.index') ? 'active' : '' }}">
                    <a href="{{ route('favorites.index') }}" class="nav-link">
                        <i class="fas fa-heart"></i> Favorilerim
                        <span class="badge badge-light favorites-count">{{ count(session('favorites', [])) }}</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('about') ? 'active' : '' }}">
                    <a href="{{ route('about') }}" class="nav-link">Hakkımızda</a>
                </li>
                <li class="nav-item {{ request()->routeIs('services') ? 'active' : '' }}">
                    <a href="{{ route('services') }}" class="nav-link">Hizmetler</a>
                </li>
                <li class="nav-item {{ request()->routeIs('contact') ? 'active' : '' }}">
                    <a href="{{ route('contact') }}" class="nav-link">İletişim</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->
