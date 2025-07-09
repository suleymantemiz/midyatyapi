<section class="ftco-counter ftco-section img" id="section-counter">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            @if($homeContent && $homeContent->statistics)
                @foreach($homeContent->statistics as $index => $statistic)
                    <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                        <div class="block-18">
                            <div class="text {{ $index < 3 ? 'text-border' : '' }} d-flex align-items-center">
                                <strong class="number" data-number="{{ $index + 1 }}00">0</strong>
                                <span>{{ $statistic }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text text-border d-flex align-items-center">
                            <strong class="number" data-number="150">0</strong>
                            <span>Midyat<br>Nüfusu (Bin)</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text text-border d-flex align-items-center">
                            <strong class="number" data-number="250">0</strong>
                            <span>Toplam<br>İlan</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text text-border d-flex align-items-center">
                            <strong class="number" data-number="85">0</strong>
                            <span>Ortalama<br>Fiyat (Bin ₺)</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text d-flex align-items-center">
                            <strong class="number" data-number="15">0</strong>
                            <span>Yıllık<br>Deneyim</span>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
