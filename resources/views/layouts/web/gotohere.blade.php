<section class="ftco-section goto-here">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <span class="subheading">Özel Tekliflerimiz</span>
                <h2 class="mb-2">Sizin İçin Özel Fırsatlar</h2>
            </div>
        </div>

        @if(isset($estates) && $estates->count() > 0)
            <!-- Arama sonuçları -->
            <div class="row">
                @foreach($estates as $estate)
                    <div class="col-md-4">
                        <div class="property-wrap ftco-animate">
                            <div class="img d-flex align-items-center justify-content-center"
                                 style="background-image: url({{ $estate->main_image ? asset('storage/' . $estate->main_image) : asset('images/work-1.jpg') }});">
                                <a href="{{ route('estate.show', $estate->id) }}"
                                   class="icon d-flex align-items-center justify-content-center btn-custom">
                                    <span class="ion-ios-link"></span>
                                </a>
                                <div class="list-agent d-flex align-items-center">
                                    <a href="#" class="agent-info d-flex align-items-center">
                                        <div class="img-2 rounded-circle"
                                             style="background-image: url({{ asset('images/person_1.jpg') }});"></div>
                                        <h3 class="mb-0 ml-2">Midyat Emlak</h3>
                                    </a>
                                    <div class="tooltip-wrap d-flex">
                                        <a href="#"
                                           class="icon-2 favorite-btn d-flex align-items-center justify-content-center"
                                           data-id="{{ $estate->id }}" data-toggle="tooltip" data-placement="top"
                                           title="Favorilere Ekle">
                                            <span class="ion-ios-heart"><i class="sr-only">Favorilere Ekle</i></span>
                                        </a>
                                        <a href="{{ route('estate.show', $estate->id) }}"
                                           class="icon-2 d-flex align-items-center justify-content-center"
                                           data-toggle="tooltip" data-placement="top" title="Detayları Gör">
                                            <span class="ion-ios-eye"><i class="sr-only">Detayları Gör</i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="text">
                                <p class="price mb-3">
                                    @if($estate->status == 'Kiralık')
                                        <span
                                            class="orig-price">{{ number_format($estate->price, 0, ',', '.') }} ₺<small>/ay</small></span>
                                    @else
                                        <span
                                            class="orig-price">{{ number_format($estate->price, 0, ',', '.') }} ₺</span>
                                    @endif
                                </p>
                                <h3 class="mb-0"><a
                                        href="{{ route('estate.show', $estate->id) }}">{{ $estate->name }}</a></h3>
                                <span class="location d-inline-block mb-3">
                                <i class="ion-ios-pin mr-2"></i>
                                {{ $estate->address ? Str::limit($estate->address, 50) : 'Adres bilgisi yok' }}
                            </span>
                                <ul class="property_list">
                                    @if($estate->number_of_rooms)
                                        <li><span class="flaticon-bed"></span>{{ $estate->number_of_rooms }}</li>
                                    @endif
                                    @if($estate->number_of_bathrooms)
                                        <li><span class="flaticon-bathtub"></span>{{ $estate->number_of_bathrooms }}
                                        </li>
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
                                    <span
                                        class="badge badge-{{ $estate->status == 'Satılık' ? 'success' : 'warning' }}">{{ $estate->status }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if(isset($estates) && method_exists($estates, 'hasPages') && $estates->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $estates->appends(request()->query())->links() }}
                </div>
            @endif

        @elseif(isset($estates) && $estates->count() == 0 && request()->hasAny(['neighborhood', 'type', 'status', 'price_max']))
            <!-- Arama sonucu bulunamadı mesajı -->
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="alert alert-info ftco-animate">
                        <i class="fas fa-search fa-3x mb-3 text-muted"></i>
                        <h4 class="mb-3">Arama Kriterlerinize Uygun İlan Bulunamadı</h4>
                        <p class="mb-4">Belirttiğiniz kriterlere uygun ilan bulunmamaktadır. Aşağıdaki özel
                            fırsatlarımızı inceleyebilir veya arama kriterlerinizi değiştirebilirsiniz.</p>
                        <a href="{{ route('home') }}" class="btn btn-outline-primary">
                            <i class="fas fa-undo"></i> Arama Kriterlerini Temizle
                        </a>
                    </div>
                </div>
            </div>

            <!-- Özel Fırsatlar -->
            @if(isset($featuredEstates) && $featuredEstates->count() > 0)
                <div class="row mt-5">
                    <div class="col-12">
                        <h3 class="text-center mb-4">Sizin İçin Özel Fırsatlar</h3>
                    </div>
                </div>
                <div class="row">
                    @foreach($featuredEstates as $estate)
                        <div class="col-md-4">
                            <div class="property-wrap ftco-animate">
                                <div class="img d-flex align-items-center justify-content-center"
                                     style="background-image: url({{ $estate->main_image ? asset('storage/' . $estate->main_image) : asset('images/work-1.jpg') }});">
                                    <a href="{{ route('estate.show', $estate->id) }}"
                                       class="icon d-flex align-items-center justify-content-center btn-custom">
                                        <span class="ion-ios-link"></span>
                                    </a>
                                    <div class="list-agent d-flex align-items-center">
                                        <a href="#" class="agent-info d-flex align-items-center">
                                            <div class="img-2 rounded-circle"
                                                 style="background-image: url({{ asset('images/person_1.jpg') }});"></div>
                                            <h3 class="mb-0 ml-2">Midyat Emlak</h3>
                                        </a>
                                        <div class="tooltip-wrap d-flex">
                                            <a href="#"
                                               class="icon-2 favorite-btn d-flex align-items-center justify-content-center"
                                               data-id="{{ $estate->id }}" data-toggle="tooltip" data-placement="top"
                                               title="Favorilere Ekle">
                                                <span class="ion-ios-heart"><i
                                                        class="sr-only">Favorilere Ekle</i></span>
                                            </a>
                                            <a href="{{ route('estate.show', $estate->id) }}"
                                               class="icon-2 d-flex align-items-center justify-content-center"
                                               data-toggle="tooltip" data-placement="top" title="Detayları Gör">
                                                <span class="ion-ios-eye"><i class="sr-only">Detayları Gör</i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="text">
                                    <p class="price mb-3">
                                        @if($estate->status == 'Kiralık')
                                            <span
                                                class="orig-price">{{ number_format($estate->price, 0, ',', '.') }} ₺<small>/ay</small></span>
                                        @else
                                            <span
                                                class="orig-price">{{ number_format($estate->price, 0, ',', '.') }} ₺</span>
                                        @endif
                                    </p>
                                    <h3 class="mb-0"><a
                                            href="{{ route('estate.show', $estate->id) }}">{{ $estate->name }}</a></h3>
                                    <span class="location d-inline-block mb-3">
                                    <i class="ion-ios-pin mr-2"></i>
                                    {{ $estate->address ? Str::limit($estate->address, 50) : 'Adres bilgisi yok' }}
                                </span>
                                    <ul class="property_list">
                                        @if($estate->number_of_rooms)
                                            <li><span class="flaticon-bed"></span>{{ $estate->number_of_rooms }}</li>
                                        @endif
                                        @if($estate->number_of_bathrooms)
                                            <li><span class="flaticon-bathtub"></span>{{ $estate->number_of_bathrooms }}
                                            </li>
                                        @endif
                                        @if($estate->gross_m2)
                                            <li><span class="flaticon-floor-plan"></span>{{ $estate->gross_m2 }} m²</li>
                                        @elseif($estate->net_m2)
                                            <li><span class="flaticon-floor-plan"></span>{{ $estate->net_m2 }} m²</li>
                                        @elseif($estate->open_area_m2)
                                            <li><span class="flaticon-floor-plan"></span>{{ $estate->open_area_m2 }} m²
                                            </li>
                                        @endif
                                    </ul>
                                    <div class="mt-3">
                                        <span class="badge badge-primary">{{ $estate->type }}</span>
                                        <span
                                            class="badge badge-{{ $estate->status == 'Satılık' ? 'success' : 'warning' }}">{{ $estate->status }}</span>
                                        @if($estate->is_featured)
                                            <span class="badge badge-danger">⭐ Özel Teklif</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        @elseif(isset($featuredEstates) && $featuredEstates->count() > 0)
            <!-- Ana sayfa öne çıkan ilanlar -->
            <div class="row">
                @foreach($featuredEstates as $estate)
                    <div class="col-md-4">
                        <div class="property-wrap ftco-animate">
                            <div class="img d-flex align-items-center justify-content-center"
                                 style="background-image: url({{ $estate->main_image ? asset('storage/' . $estate->main_image) : asset('images/work-1.jpg') }});">
                                <a href="{{ route('estate.show', $estate->id) }}"
                                   class="icon d-flex align-items-center justify-content-center btn-custom">
                                    <span class="ion-ios-link"></span>
                                </a>
                                <div class="list-agent d-flex align-items-center">
                                    <a href="#" class="agent-info d-flex align-items-center">
                                        <div class="img-2 rounded-circle"
                                             style="background-image: url({{ asset('images/person_1.jpg') }});"></div>
                                        <h3 class="mb-0 ml-2">Midyat Emlak</h3>
                                    </a>
                                    <div class="tooltip-wrap d-flex">
                                        <a href="#"
                                           class="icon-2 favorite-btn d-flex align-items-center justify-content-center"
                                           data-id="{{ $estate->id }}" data-toggle="tooltip" data-placement="top"
                                           title="Favorilere Ekle">
                                            <span class="ion-ios-heart"><i class="sr-only">Favorilere Ekle</i></span>
                                        </a>
                                        <a href="{{ route('estate.show', $estate->id) }}"
                                           class="icon-2 d-flex align-items-center justify-content-center"
                                           data-toggle="tooltip" data-placement="top" title="Detayları Gör">
                                            <span class="ion-ios-eye"><i class="sr-only">Detayları Gör</i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="text">
                                <p class="price mb-3">
                                    @if($estate->status == 'Kiralık')
                                        <span
                                            class="orig-price">{{ number_format($estate->price, 0, ',', '.') }} ₺<small>/ay</small></span>
                                    @else
                                        <span
                                            class="orig-price">{{ number_format($estate->price, 0, ',', '.') }} ₺</span>
                                    @endif
                                </p>
                                <h3 class="mb-0"><a
                                        href="{{ route('estate.show', $estate->id) }}">{{ $estate->name }}</a></h3>
                                <span class="location d-inline-block mb-3">
                                <i class="ion-ios-pin mr-2"></i>
                                {{ $estate->address ? Str::limit($estate->address, 50) : 'Adres bilgisi yok' }}
                            </span>
                                <ul class="property_list">
                                    @if($estate->number_of_rooms)
                                        <li><span class="flaticon-bed"></span>{{ $estate->number_of_rooms }}</li>
                                    @endif
                                    @if($estate->number_of_bathrooms)
                                        <li><span class="flaticon-bathtub"></span>{{ $estate->number_of_bathrooms }}
                                        </li>
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
                                    <span
                                        class="badge badge-{{ $estate->status == 'Satılık' ? 'success' : 'warning' }}">{{ $estate->status }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Arama Butonu -->
            <div class="row mt-5">
                <div class="col-12 text-center">
                    <a href="{{ route('estate.search') }}" class="btn btn-primary btn-lg">
                        <i class="fas fa-search"></i> Tüm İlanları Görüntüle
                    </a>
                </div>
            </div>
        @else
            <!-- Eğer veri yoksa varsayılan içerik -->
            <div class="row">
                <div class="col-md-4">
                    <div class="property-wrap ftco-animate">
                        <div class="img d-flex align-items-center justify-content-center"
                             style="background-image: url({{ asset('images/work-1.jpg') }});">
                            <a href="#" class="icon d-flex align-items-center justify-content-center btn-custom">
                                <span class="ion-ios-link"></span>
                            </a>
                            <div class="list-agent d-flex align-items-center">
                                <a href="#" class="agent-info d-flex align-items-center">
                                    <div class="img-2 rounded-circle"
                                         style="background-image: url({{ asset('images/person_1.jpg') }});"></div>
                                    <h3 class="mb-0 ml-2">Midyat Emlak</h3>
                                </a>
                                <div class="tooltip-wrap d-flex">
                                    <a href="#"
                                       class="icon-2 favorite-btn d-flex align-items-center justify-content-center"
                                       data-id="1" data-toggle="tooltip" data-placement="top" title="Favorilere Ekle">
                                        <span class="ion-ios-heart"><i class="sr-only">Favorilere Ekle</i></span>
                                    </a>
                                    <a href="#" class="icon-2 d-flex align-items-center justify-content-center"
                                       data-toggle="tooltip" data-placement="top" title="Detayları Gör">
                                        <span class="ion-ios-eye"><i class="sr-only">Detayları Gör</i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="text">
                            <p class="price mb-3"><span class="orig-price">Örnek İlan<small></small></span></p>
                            <h3 class="mb-0"><a href="#">Örnek İlan</a></h3>
                            <span class="location d-inline-block mb-3"><i
                                    class="ion-ios-pin mr-2"></i>Midyat, Mardin</span>
                            <ul class="property_list">
                                <li><span class="flaticon-bed"></span>3</li>
                                <li><span class="flaticon-bathtub"></span>2</li>
                                <li><span class="flaticon-floor-plan"></span>120 m²</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        console.log('DOM yüklendi, favori butonları aranıyor...');

        // LocalStorage'dan favorileri yükle
        let favorites = JSON.parse(localStorage.getItem('favorites') || '[]');

        // Sayfa yüklendiğinde session ile senkronize et
        syncFavoritesWithServer(favorites);

        // Favori butonları için event listener
        const favoriteButtons = document.querySelectorAll('.favorite-btn');
        console.log('Bulunan favori buton sayısı:', favoriteButtons.length);

        favoriteButtons.forEach(function (btn) {
            // Butonun durumunu güncelle
            const estateId = btn.getAttribute('data-id');
            if (favorites.includes(parseInt(estateId))) {
                btn.classList.add('active');
                btn.setAttribute('title', 'Favorilerden Çıkar');
                btn.querySelector('.ion-ios-heart').style.color = '#ff4757';
            }

            btn.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                const estateId = this.getAttribute('data-id');
                console.log('Butona tıklandı, ID:', estateId);
                toggleFavorite(estateId, this);
            });
        });

        function toggleFavorite(estateId, btn) {
            fetch('/favorites/add', {
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
                        // LocalStorage'ı güncelle
                        favorites = data.favorites;
                        localStorage.setItem('favorites', JSON.stringify(favorites));

                        if (data.isFavorite) {
                            btn.classList.add('active');
                            btn.setAttribute('title', 'Favorilerden Çıkar');
                            btn.querySelector('.ion-ios-heart').style.color = '#ff4757';
                        } else {
                            btn.classList.remove('active');
                            btn.setAttribute('title', 'Favorilere Ekle');
                            btn.querySelector('.ion-ios-heart').style.color = '';
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

        function syncFavoritesWithServer(favorites) {
            fetch('/favorites/sync', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    favorites: favorites
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        updateFavoritesCount(data.favoritesCount);
                    }
                })
                .catch(error => {
                    console.error('Sync error:', error);
                });
        }
    });
</script>

