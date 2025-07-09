@extends('layouts.web.app')

@section('title', 'Hizmetlerimiz - Midyat Emlak')

@section('hero')
<!-- Hero Section -->
<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('images/bg_1.jpg') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-3 bread">Hizmetlerimiz</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Ana Sayfa</a></span> <span>Hizmetlerimiz</span></p>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<!-- Services Section -->
<section class="services-section">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="mb-4">{{ $serviceContent->title ?? 'Sunduğumuz Hizmetler' }}</h2>
                <p class="lead">{{ $serviceContent->main_content ?? 'Midyat\'ta emlak sektöründe kapsamlı hizmetler sunuyoruz' }}</p>
            </div>
        </div>
        <div class="row">
            @php
                $services = $serviceContent->services ?? [
                    ['title' => 'Konut Alım-Satım', 'description' => 'Satılık ve kiralık konutlar için profesyonel danışmanlık hizmeti sunuyoruz.', 'icon' => 'ion-ios-home', 'features' => ['Daire ve Villa Satışı', 'Kiralık Konut Hizmeti', 'Değerleme ve Fiyat Analizi', 'Pazarlık ve Müzakere Desteği']],
                    ['title' => 'Ticari Gayrimenkul', 'description' => 'Ofis, dükkan, depo gibi ticari gayrimenkuller için özel hizmetler.', 'icon' => 'ion-ios-business', 'features' => ['Ofis ve Dükkan Satışı', 'Depo ve Fabrika Hizmeti', 'Yatırım Danışmanlığı', 'Kira Yönetimi']],
                    ['title' => 'Arsa ve Tarla', 'description' => 'Arsa, tarla ve bahçe alım-satım konularında uzman hizmet.', 'icon' => 'ion-ios-location', 'features' => ['Arsa Satışı', 'Tarla ve Bahçe Hizmeti', 'İmar Durumu Kontrolü', 'Tapu İşlemleri']],
                    ['title' => 'Parsel Sorgulama', 'description' => 'TKGM entegrasyonu ile anlık parsel sorgulama hizmeti.', 'icon' => 'ion-ios-search', 'features' => ['Anlık Parsel Bilgisi', 'Tapu Durumu Kontrolü', 'İmar Bilgileri', 'Mülkiyet Analizi']],
                    ['title' => 'Tapu İşlemleri', 'description' => 'Tapu işlemleri ve resmi süreçlerde profesyonel destek.', 'icon' => 'ion-ios-document', 'features' => ['Tapu Devir İşlemleri', 'İpotek İşlemleri', 'Belge Hazırlama', 'Resmi Süreç Takibi']],
                    ['title' => 'Değerleme', 'description' => 'Gayrimenkul değerleme ve fiyat analizi hizmetleri.', 'icon' => 'ion-ios-calculator', 'features' => ['Piyasa Analizi', 'Değerleme Raporu', 'Fiyat Tahmini', 'Yatırım Danışmanlığı']]
                ];
            @endphp
            
            @foreach($services as $service)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="{{ $service['icon'] }}"></i>
                        </div>
                        <h4 class="service-title">{{ $service['title'] }}</h4>
                        <p class="service-description">{{ $service['description'] }}</p>
                        <ul class="service-features">
                            @foreach($service['features'] as $feature)
                                <li>{{ $feature }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Process Section -->
<section class="process-section">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="mb-4">Çalışma Sürecimiz</h2>
                <p class="lead">Müşteri memnuniyeti odaklı çalışma prensibi</p>
            </div>
        </div>
        <div class="row">
            @php
                $processSteps = $serviceContent->process_steps ?? [
                    ['title' => 'İlk Görüşme', 'description' => 'İhtiyaçlarınızı dinleyip size en uygun seçenekleri sunuyoruz.'],
                    ['title' => 'Araştırma', 'description' => 'Piyasayı analiz edip size en uygun gayrimenkulleri buluyoruz.'],
                    ['title' => 'Görüntüleme', 'description' => 'Seçtiğimiz gayrimenkulleri birlikte görüntülüyoruz.'],
                    ['title' => 'Anlaşma', 'description' => 'Kararınızı verdikten sonra tüm işlemleri tamamlıyoruz.']
                ];
            @endphp
            
            @foreach($processSteps as $step)
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="process-step">
                        <div class="process-number">{{ $step['number'] ?? $loop->iteration }}</div>
                        <h5>{{ $step['title'] }}</h5>
                        <p>{{ $step['description'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Pricing Section -->
<section class="pricing-section">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="mb-4">Hizmet Ücretlerimiz</h2>
                <p class="lead">Şeffaf ve uygun fiyatlı hizmet anlayışımız</p>
            </div>
        </div>
        <div class="row">
            @php
                $pricingPlans = $serviceContent->pricing_plans ?? [
                    ['title' => 'Temel Hizmet', 'price' => '%2', 'features' => ['Gayrimenkul Arama', 'Görüntüleme Desteği', 'Temel Danışmanlık', 'İletişim Koordinasyonu'], 'featured' => false],
                    ['title' => 'Kapsamlı Hizmet', 'price' => '%3', 'features' => ['Tüm Temel Hizmetler', 'Değerleme Raporu', 'Pazarlık Desteği', 'Tapu İşlemleri', 'Kredi Danışmanlığı'], 'featured' => true],
                    ['title' => 'Premium Hizmet', 'price' => '%4', 'features' => ['Tüm Kapsamlı Hizmetler', 'Özel Pazarlama', 'Hukuki Danışmanlık', 'Sigorta Hizmetleri', '7/24 Destek'], 'featured' => false]
                ];
            @endphp
            
            @foreach($pricingPlans as $plan)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="pricing-card {{ $plan['featured'] ? 'featured' : '' }}">
                        <h4 class="pricing-title">{{ $plan['title'] }}</h4>
                        <div class="pricing-price">{{ $plan['price'] }}</div>
                        <ul class="pricing-features">
                            @foreach($plan['features'] as $feature)
                                <li>{{ $feature }}</li>
                            @endforeach
                        </ul>
                        <button class="btn btn-custom btn-block">İletişime Geç</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

@section('scripts')
    <style>
    .service-card {
    background: white;
      border-radius: 15px;
    padding: 30px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
      transition: all 0.3s ease;
      height: 100%;
    border: 1px solid #f8f9fa;
    }
    
    .service-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
    }
    
    .service-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #ffc107, #d4ca68);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
    margin: 0 auto 20px;
      color: white;
    font-size: 32px;
    }
    
    .service-title {
    color: #333;
    margin-bottom: 15px;
      font-weight: 600;
    }
    
    .service-description {
    color: #6c757d;
    margin-bottom: 20px;
      line-height: 1.6;
    }
    
    .service-features {
      list-style: none;
      padding: 0;
      margin: 0;
    }
    
    .service-features li {
      padding: 8px 0;
    color: #495057;
    position: relative;
    padding-left: 25px;
}

.service-features li:before {
    content: "✓";
    position: absolute;
    left: 0;
    color: #28a745;
      font-weight: bold;
    }
    
    .process-section {
      background: #f8f9fa;
      padding: 80px 0;
    }
    
    .process-step {
      text-align: center;
      padding: 30px 20px;
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    height: 100%;
    }
    
    .process-number {
      width: 60px;
      height: 60px;
    background: linear-gradient(135deg, #ffc107, #d4ca68);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
    margin: 0 auto 20px;
      color: white;
      font-size: 24px;
      font-weight: bold;
}

.process-step h5 {
    color: #333;
    margin-bottom: 15px;
}

.process-step p {
    color: #6c757d;
    line-height: 1.6;
    }
    
    .pricing-section {
      padding: 80px 0;
    }
    
    .pricing-card {
      background: white;
      border-radius: 15px;
      padding: 40px 30px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
      text-align: center;
    height: 100%;
    border: 2px solid transparent;
      transition: all 0.3s ease;
    }
    
    .pricing-card.featured {
    border-color: #ffc107;
      transform: scale(1.05);
    }
    
    .pricing-card:hover {
      transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
    }
    
    .pricing-title {
    color: #333;
    margin-bottom: 20px;
      font-weight: 600;
    }
    
    .pricing-price {
    font-size: 3rem;
      font-weight: bold;
    color: #ffc107;
    margin-bottom: 30px;
    }
    
    .pricing-features {
      list-style: none;
      padding: 0;
      margin: 0 0 30px 0;
    }
    
    .pricing-features li {
      padding: 10px 0;
    color: #495057;
    border-bottom: 1px solid #f8f9fa;
    }
    
    .pricing-features li:last-child {
      border-bottom: none;
    }
    
    .btn-custom {
    background: linear-gradient(135deg, #ffc107, #d4ca68);
      border: none;
      color: white;
      padding: 12px 30px;
      border-radius: 25px;
    font-weight: 600;
      transition: all 0.3s ease;
    }
    
    .btn-custom:hover {
    background: linear-gradient(135deg, #d4ca68, #b8a847);
      transform: translateY(-2px);
      color: white;
    text-decoration: none;
    }
    </style>
@endsection 