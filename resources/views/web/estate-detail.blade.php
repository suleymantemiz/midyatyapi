@extends('layouts.web.app')

@section('title', $estate->name . ' - Midyat Emlak')

@section('hero')
<!-- Hero Section -->
<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('images/bg_1.jpg') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-3 bread">{{ $estate->name }}</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Ana Sayfa</a></span> <span class="mr-2"><a href="{{ route('estate.properties') }}">İlanlar</a></span> <span>{{ $estate->name }}</span></p>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<!-- Estate Detail Section -->
<section class="ftco-section goto-here">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- Estate Images -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="property-wrap ftco-animate">
                            <div class="img d-flex align-items-center justify-content-center" 
                                 style="background-image: url({{ $estate->main_image ? asset('storage/' . $estate->main_image) : asset('images/work-1.jpg') }});">
                                <a href="{{ $estate->main_image ? asset('storage/' . $estate->main_image) : asset('images/work-1.jpg') }}" class="icon d-flex align-items-center justify-content-center btn-custom" data-fancybox="gallery">
                                    <span class="ion-ios-search"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Estate Gallery -->
                @if($estate->gallery && $estate->gallery->count() > 0)
                <div class="row mt-4">
                    <div class="col-md-12">
                        <h4>Galeri</h4>
                        <div class="row">
                            @foreach($estate->gallery->take(6) as $image)
                            <div class="col-md-4 mb-3">
                                <a href="{{ asset('storage/' . $image->image_path) }}" data-fancybox="gallery">
                                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $estate->name }}" class="img-fluid rounded">
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif

                <!-- Estate Details -->
                <div class="row mt-5">
                    <div class="col-md-12">
                        <div class="property-wrap ftco-animate">
                            <div class="text">
                                <h3 class="mb-4">{{ $estate->name }}</h3>
                                <p class="price mb-4">
                                    @if($estate->status == 'Kiralık')
                                        <span class="orig-price">{{ number_format($estate->price, 0, ',', '.') }} ₺<small>/ay</small></span>
                                    @else
                                        <span class="orig-price">{{ number_format($estate->price, 0, ',', '.') }} ₺</span>
                                    @endif
                                </p>
                                
                                <div class="d-flex mb-4">
                                    <span class="d-block">
                                        <a href="#" class="d-flex align-items-center text-center">
                                            <span class="ion-ios-pin mr-2"></span>
                                            <span>{{ $estate->address ?? 'Adres bilgisi yok' }}</span>
                                        </a>
                                    </span>
                                </div>

                                <div class="d-flex mb-4">
                                    <span class="d-block">
                                        <a href="#" class="d-flex align-items-center text-center">
                                            <span class="ion-ios-home mr-2"></span>
                                            <span>{{ $estate->type }} - {{ $estate->status }}</span>
                                        </a>
                                    </span>
                                </div>

                                <ul class="property_list">
                                    @if($estate->number_of_rooms)
                                        <li><span class="flaticon-bed"></span>{{ $estate->number_of_rooms }} Oda</li>
                                    @endif
                                    @if($estate->number_of_bathrooms)
                                        <li><span class="flaticon-bathtub"></span>{{ $estate->number_of_bathrooms }} Banyo</li>
                                    @endif
                                    @if($estate->gross_m2)
                                        <li><span class="flaticon-floor-plan"></span>{{ $estate->gross_m2 }} m² (Brüt)</li>
                                    @elseif($estate->net_m2)
                                        <li><span class="flaticon-floor-plan"></span>{{ $estate->net_m2 }} m² (Net)</li>
                                    @elseif($estate->open_area_m2)
                                        <li><span class="flaticon-floor-plan"></span>{{ $estate->open_area_m2 }} m² (Açık Alan)</li>
                                    @endif
                                    @if($estate->building_age)
                                        <li><span class="flaticon-calendar"></span>{{ $estate->building_age }} Yaşında</li>
                                    @endif
                                    @if($estate->number_of_floors)
                                        <li><span class="flaticon-stairs"></span>{{ $estate->number_of_floors }} Kat</li>
                                    @endif
                                </ul>

                                @if($estate->features)
                                <div class="mt-4">
                                    <h5>Özellikler</h5>
                                    <p>{{ $estate->features }}</p>
                                </div>
                                @endif

                                @if($estate->site_content)
                                <div class="mt-4">
                                    <h5>Site İçeriği</h5>
                                    <p>{{ $estate->site_content }}</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Estate Tabs -->
                <div class="row mt-5">
                    <div class="col-md-12">
                        <div class="property-wrap ftco-animate">
                            <div class="text">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Detaylar</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">İletişim</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-reviews-tab" data-toggle="pill" href="#pills-reviews" role="tab" aria-controls="pills-reviews" aria-selected="false">Yorumlar</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h3 class="head">İlan Detayları</h3>
                                                <div class="property-details">
                                                    <p><strong>İlan Tipi:</strong> {{ $estate->type }}</p>
                                                    <p><strong>Durum:</strong> {{ $estate->status }}</p>
                                                    @if($estate->parcel_number)
                                                        <p><strong>Parsel No:</strong> {{ $estate->parcel_number }}</p>
                                                    @endif
                                                    @if($estate->heating)
                                                        <p><strong>Isıtma:</strong> {{ $estate->heating }}</p>
                                                    @endif
                                                    @if($estate->kitchen)
                                                        <p><strong>Mutfak:</strong> {{ $estate->kitchen }}</p>
                                                    @endif
                                                    @if($estate->parking)
                                                        <p><strong>Otopark:</strong> {{ $estate->parking }}</p>
                                                    @endif
                                                    @if($estate->furnished)
                                                        <p><strong>Eşyalı:</strong> {{ $estate->furnished }}</p>
                                                    @endif
                                                    @if($estate->usage_status)
                                                        <p><strong>Kullanım Durumu:</strong> {{ $estate->usage_status }}</p>
                                                    @endif
                                                    @if($estate->site_name)
                                                        <p><strong>Site Adı:</strong> {{ $estate->site_name }}</p>
                                                    @endif
                                                    @if($estate->help_tl)
                                                        <p><strong>Yardım:</strong> {{ $estate->help_tl }}</p>
                                                    @endif
                                                    @if($estate->available_for_credit)
                                                        <p><strong>Krediye Uygun:</strong> {{ $estate->available_for_credit }}</p>
                                                    @endif
                                                    @if($estate->exchange)
                                                        <p><strong>Takas:</strong> {{ $estate->exchange }}</p>
                                                    @endif
                                                </div>
                                                <div class="mt-4 contact-buttons">
                                                    <button class="btn btn-primary">
                                                        <i class="ion-ios-call mr-2"></i>İletişime Geç
                                                    </button>
                                                    <button class="btn btn-primary favorite-btn" data-id="{{ $estate->id }}" data-toggle="tooltip" data-placement="top" title="Favorilere Ekle">
                                                        <i class="ion-ios-heart mr-2"></i>Favorilere Ekle
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <h3 class="head">Benzer İlanlar</h3>
                                                @if($relatedEstates && $relatedEstates->count() > 0)
                                                    @foreach($relatedEstates as $related)
                                                    <div class="review d-flex">
                                                        <div class="user-img" style="background-image: url({{ $related->main_image ? asset('storage/' . $related->main_image) : asset('images/work-1.jpg') }})"></div>
                                                        <div class="desc">
                                                            <h4>
                                                                <span class="text-left">
                                                                    <a href="{{ route('estate.show', $related->id) }}">{{ $related->name }}</a>
                                                                </span>
                                                            </h4>
                                                            <p class="star">
                                                                <span class="text-left">
                                                                    <a href="{{ route('estate.show', $related->id) }}">
                                                                        {{ number_format($related->price, 0, ',', '.') }} ₺
                                                                    </a>
                                                                </span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                @else
                                                    <p class="text-muted">Benzer ilan bulunamadı.</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h3 class="head">İletişim Bilgileri</h3>
                                                <div class="contact-info">
                                                    <p><strong>Telefon:</strong> +90 482 123 45 67</p>
                                                    <p><strong>E-posta:</strong> info@midyatemlak.com</p>
                                                    <p><strong>Adres:</strong> Midyat, Mardin, Türkiye</p>
                                                    <p><strong>Çalışma Saatleri:</strong> Pazartesi - Cumartesi: 09:00 - 18:00</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <h3 class="head">Hızlı İletişim Formu</h3>
                                                <form>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="Adınız">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="email" class="form-control" placeholder="E-posta">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="tel" class="form-control" placeholder="Telefon">
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea class="form-control" rows="4" placeholder="Mesajınız"></textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Gönder</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-reviews" role="tabpanel" aria-labelledby="pills-reviews-tab">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h3 class="head">Bu İlan Hakkında Yorumlar</h3>
                                                <div id="reviews-container">
                                                    <div class="text-center">
                                                        <div class="spinner-border text-primary" role="status">
                                                            <span class="sr-only">Yükleniyor...</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <h3 class="head">Yorum Yap</h3>
                                                <form id="review-form">
                                                    <input type="hidden" name="estate_id" value="{{ $estate->id }}">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="name" placeholder="Adınız" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="email" class="form-control" name="email" placeholder="E-posta" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <select class="form-control" name="rating" required>
                                                            <option value="">Puan seçin</option>
                                                            <option value="5">5 - Mükemmel</option>
                                                            <option value="4">4 - Çok İyi</option>
                                                            <option value="3">3 - İyi</option>
                                                            <option value="2">2 - Orta</option>
                                                            <option value="1">1 - Kötü</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea class="form-control" name="comment" rows="4" placeholder="Yorumunuz" required></textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Yorum Gönder</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="sidebar-box ftco-animate">
                    <h3 class="head">İlan Özeti</h3>
                    <div class="property-summary">
                        <div class="summary-item">
                            <span class="label">Fiyat:</span>
                            <span class="value">
                                @if($estate->status == 'Kiralık')
                                    {{ number_format($estate->price, 0, ',', '.') }} ₺/ay
                                @else
                                    {{ number_format($estate->price, 0, ',', '.') }} ₺
                                @endif
                            </span>
                        </div>
                        <div class="summary-item">
                            <span class="label">Tip:</span>
                            <span class="value">{{ $estate->type }}</span>
                        </div>
                        <div class="summary-item">
                            <span class="label">Durum:</span>
                            <span class="value">{{ $estate->status }}</span>
                        </div>
                        @if($estate->gross_m2)
                        <div class="summary-item">
                            <span class="label">Brüt Alan:</span>
                            <span class="value">{{ $estate->gross_m2 }} m²</span>
                        </div>
                        @endif
                        @if($estate->number_of_rooms)
                        <div class="summary-item">
                            <span class="label">Oda Sayısı:</span>
                            <span class="value">{{ $estate->number_of_rooms }}</span>
                        </div>
                        @endif
                        @if($estate->number_of_bathrooms)
                        <div class="summary-item">
                            <span class="label">Banyo Sayısı:</span>
                            <span class="value">{{ $estate->number_of_bathrooms }}</span>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    // Favori butonları için event listener
    $('.favorite-btn').on('click', function(e) {
        e.preventDefault();
        const estateId = $(this).data('id');
        toggleFavorite(estateId, this);
    });

    function toggleFavorite(estateId, btn) {
        fetch('{{ route("favorites.add") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            body: JSON.stringify({
                estate_id: estateId
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                if (data.isFavorite) {
                    btn.classList.add('active');
                    btn.setAttribute('title', 'Favorilerden Çıkar');
                    btn.find('i').removeClass('ion-ios-heart-outline').addClass('ion-ios-heart');
                } else {
                    btn.classList.remove('active');
                    btn.setAttribute('title', 'Favorilere Ekle');
                    btn.find('i').removeClass('ion-ios-heart').addClass('ion-ios-heart-outline');
                }
                updateFavoritesCount(data.favoritesCount);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }

    function updateFavoritesCount(count) {
        const favoritesCountElement = $('.favorites-count');
        if (favoritesCountElement.length) {
            favoritesCountElement.text(count);
        }
    }

    // Yorumları yükle
    loadReviews();

    function loadReviews() {
        $.ajax({
            url: '{{ route("review.index") }}',
            method: 'GET',
            data: { estate_id: {{ $estate->id }} },
            success: function(response) {
                $('#reviews-container').html(response);
            },
            error: function() {
                $('#reviews-container').html('<div class="alert alert-warning">Yorumlar yüklenirken bir hata oluştu.</div>');
            }
        });
    }

    // Review form submit
    $('#review-form').on('submit', function(e) {
        e.preventDefault();
        
        const formData = $(this).serialize();
        
        $.ajax({
            url: '{{ route("review.store") }}',
            method: 'POST',
            data: formData,
            success: function(response) {
                if (response.success) {
                    alert('Yorumunuz başarıyla gönderildi!');
                    $('#review-form')[0].reset();
                    loadReviews(); // Yorumları yeniden yükle
                } else {
                    alert('Yorum gönderilirken bir hata oluştu: ' + response.message);
                }
            },
            error: function() {
                alert('Yorum gönderilirken bir hata oluştu.');
            }
        });
    });
});
</script>

<style>
.property-summary {
    background: #f8f9fa;
    border-radius: 10px;
    padding: 20px;
}

.summary-item {
    display: flex;
    justify-content: space-between;
    padding: 10px 0;
    border-bottom: 1px solid #e9ecef;
}

.summary-item:last-child {
    border-bottom: none;
}

.summary-item .label {
    font-weight: 600;
    color: #333;
}

.summary-item .value {
    color: #007bff;
    font-weight: 600;
}

.contact-buttons {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

.contact-buttons .btn {
    flex: 1;
    min-width: 150px;
}

.favorite-btn.active {
    background-color: #ff4757;
    border-color: #ff4757;
}

.favorite-btn.active:hover {
    background-color: #ff3742;
    border-color: #ff3742;
}
</style>
@endsection 