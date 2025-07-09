<section class="ftco-section ftco-fullwidth">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <span class="subheading">{{ $homeContent->home_services_title ?? 'Hizmetlerimiz' }}</span>
                <h2 class="mb-2">{{ $homeContent->about_title ?? 'Neden Bizi Seçmelisiniz?' }}</h2>
            </div>
        </div>
    </div>
    <div class="container-fluid px-0">
        <div class="row d-md-flex text-wrapper align-items-stretch">
            <div class="one-half mb-md-0 mb-4 img d-flex align-self-stretch"
                 style="background-image: url('{{ asset('images/about.jpg') }}');"></div>
            <div class="one-half half-text d-flex justify-content-end align-items-center">
                <div class="text-inner pl-md-5">
                    <div class="row d-flex">
                        @if($homeContent && $homeContent->home_services)
                            @foreach($homeContent->home_services as $index => $service)
                                <div class="col-md-12 d-flex align-self-stretch ftco-animate">
                                    <div class="media block-6 services-wrap d-flex">
                                        <div class="icon d-flex justify-content-center align-items-center">
                                            @php
                                                $icons = ['flaticon-piggy-bank', 'flaticon-wallet', 'flaticon-file', 'flaticon-locked'];
                                                $icon = $icons[$index] ?? 'flaticon-piggy-bank';
                                            @endphp
                                            <span class="{{ $icon }}"></span>
                                        </div>
                                        <div class="media-body pl-4">
                                            <h3>{{ $service['title'] ?? $service }}</h3>
                                            <p>{{ $service['description'] ?? 'Midyat\'ta emlak sektöründe uzun yıllar deneyimimizle, size en uygun gayrimenkulü bulmanızda yardımcı oluyoruz.' }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @elseif($homeContent && $homeContent->about_features)
                            @foreach($homeContent->about_features as $feature)
                                <div class="col-md-12 d-flex align-self-stretch ftco-animate">
                                    <div class="media block-6 services-wrap d-flex">
                                        <div class="icon d-flex justify-content-center align-items-center"><span
                                                class="flaticon-piggy-bank"></span></div>
                                        <div class="media-body pl-4">
                                            <h3>{{ $feature }}</h3>
                                            <p>{{ $homeContent->about_content ?? 'Midyat\'ta emlak sektöründe uzun yıllar deneyimimizle, size en uygun gayrimenkulü bulmanızda yardımcı oluyoruz.' }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-md-12 d-flex align-self-stretch ftco-animate">
                                <div class="media block-6 services-wrap d-flex">
                                    <div class="icon d-flex justify-content-center align-items-center"><span
                                            class="flaticon-piggy-bank"></span></div>
                                    <div class="media-body pl-4">
                                        <h3>Kredi Desteği</h3>
                                        <p>Midyat'ta emlak alımında kredi desteği sağlıyoruz. Bankalarla anlaşmalı
                                            çözümlerimizle hayalinizdeki eve kavuşun.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex align-self-stretch ftco-animate">
                                <div class="media block-6 services-wrap d-flex">
                                    <div class="icon d-flex justify-content-center align-items-center"><span
                                            class="flaticon-wallet"></span></div>
                                    <div class="media-body pl-4">
                                        <h3>Nakit Alım</h3>
                                        <p>Nakit alım yapmak isteyen müşterilerimiz için özel fırsatlar sunuyoruz. Hızlı ve
                                            güvenli işlem garantisi.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex align-self-stretch ftco-animate">
                                <div class="media block-6 services-wrap d-flex">
                                    <div class="icon d-flex justify-content-center align-items-center"><span
                                            class="flaticon-file"></span></div>
                                    <div class="media-body pl-4">
                                        <h3>Uzman Danışmanlık</h3>
                                        <p>Midyat'ın en deneyimli emlak uzmanları size hizmet veriyor. Her adımda
                                            yanınızdayız.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex align-self-stretch ftco-animate">
                                <div class="media block-6 services-wrap d-flex">
                                    <div class="icon d-flex justify-content-center align-items-center"><span
                                            class="flaticon-locked"></span></div>
                                    <div class="media-body pl-4">
                                        <h3>Sabit Fiyat Garantisi</h3>
                                        <p>Anlaştığımız fiyatlar değişmez. Şeffaf ve güvenilir fiyatlandırma politikamızla
                                            hizmetinizdeyiz.</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
