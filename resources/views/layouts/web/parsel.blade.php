<!DOCTYPE html>
<html lang="tr">
@include('layouts.web.head')
<body>
@include('layouts.web.nav')

<!-- Parsel Hero Section -->
<section class="hero-wrap hero-wrap-2 ftco-degree-bg js-fullheight"
         style="background-image: url('{{ asset('images/bg_1.jpg') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="overlay-2"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 mb-5 text-center">
                <h1 class="mb-3 bread">Parsel Sorgulama</h1>
                <p class="breadcrumbs">
                    <span class="mr-2"><a href="{{ route('home') }}">Ana Sayfa <i class="ion-ios-arrow-forward"></i></a></span>
                    <span>Parsel Sorgulama</span>
                </p>
            </div>
        </div>
    </div>
</section>

@yield('content')
@include('layouts.web.footer')
@include('layouts.web.loader')
@include('layouts.web.script')

</body>
</html>
