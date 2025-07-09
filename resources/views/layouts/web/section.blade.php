<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <span class="subheading">{{ $homeContent->featured_title ?? 'Öne Çıkan İlanlar' }}</span>
                <h2 class="mb-2">{{ $homeContent->featured_subtitle ?? 'Midyat\'ta En Çok Tercih Edilen İlanlar' }}</h2>
            </div>
        </div>
        <div class="row">
            @if(isset($featuredEstates) && $featuredEstates->count() > 0)
                @foreach($featuredEstates as $estate)
                    <div class="col-md-4 mb-4">
                        <div class="listing-wrap img rounded d-flex align-items-end"
                             style="background-image: url({{ asset('storage/' . $estate->main_image) }});">
                            <div class="location">
                                <span class="rounded">{{ $estate->type }} - {{ $estate->status }}</span>
                            </div>
                            <div class="text">
                                <h3><a href="{{ route('estate.show', $estate->id) }}">{{ $estate->name }}</a></h3>
                                <p class="text-white mb-2">
                                    @if($estate->status == 'Kiralık')
                                        {{ number_format($estate->price, 0, ',', '.') }} ₺<small>/ay</small>
                                    @else
                                        {{ number_format($estate->price, 0, ',', '.') }} ₺
                                    @endif
                                </p>
                                <a href="{{ route('estate.show', $estate->id) }}" class="btn-link">Detayları Gör <span
                                        class="ion-ios-arrow-round-forward"></span></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                @foreach(range(1, 6) as $i)
                    <div class="col-md-4 mb-4">
                        <div class="listing-wrap img rounded d-flex align-items-end"
                             style="background-image: url(images/listing-{{ $i }}.jpg);">
                            <div class="location">
                                <span class="rounded">Midyat, Mardin</span>
                            </div>
                            <div class="text">
                                <h3><a href="#">Örnek İlan {{ $i }}</a></h3>
                                <p class="text-white mb-2">850.000 ₺</p>
                                <a href="#" class="btn-link">Detayları Gör <span
                                        class="ion-ios-arrow-round-forward"></span></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
