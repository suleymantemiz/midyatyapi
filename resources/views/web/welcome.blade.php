@extends('layouts.web.app')

@section('title', 'Midyat Emlak - Ana Sayfa')

@section('hero')
<!-- Hero Section -->
<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('images/bg_1.jpg') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-3 bread">{{ $homeContent->hero_title ?? 'Midyat Emlak' }}</h1>
                <p class="breadcrumbs">{{ $homeContent->hero_subtitle ?? 'Güvenilir emlak çözüm ortağınız' }}</p>
                @if($homeContent && $homeContent->hero_button_text)
                    <div class="mt-4">
                        <a href="{{ $homeContent->hero_button_url ?? '/properties' }}" class="btn btn-primary btn-lg">
                            {{ $homeContent->hero_button_text }}
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection

@section('fto')
@include('layouts.web.fto')
@endsection

@section('image')
@include('layouts.web.image')
@endsection

@section('section')
@include('layouts.web.section')
@endsection

@section('full-width')
@include('layouts.web.fullwidth')
@endsection

@section('agent')
@include('layouts.web.agent')
@endsection

@section('pt')
@include('layouts.web.pt')
@endsection

@section('goto-here')
@include('layouts.web.gotohere')
@endsection

@section('content')
<!-- Bu bölüm boş kalacak çünkü içerik diğer section'larda -->
@endsection