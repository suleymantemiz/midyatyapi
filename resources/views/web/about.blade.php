@extends('layouts.web.app')

@section('title', 'Hakkımızda - Midyat Emlak')

@section('hero')
<!-- Hero Section -->
<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('images/bg_1.jpg') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-3 bread">Hakkımızda</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Ana Sayfa</a></span> <span>Hakkımızda</span></p>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<!-- About Section -->
<section class="about-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4">
                <img src="{{ asset('images/about.jpg') }}" alt="Midyat Emlak" class="img-fluid about-image">
            </div>
            <div class="col-lg-6">
                <h2 class="mb-4">{{ $aboutContent->title ?? 'Midyat Emlak\'a Hoş Geldiniz' }}</h2>
                <div class="mb-4">
                    {!! nl2br(e($aboutContent->main_content ?? 'Mardin\'in güzel ilçesi Midyat\'ta güvenilir emlak hizmeti sunuyoruz. 2010 yılından bu yana Midyat ve çevresinde emlak sektöründe faaliyet gösteren firmamız, müşterilerimize en kaliteli hizmeti sunmak için çalışmaktadır. Deneyimli ekibimiz ve güvenilir hizmet anlayışımızla, hayalinizdeki evi bulmanıza yardımcı oluyoruz. Satılık, kiralık konutlar, ticari gayrimenkuller ve arsa alım-satım konularında uzman kadromuzla hizmetinizdeyiz.')) !!}
                </div>
                <div class="row mt-4">
                    <div class="col-6">
                        @php
                            $features = $aboutContent->features ? explode("\n", $aboutContent->features) : [
                                'Güvenilir Hizmet',
                                'Deneyimli Ekip', 
                                'Müşteri Memnuniyeti',
                                'Profesyonel Yaklaşım',
                                'Şeffaf İletişim',
                                'Kaliteli Hizmet'
                            ];
                            $leftFeatures = array_slice($features, 0, 3);
                            $rightFeatures = array_slice($features, 3, 3);
                        @endphp
                        
                        @foreach($leftFeatures as $feature)
                        <div class="d-flex align-items-center mb-3">
                            <i class="ion-ios-checkmark-circle mr-3" style="font-size: 24px; color: #d4ca68;"></i>
                            <span>{{ trim($feature) }}</span>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-6">
                        @foreach($rightFeatures as $feature)
                        <div class="d-flex align-items-center mb-3">
                            <i class="ion-ios-checkmark-circle mr-3" style="font-size: 24px; color: #d4ca68;"></i>
                            <span>{{ trim($feature) }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section py-5" style="background: linear-gradient(135deg, rgba(212, 202, 104, 0.1) 0%, rgba(212, 202, 104, 0.05) 100%);">
    <div class="container">
        <div class="row text-center mb-4">
            <div class="col-12">
                <h3 class="mb-2" style="color: #d4ca68;">Başarılarımız</h3>
                <p class="text-muted">Yılların deneyimi ve güvenilir hizmet anlayışımızla</p>
            </div>
        </div>
        <div class="row">
            @php
                $stats = $aboutContent->stats ? explode("\n", $aboutContent->stats) : [
                    '500+|Mutlu Müşteri',
                    '1000+|Tamamlanan İşlem',
                    '15+|Yıllık Deneyim',
                    '24/7|Müşteri Desteği'
                ];
            @endphp
            
            @foreach($stats as $stat)
                @php
                    $statParts = explode('|', trim($stat));
                    $number = $statParts[0] ?? '';
                    $label = $statParts[1] ?? '';
                @endphp
                <div class="col-md-3">
                    <div class="stat-item">
                        <div class="stat-number">{{ $number }}</div>
                        <div class="stat-label">{{ $label }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-5">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="mb-4" style="color: #d4ca68;">Neden Bizi Seçmelisiniz?</h2>
                <p class="lead">Midyat'ta emlak sektöründe öncü firma olarak hizmet veriyoruz</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="ion-ios-home"></i>
                    </div>
                    <h4>Geniş Portföy</h4>
                    <p>Satılık ve kiralık konutlar, ticari gayrimenkuller ve arsalar dahil geniş bir portföy sunuyoruz.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="ion-ios-people"></i>
                    </div>
                    <h4>Uzman Kadro</h4>
                    <p>Deneyimli ve uzman kadromuzla size en uygun gayrimenkulü bulmanıza yardımcı oluyoruz.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="ion-ios-heart"></i>
                    </div>
                    <h4>Müşteri Odaklı</h4>
                    <p>Müşteri memnuniyeti odaklı çalışma prensibiyle hizmet veriyoruz.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Info Section -->
<section class="py-5" style="background: linear-gradient(135deg, rgba(212, 202, 104, 0.05) 0%, rgba(212, 202, 104, 0.02) 100%);">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="contact-info">
                    <h3 class="text-center mb-4" style="color: #d4ca68;">İletişim Bilgilerimiz</h3>
                    <div class="row">
                        @php
                            $contacts = $aboutContent->contact ? explode("\n", $aboutContent->contact) : [
                                'Adres|Midyat, Mardin, Türkiye',
                                'Telefon|+90 482 123 45 67',
                                'E-posta|info@midyatemlak.com',
                                'Çalışma Saatleri|Pazartesi - Cumartesi: 09:00 - 18:00'
                            ];
                            $contactIcons = [
                                'Adres' => 'ion-ios-location',
                                'Telefon' => 'ion-ios-telephone',
                                'E-posta' => 'ion-ios-email',
                                'Çalışma Saatleri' => 'ion-ios-time'
                            ];
                        @endphp
                        
                        @foreach($contacts as $contact)
                            @php
                                $contactParts = explode('|', trim($contact));
                                $title = $contactParts[0] ?? '';
                                $value = $contactParts[1] ?? '';
                                $icon = $contactIcons[$title] ?? 'ion-ios-information';
                            @endphp
                            <div class="col-md-6">
                                <div class="contact-item">
                                    <div class="contact-icon">
                                        <i class="{{ $icon }}"></i>
                                    </div>
                                    <div>
                                        <h5>{{ $title }}</h5>
                                        <p>{{ $value }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<style>
.about-image {
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.stat-item {
    text-align: center;
    padding: 30px 20px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    margin-bottom: 30px;
    transition: all 0.3s ease;
}

.stat-item:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(212, 202, 104, 0.2);
}

.stat-item:hover .stat-number {
    color: #c4b76a;
}

.stat-number {
    font-size: 2.5rem;
    font-weight: bold;
    color: #d4ca68;
    margin-bottom: 10px;
}

.stat-label {
    font-size: 1.1rem;
    color: #6c757d;
}

.feature-card {
    text-align: center;
    padding: 30px 20px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    height: 100%;
    transition: transform 0.3s ease;
}

.feature-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(212, 202, 104, 0.2);
}

.feature-card:hover .feature-icon {
    color: #c4b76a;
}

.feature-icon {
    font-size: 3rem;
    color: #d4ca68;
    margin-bottom: 20px;
}

.contact-item {
    display: flex;
    align-items: center;
    margin-bottom: 30px;
    padding: 20px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}

.contact-item:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(212, 202, 104, 0.15);
}

.contact-item:hover .contact-icon {
    color: #c4b76a;
}

.contact-icon {
    font-size: 2rem;
    color: #d4ca68;
    margin-right: 20px;
    min-width: 50px;
}

.contact-item h5 {
    margin-bottom: 5px;
    color: #333;
}

.contact-item p {
    margin-bottom: 0;
    color: #6c757d;
}
</style>
@endsection 