@extends('layouts.web.app')

@section('title', 'İletişim - Midyat Emlak')

@section('hero')
<!-- Hero Section -->
<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('images/bg_1.jpg') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-3 bread">İletişim</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Ana Sayfa</a></span> <span>İletişim</span></p>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<!-- Contact Section -->
<section class="contact-section">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="mb-4">{{ $contactContent->title ?? 'Bizimle İletişime Geçin' }}</h2>
                <p class="lead">{{ $contactContent->main_content ?? 'Sorularınız için bize ulaşın, size yardımcı olmaktan mutluluk duyarız' }}</p>
            </div>
        </div>
        
        <div class="row">
            @php
                $contactInfo = $contactContent->contact_info ?? [
                    ['title' => 'Adres', 'value' => 'Midyat, Mardin, Türkiye', 'icon' => 'ion-ios-location'],
                    ['title' => 'Telefon', 'value' => '+90 482 123 45 67', 'icon' => 'ion-ios-telephone'],
                    ['title' => 'E-posta', 'value' => 'info@midyatemlak.com', 'icon' => 'ion-ios-email']
                ];
            @endphp
            
            @foreach($contactInfo as $contact)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="contact-info-card">
                        <div class="contact-icon">
                            <i class="{{ $contact['icon'] }}"></i>
                        </div>
                        <h4>{{ $contact['title'] }}</h4>
                        <p>{{ $contact['value'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="row mt-5">
            <div class="col-lg-8">
                <div class="contact-form">
                    <h3 class="mb-4">Mesaj Gönderin</h3>
                    <form id="contact-form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Adınız *</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">E-posta *</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone">Telefon</label>
                            <input type="tel" class="form-control" id="phone" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="subject">Konu *</label>
                            <input type="text" class="form-control" id="subject" name="subject" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Mesajınız *</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-contact">
                            <i class="ion-ios-send mr-2"></i>Mesaj Gönder
                        </button>
                    </form>
                    <div id="contact-response" class="mt-3"></div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="working-hours">
                    <h4>Çalışma Saatleri</h4>
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
                    
                    @foreach($workingHours as $day)
                        <div class="day">
                            <span>{{ $day['day'] }}</span>
                            <span>{{ $day['hours'] }}</span>
                        </div>
                    @endforeach
                </div>
                
                <div class="social-links">
                    @php
                        $socialLinks = $contactContent->social_links ?? [
                            ['platform' => 'Facebook', 'url' => '#', 'icon' => 'ion-social-facebook'],
                            ['platform' => 'Twitter', 'url' => '#', 'icon' => 'ion-social-twitter'],
                            ['platform' => 'Instagram', 'url' => '#', 'icon' => 'ion-social-instagram'],
                            ['platform' => 'LinkedIn', 'url' => '#', 'icon' => 'ion-social-linkedin']
                        ];
                    @endphp
                    
                    @foreach($socialLinks as $social)
                        <a href="{{ $social['url'] }}" class="social-link" target="_blank" title="{{ $social['platform'] }}">
                            <i class="{{ $social['icon'] }}"></i>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="map-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="text-center mb-4">Konumumuz</h3>
                <div class="map-container">
                    @if($contactContent && $contactContent->map_embed)
                        {!! $contactContent->map_embed !!}
                    @else
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12345.67890!2d41.123456!3d37.123456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzfCsDA3JzM0LjQiTiA0McKwMDcnMzQuNCJF!5e0!3m2!1str!2str!4v1234567890"
                            width="100%" 
                            height="450" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $('#contact-form').on('submit', function(e) {
        e.preventDefault();
        
        const formData = $(this).serialize();
        const submitBtn = $(this).find('button[type="submit"]');
        const originalText = submitBtn.html();
        
        submitBtn.prop('disabled', true).html('<i class="ion-ios-loading mr-2"></i>Gönderiliyor...');
        
        $.ajax({
            url: '{{ route("contact.send") }}',
            method: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    $('#contact-response').html('<div class="alert alert-success">' + response.message + '</div>');
                    $('#contact-form')[0].reset();
                } else {
                    $('#contact-response').html('<div class="alert alert-danger">Mesaj gönderilirken bir hata oluştu.</div>');
                }
            },
            error: function() {
                $('#contact-response').html('<div class="alert alert-danger">Mesaj gönderilirken bir hata oluştu.</div>');
            },
            complete: function() {
                submitBtn.prop('disabled', false).html(originalText);
            }
        });
    });
});
</script>

<style>
.contact-section {
    padding: 80px 0;
}

.contact-info-card {
    background: white;
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    text-align: center;
    height: 100%;
    transition: all 0.3s ease;
}

.contact-info-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
}

.contact-icon {
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

.contact-info-card h4 {
    color: #333;
    margin-bottom: 15px;
    font-weight: 600;
}

.contact-info-card p {
    color: #6c757d;
    margin-bottom: 0;
}

.contact-form {
    background: white;
    border-radius: 15px;
    padding: 40px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
}

.contact-form h3 {
    color: #333;
    margin-bottom: 30px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    color: #333;
    font-weight: 600;
    margin-bottom: 8px;
}

.form-control {
    border: 2px solid #e9ecef;
    border-radius: 10px;
    padding: 12px 15px;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #ffc107;
    box-shadow: 0 0 0 0.2rem rgba(255,193,7,0.25);
}

.btn-contact {
    background: linear-gradient(135deg, #ffc107, #d4ca68);
    border: none;
    color: white;
    padding: 12px 30px;
    border-radius: 25px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-contact:hover {
    background: linear-gradient(135deg, #d4ca68, #b8a847);
    transform: translateY(-2px);
    color: white;
    text-decoration: none;
}

.working-hours {
    background: white;
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    margin-bottom: 30px;
}

.working-hours h4 {
    color: #333;
    margin-bottom: 20px;
    text-align: center;
}

.day {
    display: flex;
    justify-content: space-between;
    padding: 10px 0;
    border-bottom: 1px solid #f8f9fa;
}

.day:last-child {
    border-bottom: none;
}

.day span:first-child {
    font-weight: 600;
    color: #333;
}

.day span:last-child {
    color: #6c757d;
}

.social-links {
    background: white;
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    text-align: center;
}

.social-link {
    display: inline-block;
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #ffc107, #d4ca68);
    border-radius: 50%;
    color: white;
    text-align: center;
    line-height: 50px;
    margin: 0 10px;
    font-size: 20px;
    transition: all 0.3s ease;
}

.social-link:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(255,193,7,0.3);
    color: white;
    text-decoration: none;
}

.map-section {
    padding: 60px 0;
    background: #f8f9fa;
}

.map-container {
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
}

.alert {
    border-radius: 10px;
    border: none;
    padding: 15px 20px;
}
</style>
@endsection 