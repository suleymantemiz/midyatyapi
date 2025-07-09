@extends('layouts.web.app')

@section('title', 'Arama Sonuçları - Midyat Emlak')

@section('hero')
<!-- Hero Section -->
<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('images/bg_1.jpg') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-3 bread">Arama Sonuçları</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Ana Sayfa</a></span> <span>Arama Sonuçları</span></p>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<!-- Search Results Section -->
<section class="ftco-section goto-here">
    <div class="container">
        <div class="row">
            <!-- Search Results -->
            <div class="col-lg-9">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>Arama Sonuçları</h2>
                    <small class="text-muted">{{ $estates->total() }} ilan bulundu</small>
                </div>

                @if($estates->count() > 0)
                    <div class="row">
                        @foreach($estates as $estate)
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card h-100 shadow-sm">
                                @if($estate->main_image)
                                    <img src="{{ asset('storage/' . $estate->main_image) }}" 
                                         class="card-img-top" 
                                         alt="{{ $estate->name }}"
                                         style="height: 200px; object-fit: cover;">
                                @else
                                    <div class="card-img-top bg-secondary d-flex align-items-center justify-content-center" 
                                         style="height: 200px;">
                                        <span class="text-white">Resim Yok</span>
                                    </div>
                                @endif
                                
                                <div class="card-body">
                                    <h5 class="card-title">{{ $estate->name }}</h5>
                                    <p class="card-text text-primary fw-bold">
                                        {{ number_format($estate->price, 0, ',', '.') }} ₺
                                    </p>
                                    <p class="card-text">
                                        <small class="text-muted">
                                            {{ $estate->type }} - {{ $estate->status }}
                                            @if($estate->address)
                                                <br>{{ Str::limit($estate->address, 50) }}
                                            @endif
                                        </small>
                                    </p>
                                    
                                    @if($estate->gross_m2)
                                        <p class="card-text">
                                            <small class="text-muted">
                                                Brüt: {{ $estate->gross_m2 }} m²
                                                @if($estate->net_m2)
                                                    | Net: {{ $estate->net_m2 }} m²
                                                @endif
                                            </small>
                                        </p>
                                    @endif
                                </div>
                                
                                <div class="card-footer bg-transparent">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="{{ route('estate.show', $estate->id) }}" 
                                           class="btn btn-primary btn-sm">
                                            Detaylar
                                        </a>
                                        @if($estate->latitude && $estate->longitude)
                                            <a href="https://www.google.com/maps?q={{ $estate->latitude }},{{ $estate->longitude }}" 
                                               target="_blank" 
                                               class="btn btn-outline-info btn-sm">
                                                📍 Harita
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-4">
                        {{ $estates->appends($request->query())->links() }}
                    </div>

                    <!-- Advanced Search Button -->
                    <div class="d-flex justify-content-center mt-4">
                        <a href="{{ route('estate.advanced-search') }}" class="btn btn-primary btn-lg">
                            <i class="fas fa-search"></i> Detaylı Arama Yap
                        </a>
                    </div>
                @else
                    <div class="text-center py-5">
                        <h4 class="text-muted">Arama kriterlerinize uygun ilan bulunamadı</h4>
                        <p class="text-muted">Farklı kriterlerle arama yapmayı deneyin.</p>
                        <a href="{{ route('home') }}" class="btn btn-primary">Ana Sayfaya Dön</a>
                    </div>
                @endif
            </div>

            <!-- Search Filters Sidebar -->
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Arama Filtreleri</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('estate.search') }}" method="GET">
                            <!-- Preserve current search parameters -->
                            @foreach($request->except(['type', 'status', 'price_min', 'price_max', 'gross_m2', 'net_m2', 'number_of_rooms', 'heating', 'open_area_m2', 'title_deed_status', 'from_person', 'parking', 'usage_status', 'site_content']) as $key => $value)
                                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                            @endforeach

                            <div class="mb-3">
                                <label for="type" class="form-label">İlan Tipi</label>
                                <select class="form-select" name="type">
                                    <option value="">Tümü</option>
                                    <option value="Daire" {{ $request->type == 'Daire' ? 'selected' : '' }}>Daire</option>
                                    <option value="Müstakil" {{ $request->type == 'Müstakil' ? 'selected' : '' }}>Müstakil</option>
                                    <option value="Arsa" {{ $request->type == 'Arsa' ? 'selected' : '' }}>Arsa</option>
                                    <option value="Dükkan" {{ $request->type == 'Dükkan' ? 'selected' : '' }}>Dükkan</option>
                                    <option value="Ofis" {{ $request->type == 'Ofis' ? 'selected' : '' }}>Ofis</option>
                                    <option value="Villa" {{ $request->type == 'Villa' ? 'selected' : '' }}>Villa</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Durum</label>
                                <select class="form-select" name="status">
                                    <option value="">Tümü</option>
                                    <option value="Satılık" {{ $request->status == 'Satılık' ? 'selected' : '' }}>Satılık</option>
                                    <option value="Kiralık" {{ $request->status == 'Kiralık' ? 'selected' : '' }}>Kiralık</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="price_min" class="form-label">Min Fiyat</label>
                                <input type="number" class="form-control" name="price_min" value="{{ $request->price_min }}" placeholder="₺">
                            </div>

                            <div class="mb-3">
                                <label for="price_max" class="form-label">Max Fiyat</label>
                                <input type="number" class="form-control" name="price_max" value="{{ $request->price_max }}" placeholder="₺">
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Filtrele</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection 