@extends('layouts.admin.app')

@section('title', 'Hizmetler İçeriği Düzenle')

@section('content')
<div class="body-wrapper-inner">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h2>Hizmetler İçeriği Düzenle</h2>
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <form action="{{ route('admin.service-content.update') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="title">Sayfa Başlığı</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $serviceContent->title ?? 'Sunduğumuz Hizmetler' }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="main_content">Ana Açıklama</label>
                        <textarea class="form-control" id="main_content" name="main_content" rows="3" required>{{ $serviceContent->main_content ?? 'Midyat\'ta emlak sektöründe kapsamlı hizmetler sunuyoruz' }}</textarea>
                    </div>

                    <h5 class="mt-4 mb-2">Hizmetler</h5>
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
                    @for($i = 0; $i < 6; $i++)
                        @php $service = $services[$i] ?? ['title' => '', 'description' => '', 'icon' => 'ion-ios-home', 'features' => []]; @endphp
                        <div class="card mb-3">
                            <div class="card-header">
                                <h6 class="mb-0">Hizmet {{ $i + 1 }}</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label class="form-label">Hizmet Başlığı</label>
                                        <input type="text" class="form-control" name="service_title_{{ $i }}" value="{{ $service['title'] }}">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label class="form-label">İkon (ion-ios-*)</label>
                                        <input type="text" class="form-control" name="service_icon_{{ $i }}" value="{{ $service['icon'] }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                        <label class="form-label">Açıklama</label>
                                        <textarea class="form-control" name="service_description_{{ $i }}" rows="2">{{ $service['description'] }}</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-label">Özellikler (Her satıra bir özellik)</label>
                                        <textarea class="form-control" name="service_features_{{ $i }}" rows="4">{{ implode("\n", $service['features']) }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor

                    <h5 class="mt-4 mb-2">Çalışma Süreci</h5>
                    @php
                        $processSteps = $serviceContent->process_steps ?? [
                            ['title' => 'İlk Görüşme', 'description' => 'İhtiyaçlarınızı dinleyip size en uygun seçenekleri sunuyoruz.'],
                            ['title' => 'Araştırma', 'description' => 'Piyasayı analiz edip size en uygun gayrimenkulleri buluyoruz.'],
                            ['title' => 'Görüntüleme', 'description' => 'Seçtiğimiz gayrimenkulleri birlikte görüntülüyoruz.'],
                            ['title' => 'Anlaşma', 'description' => 'Kararınızı verdikten sonra tüm işlemleri tamamlıyoruz.']
                        ];
                    @endphp
                    @for($i = 0; $i < 4; $i++)
                        @php $step = $processSteps[$i] ?? ['title' => '', 'description' => '']; @endphp
                        <div class="card mb-3">
                            <div class="card-header">
                                <h6 class="mb-0">Adım {{ $i + 1 }}</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label class="form-label">Başlık</label>
                                        <input type="text" class="form-control" name="process_title_{{ $i }}" value="{{ $step['title'] }}">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label class="form-label">Açıklama</label>
                                        <textarea class="form-control" name="process_description_{{ $i }}" rows="2">{{ $step['description'] }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor

                    <h5 class="mt-4 mb-2">Fiyatlandırma Planları</h5>
                    @php
                        $pricingPlans = $serviceContent->pricing_plans ?? [
                            ['title' => 'Temel Hizmet', 'price' => '%2', 'features' => ['Gayrimenkul Arama', 'Görüntüleme Desteği', 'Temel Danışmanlık', 'İletişim Koordinasyonu'], 'featured' => false],
                            ['title' => 'Kapsamlı Hizmet', 'price' => '%3', 'features' => ['Tüm Temel Hizmetler', 'Değerleme Raporu', 'Pazarlık Desteği', 'Tapu İşlemleri', 'Kredi Danışmanlığı'], 'featured' => true],
                            ['title' => 'Premium Hizmet', 'price' => '%4', 'features' => ['Tüm Kapsamlı Hizmetler', 'Özel Pazarlama', 'Hukuki Danışmanlık', 'Sigorta Hizmetleri', '7/24 Destek'], 'featured' => false]
                        ];
                    @endphp
                    @for($i = 0; $i < 3; $i++)
                        @php $plan = $pricingPlans[$i] ?? ['title' => '', 'price' => '', 'features' => [], 'featured' => false]; @endphp
                        <div class="card mb-3">
                            <div class="card-header">
                                <h6 class="mb-0">Plan {{ $i + 1 }}</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mb-2">
                                        <label class="form-label">Plan Adı</label>
                                        <input type="text" class="form-control" name="pricing_title_{{ $i }}" value="{{ $plan['title'] }}">
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label class="form-label">Fiyat</label>
                                        <input type="text" class="form-control" name="pricing_price_{{ $i }}" value="{{ $plan['price'] }}">
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label class="form-label d-block">Öne Çıkan Plan</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="pricing_featured_{{ $i }}" {{ $plan['featured'] ? 'checked' : '' }}>
                                            <label class="form-check-label">Öne çıkan plan olarak işaretle</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-label">Özellikler (Her satıra bir özellik)</label>
                                        <textarea class="form-control" name="pricing_features_{{ $i }}" rows="4">{{ implode("\n", $plan['features']) }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor

                    <button type="submit" class="btn btn-primary">Kaydet</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 