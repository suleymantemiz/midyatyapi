@extends('layouts.admin.app')

@section('title', 'Ana Sayfa İçeriği Düzenle')

@section('content')
<div class="body-wrapper-inner">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h2>Ana Sayfa İçeriği Düzenle</h2>
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <form action="{{ route('admin.home-content.update') }}" method="POST">
                    @csrf
                    
                    <!-- Hero Bölümü -->
                    <h4 class="mb-3">Hero Bölümü</h4>
                    <div class="form-group mb-3">
                        <label for="hero_title">Ana Başlık</label>
                        <input type="text" name="hero_title" id="hero_title" class="form-control" value="{{ old('hero_title', $homeContent->hero_title ?? 'Midyat\'ta Güvenilir Emlak Çözümleri') }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="hero_subtitle">Alt Başlık</label>
                        <textarea name="hero_subtitle" id="hero_subtitle" class="form-control" rows="2">{{ old('hero_subtitle', $homeContent->hero_subtitle ?? 'Hayalinizdeki evi bulun, güvenle yatırım yapın') }}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="hero_button_text">Buton Metni</label>
                                <input type="text" name="hero_button_text" id="hero_button_text" class="form-control" value="{{ old('hero_button_text', $homeContent->hero_button_text ?? 'İlanları İncele') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="hero_button_url">Buton Linki</label>
                                <input type="text" name="hero_button_url" id="hero_button_url" class="form-control" value="{{ old('hero_button_url', $homeContent->hero_button_url ?? '/properties') }}">
                            </div>
                        </div>
                    </div>

                    <!-- Hakkımızda Bölümü -->
                    <h4 class="mb-3 mt-4">Hakkımızda Bölümü</h4>
                    <div class="form-group mb-3">
                        <label for="about_title">Başlık</label>
                        <input type="text" name="about_title" id="about_title" class="form-control" value="{{ old('about_title', $homeContent->about_title ?? 'Neden Bizi Seçmelisiniz?') }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="about_content">İçerik</label>
                        <textarea name="about_content" id="about_content" class="form-control" rows="3">{{ old('about_content', $homeContent->about_content ?? 'Midyat\'ta emlak sektöründe uzun yıllar deneyimimizle, size en uygun gayrimenkulü bulmanızda yardımcı oluyoruz.') }}</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="about_features">Öne Çıkan Özellikler (Her satır bir özellik)</label>
                        <textarea name="about_features" id="about_features" class="form-control" rows="4">{{ old('about_features', is_array($homeContent->about_features ?? []) ? implode("\n", $homeContent->about_features) : 'Profesyonel Danışmanlık
Güvenilir Hizmet
Hızlı Çözüm
Müşteri Memnuniyeti') }}</textarea>
                    </div>

                    <!-- İstatistikler -->
                    <h4 class="mb-3 mt-4">İstatistikler</h4>
                    <div class="form-group mb-3">
                        <label for="statistics">İstatistikler (Her satır bir istatistik, ör: 500+ Mutlu Müşteri)</label>
                        <textarea name="statistics" id="statistics" class="form-control" rows="3">{{ old('statistics', is_array($homeContent->statistics ?? []) ? implode("\n", $homeContent->statistics) : '500+ Mutlu Müşteri
1000+ Tamamlanan İşlem
10+ Yıllık Deneyim
%98 Müşteri Memnuniyeti') }}</textarea>
                    </div>

                    <!-- Ana Sayfa Hizmetler Bölümü (Tanıtımsal) -->
                    <h4 class="mb-3 mt-4">Ana Sayfa Hizmetler Bölümü (Tanıtımsal)</h4>
                    <div class="form-group mb-3">
                        <label for="home_services_title">Başlık</label>
                        <input type="text" name="home_services_title" id="home_services_title" class="form-control" value="{{ old('home_services_title', $homeContent->home_services_title ?? 'Sunduğumuz Hizmetler') }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="home_services_subtitle">Alt Başlık</label>
                        <textarea name="home_services_subtitle" id="home_services_subtitle" class="form-control" rows="2">{{ old('home_services_subtitle', $homeContent->home_services_subtitle ?? 'Kapsamlı emlak hizmetlerimizle yanınızdayız') }}</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="home_services">Ana Sayfa Hizmetleri (Format: Başlık|Açıklama - Her satır bir hizmet)</label>
                        <textarea name="home_services" id="home_services" class="form-control" rows="8">{{ old('home_services', function() use ($homeContent) {
                            if (is_array($homeContent->home_services ?? [])) {
                                $services = [];
                                foreach ($homeContent->home_services as $service) {
                                    if (is_array($service)) {
                                        $services[] = $service['title'] . '|' . $service['description'];
                                    } else {
                                        $services[] = $service;
                                    }
                                }
                                return implode("\n", $services);
                            }
                            return 'Kredi Desteği|Midyat\'ta emlak alımında kredi desteği sağlıyoruz. Bankalarla anlaşmalı çözümlerimizle hayalinizdeki eve kavuşun.
Nakit Alım|Nakit alım yapmak isteyen müşterilerimiz için özel fırsatlar sunuyoruz. Hızlı ve güvenli işlem garantisi.
Uzman Danışmanlık|Midyat\'ın en deneyimli emlak uzmanları size hizmet veriyor. Her adımda yanınızdayız.
Sabit Fiyat Garantisi|Anlaştığımız fiyatlar değişmez. Şeffaf ve güvenilir fiyatlandırma politikamızla hizmetinizdeyiz.';
                        }) }}</textarea>
                        <small class="form-text text-muted">Format: Hizmet Başlığı|Hizmet Açıklaması (| işareti ile ayırın) - Bu hizmetler ana sayfada tanıtımsal olarak gösterilir</small>
                    </div>

                    <!-- Öne Çıkan İlanlar -->
                    <h4 class="mb-3 mt-4">Öne Çıkan İlanlar</h4>
                    <div class="form-group mb-3">
                        <label for="featured_title">Başlık</label>
                        <input type="text" name="featured_title" id="featured_title" class="form-control" value="{{ old('featured_title', $homeContent->featured_title ?? 'Öne Çıkan İlanlar') }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="featured_subtitle">Alt Başlık</label>
                        <textarea name="featured_subtitle" id="featured_subtitle" class="form-control" rows="2">{{ old('featured_subtitle', $homeContent->featured_subtitle ?? 'Sizin için seçtiğimiz özel teklifler') }}</textarea>
                    </div>

                    <!-- Müşteri Yorumları -->
                    <h4 class="mb-3 mt-4">Müşteri Yorumları</h4>
                    <div class="form-group mb-3">
                        <label for="testimonials_title">Başlık</label>
                        <input type="text" name="testimonials_title" id="testimonials_title" class="form-control" value="{{ old('testimonials_title', $homeContent->testimonials_title ?? 'Müşteri Yorumları') }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="testimonials_subtitle">Alt Başlık</label>
                        <textarea name="testimonials_subtitle" id="testimonials_subtitle" class="form-control" rows="2">{{ old('testimonials_subtitle', $homeContent->testimonials_subtitle ?? 'Müşterilerimizin deneyimleri') }}</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="testimonials">Müşteri Yorumları (Her satır bir yorum, ör: "Harika hizmet aldık" - Ahmet Yılmaz)</label>
                        <textarea name="testimonials" id="testimonials" class="form-control" rows="4">{{ old('testimonials', is_array($homeContent->testimonials ?? []) ? implode("\n", $homeContent->testimonials) : '"Harika hizmet aldık, çok teşekkürler" - Ahmet Yılmaz
"Güvenilir ve profesyonel ekip" - Fatma Demir
"Hayalimizdeki evi bulduk" - Mehmet Kaya
"Kesinlikle tavsiye ederim" - Ayşe Özkan') }}</textarea>
                    </div>

                    <!-- İletişim CTA -->
                    <h4 class="mb-3 mt-4">İletişim CTA</h4>
                    <div class="form-group mb-3">
                        <label for="cta_title">Başlık</label>
                        <input type="text" name="cta_title" id="cta_title" class="form-control" value="{{ old('cta_title', $homeContent->cta_title ?? 'Hayalinizdeki Evi Bulun') }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="cta_content">İçerik</label>
                        <textarea name="cta_content" id="cta_content" class="form-control" rows="2">{{ old('cta_content', $homeContent->cta_content ?? 'Uzman ekibimizle iletişime geçin, size en uygun çözümü sunalım') }}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="cta_button_text">Buton Metni</label>
                                <input type="text" name="cta_button_text" id="cta_button_text" class="form-control" value="{{ old('cta_button_text', $homeContent->cta_button_text ?? 'İletişime Geç') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="cta_button_url">Buton Linki</label>
                                <input type="text" name="cta_button_url" id="cta_button_url" class="form-control" value="{{ old('cta_button_url', $homeContent->cta_button_url ?? '/contact') }}">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Kaydet</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 