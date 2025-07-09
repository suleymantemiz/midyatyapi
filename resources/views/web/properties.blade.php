@extends('layouts.web.app')

@section('title', 'Tüm İlanlar - Midyat Emlak')

@section('hero')
<!-- Hero Section -->
<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('images/bg_1.jpg') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-3 bread">Tüm İlanlar</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Ana Sayfa</a></span> <span>İlanlar</span></p>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<!-- Properties Content -->
<section class="ftco-section goto-here">
    <div class="container">
        <div class="row">
            <!-- Properties List -->
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>Tüm İlanlar</h2>
                    <small class="text-muted">{{ $estates->total() }} ilan bulundu</small>
                </div>

                @if($estates->count() > 0)
                    <div class="row">
                        @foreach($estates as $estate)
                        <div class="col-md-6 col-lg-4 mb-4">
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
                                            <a href="#" class="icon-2 favorite-btn d-flex align-items-center justify-content-center" 
                                               data-id="{{ $estate->id }}" data-toggle="tooltip" data-placement="top" title="Favorilere Ekle">
                                                <span class="ion-ios-heart"><i class="sr-only">Favorilere Ekle</i></span>
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
                                    @php
                                        $ada = 0;
                                        $parsel = 0;
                                        if (!empty($estate->parcel_number) && strpos($estate->parcel_number, '-') !== false) {
                                            [$ada, $parsel] = explode('-', $estate->parcel_number);
                                        }
                                    @endphp
                                    <button class="btn btn-sm btn-outline-success btn-parsel-sorgula mb-2 w-100"
                                        data-ada="{{ $ada }}"
                                        data-parsel="{{ $parsel }}"
                                        data-name="{{ $estate->name }}">
                                        <i class="ion-ios-search mr-1"></i> Parsel Sorgula
                                    </button>
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
                                        <button class="btn btn-sm btn-outline-primary review-btn" data-estate-id="{{ $estate->id }}" data-estate-name="{{ $estate->name }}">
                                            <i class="ion-ios-chatbubbles mr-1"></i>Yorum Yap
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="row mt-5">
                        <div class="col text-center">
                            <div class="block-27">
                                {{ $estates->links('vendor.pagination.block-27') }}
                            </div>
                        </div>
                    </div>
                @else
                    <div class="text-center py-5">
                        <h4 class="text-muted">Henüz ilan bulunmuyor</h4>
                        <p class="text-muted">Yakında yeni ilanlar eklenecek.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<!-- Review Modal -->
<div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="reviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reviewModalLabel">Yorum Yap</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8">
                        <h6 id="estate-name-display"></h6>
                        <form id="review-form-modal">
                            <input type="hidden" name="estate_id" id="modal-estate-id">
                            <div class="form-group">
                                <label for="modal-name">Adınız *</label>
                                <input type="text" class="form-control" id="modal-name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="modal-email">E-posta Adresiniz *</label>
                                <input type="email" class="form-control" id="modal-email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="modal-rating">Puanınız *</label>
                                <select class="form-control" id="modal-rating" name="rating" required>
                                    <option value="">Puan seçin</option>
                                    <option value="5">5 - Mükemmel</option>
                                    <option value="4">4 - Çok İyi</option>
                                    <option value="3">3 - İyi</option>
                                    <option value="2">2 - Orta</option>
                                    <option value="1">1 - Kötü</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="modal-comment">Yorumunuz *</label>
                                <textarea class="form-control" id="modal-comment" name="comment" rows="4" placeholder="Bu ilan hakkında düşüncelerinizi paylaşın..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="ion-ios-send mr-2"></i>Yorum Gönder
                            </button>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <h6>Bu İlanın Yorumları</h6>
                        <div id="modal-reviews-container">
                            <div class="text-center">
                                <div class="spinner-border spinner-border-sm text-primary" role="status">
                                    <span class="sr-only">Yükleniyor...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Parsel Sonuç Modalı -->
<div class="modal fade" id="parselModal" tabindex="-1" role="dialog" aria-labelledby="parselModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="parselModalLabel">Parsel Bilgisi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="parsel-result">
          <div class="text-center">
            <div class="spinner-border text-primary" role="status">
              <span class="sr-only">Yükleniyor...</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function() {
    // Parsel sorgulama butonları için event listener
    $('.btn-parsel-sorgula').on('click', function() {
        const ada = $(this).data('ada');
        const parsel = $(this).data('parsel');
        const name = $(this).data('name');
        
        if (ada && parsel) {
            $('#parselModal').modal('show');
            
            // AJAX ile parsel bilgisi al
            $.ajax({
                url: '{{ route("parsel.search") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    province: 'Mardin',
                    district: 'Midyat',
                    parcel_number: ada + '-' + parsel
                },
                success: function(response) {
                    if (response.success) {
                        $('#parsel-result').html(response.html);
                    } else {
                        $('#parsel-result').html('<div class="alert alert-warning">Parsel bilgisi bulunamadı.</div>');
                    }
                },
                error: function() {
                    $('#parsel-result').html('<div class="alert alert-danger">Bir hata oluştu.</div>');
                }
            });
        } else {
            alert('Bu ilan için parsel bilgisi bulunmuyor.');
        }
    });

    // Review butonları için event listener
    $('.review-btn').on('click', function() {
        const estateId = $(this).data('estate-id');
        const estateName = $(this).data('estate-name');
        
        $('#modal-estate-id').val(estateId);
        $('#estate-name-display').text(estateName);
        $('#reviewModal').modal('show');
        
        // Bu ilanın yorumlarını yükle
        loadReviews(estateId);
    });

    // Review form submit
    $('#review-form-modal').on('submit', function(e) {
        e.preventDefault();
        
        const formData = $(this).serialize();
        
        $.ajax({
            url: '{{ route("reviews.store") }}',
            method: 'POST',
            data: formData,
            success: function(response) {
                if (response.success) {
                    alert('Yorumunuz başarıyla gönderildi!');
                    $('#reviewModal').modal('hide');
                    $('#review-form-modal')[0].reset();
                    // Yorumları yeniden yükle
                    loadReviews($('#modal-estate-id').val());
                } else {
                    alert('Yorum gönderilirken bir hata oluştu: ' + response.message);
                }
            },
            error: function() {
                alert('Yorum gönderilirken bir hata oluştu.');
            }
        });
    });

    function loadReviews(estateId) {
        $.ajax({
            url: '{{ route("reviews.get", ":estateId") }}'.replace(':estateId', estateId),
            method: 'GET',
            success: function(response) {
                $('#modal-reviews-container').html(response);
            },
            error: function() {
                $('#modal-reviews-container').html('<div class="alert alert-warning">Yorumlar yüklenirken bir hata oluştu.</div>');
            }
        });
    }
});
</script>
@endsection 