@extends('layouts.web.app')

@section('title', 'Favorilerim - Midyat Emlak')

@section('hero')
<!-- Hero Section -->
<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('images/bg_1.jpg') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-3 bread">Favorilerim</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Ana Sayfa</a></span> <span>Favorilerim</span></p>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<!-- Favorites Section -->
<section class="ftco-section goto-here">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <span class="subheading">Favorilerim</span>
                <h2 class="mb-2">Beğendiğiniz İlanlar</h2>
                @if($estates->count() > 0)
                    <div class="mt-3">
                        <button class="btn btn-outline-danger" onclick="clearAllFavorites()">
                            <i class="fas fa-trash mr-2"></i>Tüm Favorileri Temizle
                        </button>
                    </div>
                @endif
            </div>
        </div>
        
        @if($estates->count() > 0)
            <div class="row">
                @foreach($estates as $estate)
                <div class="col-md-4">
                    <div class="property-wrap ftco-animate">
                        <div class="img d-flex align-items-center justify-content-center" 
                             style="background-image: url({{ $estate->main_image ? asset('storage/' . $estate->main_image) : asset('images/work-1.jpg') }});">
                            <a href="{{ route('estate.show', $estate->id) }}" class="icon d-flex align-items-center justify-content-center btn-custom">
                                <span class="ion-ios-link"></span>
                            </a>
                            <div class="list-agent d-flex align-items-center">
                                <a href="#" class="agent-info d-flex align-items-center">
                                    <div class="img-2 rounded-circle" style="background-image: url({{ asset('images/person_1.jpg') }});"></div>
                                    <h3 class="mb-0 ml-2">Midyat Emlak</h3>
                                </a>
                                <div class="tooltip-wrap d-flex">
                                    <a href="#" class="icon-2 favorite-btn d-flex align-items-center justify-content-center active" 
                                       data-id="{{ $estate->id }}" data-toggle="tooltip" data-placement="top" title="Favorilerden Çıkar">
                                        <span class="ion-ios-heart" style="color: #ff4757 !important;"><i class="sr-only">Favorilerden Çıkar</i></span>
                                    </a>
                                    <a href="{{ route('estate.show', $estate->id) }}" class="icon-2 d-flex align-items-center justify-content-center" data-toggle="tooltip" data-placement="top" title="Detayları Gör">
                                        <span class="ion-ios-eye"><i class="sr-only">Detayları Gör</i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="text">
                            <p class="price mb-3">
                                @if($estate->status == 'Kiralık')
                                    <span class="orig-price">{{ number_format($estate->price, 0, ',', '.') }} ₺<small>/ay</small></span>
                                @else
                                    <span class="orig-price">{{ number_format($estate->price, 0, ',', '.') }} ₺</span>
                                @endif
                            </p>
                            <h3 class="mb-0"><a href="{{ route('estate.show', $estate->id) }}">{{ $estate->name }}</a></h3>
                            <span class="location d-inline-block mb-3">
                                <i class="ion-ios-pin mr-2"></i>
                                {{ $estate->address ? Str::limit($estate->address, 50) : 'Adres bilgisi yok' }}
                            </span>
                            <ul class="property_list">
                                @if($estate->number_of_rooms)
                                    <li><span class="flaticon-bed"></span>{{ $estate->number_of_rooms }}</li>
                                @endif
                                @if($estate->number_of_bathrooms)
                                    <li><span class="flaticon-bathtub"></span>{{ $estate->number_of_bathrooms }}</li>
                                @endif
                                @if($estate->gross_m2)
                                    <li><span class="flaticon-floor-plan"></span>{{ $estate->gross_m2 }} m²</li>
                                @elseif($estate->net_m2)
                                    <li><span class="flaticon-floor-plan"></span>{{ $estate->net_m2 }} m²</li>
                                @elseif($estate->open_area_m2)
                                    <li><span class="flaticon-floor-plan"></span>{{ $estate->open_area_m2 }} m²</li>
                                @endif
                            </ul>
                            <div class="mt-3">
                                <span class="badge badge-primary">{{ $estate->type }}</span>
                                <span class="badge badge-{{ $estate->status == 'Satılık' ? 'success' : 'warning' }}">{{ $estate->status }}</span>
                                @if($estate->is_featured)
                                    <span class="badge badge-danger">⭐ Özel Teklif</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="alert alert-info ftco-animate">
                        <i class="fas fa-heart fa-3x mb-3 text-muted"></i>
                        <h4 class="mb-3">Henüz Favori İlanınız Yok</h4>
                        <p class="mb-4">Beğendiğiniz ilanları favorilere ekleyerek buradan kolayca erişebilirsiniz.</p>
                        <a href="{{ route('home') }}" class="btn btn-outline-primary">
                            <i class="fas fa-home"></i> Ana Sayfaya Dön
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection

@section('scripts')
<style>
.favorite-btn.active .ion-ios-heart {
    color: #ff4757 !important;
}
.favorite-btn:hover .ion-ios-heart {
    color: #ff4757 !important;
}
/* Favoriler sayfasında tüm favori butonları kırmızı olsun */
.favorite-btn .ion-ios-heart {
    color: #ff4757 !important;
}
</style>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Favori butonları için event listener - sadece favoriler sayfasında
    document.querySelectorAll('.favorite-btn').forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const estateId = this.getAttribute('data-id');
            toggleFavorite(estateId, this);
        });
    });

    function toggleFavorite(estateId, btn) {
        fetch('{{ route("favorites.add") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
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
                } else {
                    btn.classList.remove('active');
                    btn.setAttribute('title', 'Favorilere Ekle');
                    // Eğer favoriler sayfasındaysa, kartı kaldır
                    if (window.location.pathname === '{{ route("favorites.index") }}') {
                        btn.closest('.col-md-4').remove();
                    }
                }
                updateFavoritesCount(data.favoritesCount);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }

    function updateFavoritesCount(count) {
        // Header'daki favori sayısını güncelle
        const favoritesCountElement = document.querySelector('.favorites-count');
        if (favoritesCountElement) {
            favoritesCountElement.textContent = count;
        }
    }

    // Favoriler sayfası için özel temizleme fonksiyonu
    window.clearAllFavorites = function() {
        if (confirm('Tüm favori listenizi temizlemek istediğinize emin misiniz?')) {
            fetch('{{ route("favorites.clear") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // localStorage'ı da temizle
                    localStorage.removeItem('favorites');
                    
                    // Tüm favori butonlarını güncelle
                    document.querySelectorAll('.favorite-btn').forEach(function(btn) {
                        btn.classList.remove('active');
                        btn.setAttribute('title', 'Favorilere Ekle');
                        const heartIcon = btn.querySelector('.ion-ios-heart');
                        if (heartIcon) {
                            heartIcon.style.color = '';
                        }
                    });
                    
                    // Favori sayısını güncelle
                    updateFavoritesCount(0);
                    
                    alert('Tüm favorileriniz başarıyla temizlendi.');
                    
                    // Sayfayı yeniden yükle
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);
                } else {
                    alert('Favori temizleme sırasında bir hata oluştu: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Favori temizleme sırasında bir hata oluştu.');
            });
        }
    };
});
</script>
@endsection 