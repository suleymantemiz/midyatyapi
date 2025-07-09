@extends('layouts.web.app')

@section('title', 'Parsel Sorgulama - Midyat Emlak')

@section('hero')
<!-- Hero Section -->
<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('images/bg_1.jpg') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-3 bread">Parsel Sorgulama</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Ana Sayfa</a></span> <span>Parsel Sorgulama</span></p>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<!-- Parsel Search Section -->
<section class="ftco-section goto-here">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">
                            <i class="ion-ios-search"></i> Parsel Sorgulama
                        </h3>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('parsel.search') }}">
                            @csrf
                            
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="province" class="form-label">İl *</label>
                                        <select class="form-control @error('province') is-invalid @enderror" id="province" name="province" required>
                                            <option value="">İl Seçiniz</option>
                                            <option value="Adana">Adana</option>
                                            <option value="Adıyaman">Adıyaman</option>
                                            <option value="Afyonkarahisar">Afyonkarahisar</option>
                                            <option value="Ağrı">Ağrı</option>
                                            <option value="Amasya">Amasya</option>
                                            <option value="Ankara">Ankara</option>
                                            <option value="Antalya">Antalya</option>
                                            <option value="Artvin">Artvin</option>
                                            <option value="Aydın">Aydın</option>
                                            <option value="Balıkesir">Balıkesir</option>
                                            <option value="Bilecik">Bilecik</option>
                                            <option value="Bingöl">Bingöl</option>
                                            <option value="Bitlis">Bitlis</option>
                                            <option value="Bolu">Bolu</option>
                                            <option value="Burdur">Burdur</option>
                                            <option value="Bursa">Bursa</option>
                                            <option value="Çanakkale">Çanakkale</option>
                                            <option value="Çankırı">Çankırı</option>
                                            <option value="Çorum">Çorum</option>
                                            <option value="Denizli">Denizli</option>
                                            <option value="Diyarbakır">Diyarbakır</option>
                                            <option value="Edirne">Edirne</option>
                                            <option value="Elazığ">Elazığ</option>
                                            <option value="Erzincan">Erzincan</option>
                                            <option value="Erzurum">Erzurum</option>
                                            <option value="Eskişehir">Eskişehir</option>
                                            <option value="Gaziantep">Gaziantep</option>
                                            <option value="Giresun">Giresun</option>
                                            <option value="Gümüşhane">Gümüşhane</option>
                                            <option value="Hakkari">Hakkari</option>
                                            <option value="Hatay">Hatay</option>
                                            <option value="Isparta">Isparta</option>
                                            <option value="Mersin">Mersin</option>
                                            <option value="İstanbul">İstanbul</option>
                                            <option value="İzmir">İzmir</option>
                                            <option value="Kars">Kars</option>
                                            <option value="Kastamonu">Kastamonu</option>
                                            <option value="Kayseri">Kayseri</option>
                                            <option value="Kırklareli">Kırklareli</option>
                                            <option value="Kırşehir">Kırşehir</option>
                                            <option value="Kocaeli">Kocaeli</option>
                                            <option value="Konya">Konya</option>
                                            <option value="Kütahya">Kütahya</option>
                                            <option value="Malatya">Malatya</option>
                                            <option value="Manisa">Manisa</option>
                                            <option value="Kahramanmaraş">Kahramanmaraş</option>
                                            <option value="Mardin">Mardin</option>
                                            <option value="Muğla">Muğla</option>
                                            <option value="Muş">Muş</option>
                                            <option value="Nevşehir">Nevşehir</option>
                                            <option value="Niğde">Niğde</option>
                                            <option value="Ordu">Ordu</option>
                                            <option value="Rize">Rize</option>
                                            <option value="Sakarya">Sakarya</option>
                                            <option value="Samsun">Samsun</option>
                                            <option value="Siirt">Siirt</option>
                                            <option value="Sinop">Sinop</option>
                                            <option value="Sivas">Sivas</option>
                                            <option value="Tekirdağ">Tekirdağ</option>
                                            <option value="Tokat">Tokat</option>
                                            <option value="Trabzon">Trabzon</option>
                                            <option value="Tunceli">Tunceli</option>
                                            <option value="Şanlıurfa">Şanlıurfa</option>
                                            <option value="Uşak">Uşak</option>
                                            <option value="Van">Van</option>
                                            <option value="Yozgat">Yozgat</option>
                                            <option value="Zonguldak">Zonguldak</option>
                                            <option value="Aksaray">Aksaray</option>
                                            <option value="Bayburt">Bayburt</option>
                                            <option value="Karaman">Karaman</option>
                                            <option value="Kırıkkale">Kırıkkale</option>
                                            <option value="Batman">Batman</option>
                                            <option value="Şırnak">Şırnak</option>
                                            <option value="Bartın">Bartın</option>
                                            <option value="Ardahan">Ardahan</option>
                                            <option value="Iğdır">Iğdır</option>
                                            <option value="Yalova">Yalova</option>
                                            <option value="Karabük">Karabük</option>
                                            <option value="Kilis">Kilis</option>
                                            <option value="Osmaniye">Osmaniye</option>
                                            <option value="Düzce">Düzce</option>
                                        </select>
                                        @error('province')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="district" class="form-label">İlçe *</label>
                                        <input type="text" class="form-control @error('district') is-invalid @enderror" 
                                               id="district" name="district" placeholder="İlçe adını giriniz" required>
                                        @error('district')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="parcel_number" class="form-label">Parsel Numarası *</label>
                                        <input type="text" class="form-control @error('parcel_number') is-invalid @enderror" 
                                               id="parcel_number" name="parcel_number" placeholder="Ada/Parsel No" required>
                                        @error('parcel_number')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mt-3">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-lg w-100">
                                        <i class="ion-ios-search"></i> Parsel Sorgula
                                    </button>
                                </div>
                            </div>
                        </form>
                        
                        <div class="mt-4">
                            <div class="alert alert-info">
                                <h5><i class="ion-ios-information-circle"></i> Bilgi</h5>
                                <p class="mb-0">
                                    Parsel sorgulama hizmeti ile tapu ve kadastro bilgilerine hızlıca ulaşabilirsiniz. 
                                    İl, ilçe ve parsel numarası bilgilerini girerek sorgulama yapabilirsiniz.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection 