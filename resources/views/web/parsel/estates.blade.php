@extends('layouts.web.app')

@section('title', 'Parsel İlanları - Midyat Emlak')

@section('hero')
<!-- Hero Section -->
<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('images/bg_1.jpg') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-3 bread">Parsel {{ $parcelNumber }} - İlanlar</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Ana Sayfa</a></span> <span class="mr-2"><a href="{{ route('parsel.index') }}">Parsel Sorgulama</a></span> <span>İlanlar</span></p>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<!-- Parsel Estates Section -->
<section class="ftco-section goto-here">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header bg-info text-white">
                        <h3 class="mb-0">
                            <i class="ion-ios-home"></i> Parsel {{ $parcelNumber }} - İlanlar
                        </h3>
                    </div>
                    <div class="card-body">
                        @if($estates->count() > 0)
                            <div class="row">
                                @foreach($estates as $estate)
                                    <div class="col-md-6 col-lg-4 mb-4">
                                        <div class="card h-100">
                                            @if($estate->main_image)
                                                <img src="{{ asset('storage/' . $estate->main_image) }}" 
                                                     class="card-img-top" alt="{{ $estate->name }}" style="height: 200px; object-fit: cover;">
                                            @else
                                                <div class="card-img-top bg-light d-flex align-items-center justify-content-center" 
                                                     style="height: 200px;">
                                                    <i class="ion-ios-home fa-3x text-muted"></i>
                                                </div>
                                            @endif
                                            
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $estate->name }}</h5>
                                                <p class="card-text">
                                                    <strong>Tür:</strong> {{ $estate->type }}<br>
                                                    <strong>Durum:</strong> {{ $estate->status }}<br>
                                                    <strong>Fiyat:</strong> {{ number_format($estate->price, 2, ',', '.') }} ₺
                                                </p>
                                                
                                                @if($estate->features)
                                                    <p class="card-text">
                                                        <small class="text-muted">{{ Str::limit($estate->features, 100) }}</small>
                                                    </p>
                                                @endif
                                            </div>
                                            
                                            <div class="card-footer">
                                                <div class="d-flex justify-content-between">
                                                    <span class="badge bg-primary">{{ $estate->type }}</span>
                                                    <span class="badge bg-success">{{ $estate->status }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-5">
                                <i class="ion-ios-search fa-3x text-muted mb-3"></i>
                                <h4>Bu Parselde İlan Bulunamadı</h4>
                                <p class="text-muted">
                                    Parsel {{ $parcelNumber }} numarasına ait henüz ilan bulunmamaktadır.
                                </p>
                                <a href="{{ route('parsel.index') }}" class="btn btn-primary">
                                    <i class="ion-ios-arrow-back"></i> Parsel Sorgulama
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection 