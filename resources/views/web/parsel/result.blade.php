@extends('layouts.web.app')

@section('title', 'Parsel Sorgulama Sonucu - Midyat Emlak')

@section('hero')
<!-- Hero Section -->
<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('images/bg_1.jpg') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-3 bread">Parsel Sorgulama Sonucu</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Ana Sayfa</a></span> <span class="mr-2"><a href="{{ route('parsel.index') }}">Parsel Sorgulama</a></span> <span>Sonuç</span></p>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<!-- Parsel Result Section -->
<section class="ftco-section goto-here">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        <h3 class="mb-0">
                            <i class="ion-ios-checkmark-circle"></i> Parsel Sorgulama Sonucu
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h5>Parsel Bilgileri</h5>
                                <p><strong>Parsel No:</strong> {{ $parcelData['parcel_number'] }}</p>
                                <p><strong>İl:</strong> {{ $parcelData['province'] }}</p>
                                <p><strong>İlçe:</strong> {{ $parcelData['district'] }}</p>
                                <p><strong>Mahalle:</strong> {{ $parcelData['neighborhood'] }}</p>
                            </div>
                            <div class="col-md-6">
                                <h5>Detay Bilgiler</h5>
                                <p><strong>Ada:</strong> {{ $parcelData['block'] }}</p>
                                <p><strong>Parsel:</strong> {{ $parcelData['parcel'] }}</p>
                                <p><strong>Alan:</strong> {{ $parcelData['area'] }}</p>
                                <p><strong>Arazi Türü:</strong> {{ $parcelData['land_type'] }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="mb-0">Mülkiyet Bilgileri</h6>
                                    </div>
                                    <div class="card-body">
                                        <p><strong>Mülkiyet Durumu:</strong> {{ $parcelData['ownership_status'] }}</p>
                                        <p><strong>Kadastro Alanı:</strong> {{ $parcelData['cadastral_area'] }}</p>
                                        <p><strong>Bina Alanı:</strong> {{ $parcelData['building_area'] }}</p>
                                        <p><strong>Kat Sayısı:</strong> {{ $parcelData['floor_count'] }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="mb-0">Yapı Bilgileri</h6>
                                    </div>
                                    <div class="card-body">
                                        <p><strong>İnşaat Yılı:</strong> {{ $parcelData['construction_year'] }}</p>
                                        <p><strong>İmar Durumu:</strong> {{ $parcelData['zoning_status'] }}</p>
                                        <p><strong>Kısıtlamalar:</strong> {{ $parcelData['restrictions'] }}</p>
                                        <p><strong>Son Güncelleme:</strong> {{ $parcelData['last_update'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('parsel.index') }}" class="btn btn-secondary">
                                        <i class="ion-ios-arrow-back"></i> Yeni Sorgulama
                                    </a>
                                    <a href="{{ route('parsel.estates', $parcelData['parcel_number']) }}" class="btn btn-primary">
                                        <i class="ion-ios-home"></i> Bu Parseldeki İlanları Görüntüle
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection 