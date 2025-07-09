@extends('layouts.web.app')

@section('title', 'Detaylı Arama - Midyat Emlak')

@section('hero')
<!-- Hero Section -->
<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('images/bg_1.jpg') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-3 bread">Detaylı Arama</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Ana Sayfa</a></span> <span>Detaylı Arama</span></p>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<!-- Advanced Search Section -->
<section class="ftco-section goto-here">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="mb-0">Detaylı İlan Arama</h2>
                        <p class="text-muted mb-0">Arama kriterlerinizi belirleyerek size en uygun ilanları bulun</p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('estate.search') }}" method="GET">
                            <!-- Basic Search Criteria -->
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="neighborhood" class="form-label">Mahalle</label>
                                    <select class="form-select" name="neighborhood">
                                        <option value="">Tümü</option>
                                        <option value="Bahçelievler">Bahçelievler</option>
                                        <option value="Cumhuriyet">Cumhuriyet</option>
                                        <option value="Gölcük">Gölcük</option>
                                        <option value="Gültepe">Gültepe</option>
                                        <option value="Harmanlı">Harmanlı</option>
                                        <option value="Işıklar">Işıklar</option>
                                        <option value="Şenköy">Şenköy</option>
                                        <option value="Yenimahalle">Yenimahalle</option>
                                        <option value="Estel">Estel</option>
                                        <option value="Akçakaya">Akçakaya</option>
                                        <option value="Anıtlı">Anıtlı</option>
                                        <option value="Mercimekli">Mercimekli</option>
                                        <option value="Yolbaşı">Yolbaşı</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="type" class="form-label">İlan Tipi</label>
                                    <select class="form-select" name="type">
                                        <option value="">Tümü</option>
                                        <option value="Daire">Daire</option>
                                        <option value="Müstakil">Müstakil</option>
                                        <option value="Arsa">Arsa</option>
                                        <option value="Dükkan">Dükkan</option>
                                        <option value="Ofis">Ofis</option>
                                        <option value="Villa">Villa</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="status" class="form-label">Durum</label>
                                    <select class="form-select" name="status">
                                        <option value="">Tümü</option>
                                        <option value="Satılık">Satılık</option>
                                        <option value="Kiralık">Kiralık</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="price_max" class="form-label">Max Fiyat</label>
                                    <input type="number" class="form-control" name="price_max" placeholder="₺">
                                </div>
                            </div>

                            <!-- Detailed Search Criteria -->
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="gross_m2" class="form-label">Brüt m² (Min)</label>
                                    <input type="number" class="form-control" name="gross_m2" placeholder="m²">
                                </div>
                                <div class="col-md-3">
                                    <label for="net_m2" class="form-label">Net m² (Min)</label>
                                    <input type="number" class="form-control" name="net_m2" placeholder="m²">
                                </div>
                                <div class="col-md-3">
                                    <label for="number_of_rooms" class="form-label">Oda Sayısı</label>
                                    <select class="form-select" name="number_of_rooms">
                                        <option value="">Seçiniz</option>
                                        <option value="1+0">1+0</option>
                                        <option value="1+1">1+1</option>
                                        <option value="2+1">2+1</option>
                                        <option value="3+1">3+1</option>
                                        <option value="4+1">4+1</option>
                                        <option value="5+1">5+1</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="heating" class="form-label">Isıtma</label>
                                    <select class="form-select" name="heating">
                                        <option value="">Seçiniz</option>
                                        <option value="Doğalgaz">Doğalgaz</option>
                                        <option value="Soba">Soba</option>
                                        <option value="Klima">Klima</option>
                                        <option value="Merkezi">Merkezi</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="open_area_m2" class="form-label">Açık Alan m² (Min)</label>
                                    <input type="number" class="form-control" name="open_area_m2" placeholder="m²">
                                </div>
                                <div class="col-md-3">
                                    <label for="title_deed_status" class="form-label">Tapu Durumu</label>
                                    <select class="form-select" name="title_deed_status">
                                        <option value="">Seçiniz</option>
                                        <option value="Arsa Tapulu">Arsa Tapulu</option>
                                        <option value="Hisseli Tapulu">Hisseli Tapulu</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="from_person" class="form-label">İlan Sahibi</label>
                                    <select class="form-select" name="from_person">
                                        <option value="">Seçiniz</option>
                                        <option value="Sahibinden">Sahibinden</option>
                                        <option value="Emlakçıdan">Emlakçıdan</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="parking" class="form-label">Otopark</label>
                                    <select class="form-select" name="parking">
                                        <option value="">Seçiniz</option>
                                        <option value="Yok">Yok</option>
                                        <option value="Açık Otopark">Açık Otopark</option>
                                        <option value="Kapalı Otopark">Kapalı Otopark</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="usage_status" class="form-label">Kullanım Durumu</label>
                                    <select class="form-select" name="usage_status">
                                        <option value="">Seçiniz</option>
                                        <option value="Boş">Boş</option>
                                        <option value="Kiracı">Kiracı</option>
                                        <option value="İnşaat Halinde">İnşaat Halinde</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="site_content" class="form-label">Site İçinde mi?</label>
                                    <select class="form-select" name="site_content">
                                        <option value="">Seçiniz</option>
                                        <option value="Evet">Evet</option>
                                        <option value="Hayır">Hayır</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="price_min" class="form-label">Min Fiyat</label>
                                    <input type="number" class="form-control" name="price_min" placeholder="₺">
                                </div>
                                <div class="col-md-3">
                                    <label for="address" class="form-label">Adres (Anahtar Kelime)</label>
                                    <input type="text" class="form-control" name="address" placeholder="Adres içinde geçen kelime">
                                </div>
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-search"></i> Detaylı Arama Yap
                                </button>
                                <button type="reset" class="btn btn-outline-danger">
                                    <i class="fas fa-times"></i> Temizle
                                </button>
                                <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-home"></i> Ana Sayfaya Dön
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection 