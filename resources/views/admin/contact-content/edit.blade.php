@extends('layouts.admin.app')

@section('title', 'İletişim İçeriği Düzenle')

@section('content')
<div class="body-wrapper-inner">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h2>İletişim İçeriği Düzenle</h2>
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <form action="{{ route('admin.contact-content.update') }}" method="POST">
                    @csrf
                    
                    <div class="form-group mb-3">
                        <label for="title">Sayfa Başlığı</label>
                        <input type="text" class="form-control" id="title" name="title" 
                               value="{{ $contactContent->title ?? 'Bizimle İletişime Geçin' }}" required>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="main_content">Ana Açıklama</label>
                        <textarea class="form-control" id="main_content" name="main_content" rows="3" required>{{ $contactContent->main_content ?? 'Sorularınız için bize ulaşın, size yardımcı olmaktan mutluluk duyarız' }}</textarea>
                    </div>

                    <h5 class="mt-4 mb-2">İletişim Bilgileri</h5>
                    @php
                        $contactInfo = $contactContent->contact_info ?? [
                            ['title' => 'Adres', 'value' => 'Midyat, Mardin, Türkiye', 'icon' => 'ion-ios-location'],
                            ['title' => 'Telefon', 'value' => '+90 482 123 45 67', 'icon' => 'ion-ios-telephone'],
                            ['title' => 'E-posta', 'value' => 'info@midyatemlak.com', 'icon' => 'ion-ios-email']
                        ];
                    @endphp
                    
                    @for($i = 0; $i < 3; $i++)
                        @php $contact = $contactInfo[$i] ?? ['title' => '', 'value' => '', 'icon' => 'ion-ios-information']; @endphp
                        <div class="card mb-3">
                            <div class="card-header">
                                <h6 class="mb-0">İletişim Bilgisi {{ $i + 1 }}</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mb-2">
                                        <label class="form-label">Başlık</label>
                                        <input type="text" class="form-control" name="contact_title_{{ $i }}" 
                                               value="{{ $contact['title'] }}">
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label class="form-label">Değer</label>
                                        <input type="text" class="form-control" name="contact_value_{{ $i }}" 
                                               value="{{ $contact['value'] }}">
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label class="form-label">İkon (ion-ios-*)</label>
                                        <input type="text" class="form-control" name="contact_icon_{{ $i }}" 
                                               value="{{ $contact['icon'] }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor

                    <h5 class="mt-4 mb-2">Çalışma Saatleri</h5>
                    @php
                        $workingHours = $contactContent->working_hours ?? [
                            ['day' => 'Pazartesi', 'hours' => '09:00 - 18:00'],
                            ['day' => 'Salı', 'hours' => '09:00 - 18:00'],
                            ['day' => 'Çarşamba', 'hours' => '09:00 - 18:00'],
                            ['day' => 'Perşembe', 'hours' => '09:00 - 18:00'],
                            ['day' => 'Cuma', 'hours' => '09:00 - 18:00'],
                            ['day' => 'Cumartesi', 'hours' => '09:00 - 15:00'],
                            ['day' => 'Pazar', 'hours' => 'Kapalı']
                        ];
                    @endphp
                    
                    @for($i = 0; $i < 7; $i++)
                        @php $day = $workingHours[$i] ?? ['day' => '', 'hours' => '']; @endphp
                        <div class="card mb-3">
                            <div class="card-header">
                                <h6 class="mb-0">{{ $i + 1 }}. Gün</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label class="form-label">Gün Adı</label>
                                        <input type="text" class="form-control" name="day_title_{{ $i }}" 
                                               value="{{ $day['day'] }}">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label class="form-label">Çalışma Saatleri</label>
                                        <input type="text" class="form-control" name="day_hours_{{ $i }}" 
                                               value="{{ $day['hours'] }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor

                    <h5 class="mt-4 mb-2">Sosyal Medya Linkleri</h5>
                    @php
                        $socialLinks = $contactContent->social_links ?? [
                            ['platform' => 'Facebook', 'url' => '#', 'icon' => 'ion-logo-facebook'],
                            ['platform' => 'Twitter', 'url' => '#', 'icon' => 'ion-logo-twitter'],
                            ['platform' => 'Instagram', 'url' => '#', 'icon' => 'ion-logo-instagram'],
                            ['platform' => 'LinkedIn', 'url' => '#', 'icon' => 'ion-logo-linkedin']
                        ];
                    @endphp
                    
                    @for($i = 0; $i < 4; $i++)
                        @php $social = $socialLinks[$i] ?? ['platform' => '', 'url' => '', 'icon' => 'ion-social-facebook']; @endphp
                        <div class="card mb-3">
                            <div class="card-header">
                                <h6 class="mb-0">Sosyal Medya {{ $i + 1 }}</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mb-2">
                                        <label class="form-label">Platform</label>
                                        <input type="text" class="form-control" name="social_platform_{{ $i }}" 
                                               value="{{ $social['platform'] }}">
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label class="form-label">URL</label>
                                        <input type="url" class="form-control" name="social_url_{{ $i }}" 
                                               value="{{ $social['url'] }}">
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label class="form-label">İkon (ion-social-*)</label>
                                        <input type="text" class="form-control" name="social_icon_{{ $i }}" 
                                               value="{{ $social['icon'] }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor

                    <h5 class="mt-4 mb-2">Google Maps Embed</h5>
                    <div class="form-group mb-3">
                        <label for="map_embed">Google Maps Embed Kodu</label>
                        <textarea class="form-control" id="map_embed" name="map_embed" rows="6" 
                                  placeholder="<iframe src='https://www.google.com/maps/embed?...' width='100%' height='450' style='border:0;' allowfullscreen='' loading='lazy' referrerpolicy='no-referrer-when-downgrade'></iframe>">{{ $contactContent->map_embed ?? '' }}</textarea>
                        <small class="form-text text-muted">Google Maps'ten embed kodunu kopyalayıp yapıştırın.</small>
                    </div>

                    <button type="submit" class="btn btn-primary">Kaydet</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 