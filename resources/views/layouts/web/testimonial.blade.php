<section class="ftco-section testimony-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">{{ $homeContent->testimonials_title ?? 'Müşteri Yorumları' }}</span>
                <h2 class="mb-3">{{ $homeContent->testimonials_subtitle ?? 'Mutlu Müşterilerimiz' }}</h2>
            </div>
        </div>
        <div class="row ftco-animate">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel ftco-owl">
                    @if($homeContent && $homeContent->testimonials)
                        @foreach($homeContent->testimonials as $testimonial)
                            <div class="item">
                                <div class="testimony-wrap py-4">
                                    <div class="text">
                                        <p class="mb-4">{{ $testimonial }}</p>
                                        <div class="d-flex align-items-center">
                                            <div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
                                            <div class="pl-3">
                                                <p class="name">Müşteri</p>
                                                <span class="position">Memnun Müşteri</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="text">
                                    <p class="mb-4">Midyat Emlak sayesinde hayalimdeki eve kavuştum. Çok profesyonel ve
                                        güvenilir bir hizmet aldım. Teşekkürler!</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
                                        <div class="pl-3">
                                            <p class="name">Ahmet Yılmaz</p>
                                            <span class="position">Mühendis</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="text">
                                    <p class="mb-4">Emlak alımında çok yardımcı oldular. Kredi sürecinde de destek aldım.
                                        Kesinlikle tavsiye ederim.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
                                        <div class="pl-3">
                                            <p class="name">Fatma Demir</p>
                                            <span class="position">Öğretmen</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="text">
                                    <p class="mb-4">Midyat'ta ev arama sürecimde çok yardımcı oldular. Güvenilir ve şeffaf
                                        bir hizmet aldım.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img" style="background-image: url(images/person_3.jpg)"></div>
                                        <div class="pl-3">
                                            <p class="name">Mehmet Kaya</p>
                                            <span class="position">Doktor</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="text">
                                    <p class="mb-4">Emlak satışımda çok profesyonel bir hizmet aldım. Hızlı ve güvenilir bir
                                        süreç yaşadım.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
                                        <div class="pl-3">
                                            <p class="name">Ayşe Özkan</p>
                                            <span class="position">Avukat</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="text">
                                    <p class="mb-4">Kiralık ev arama sürecimde çok yardımcı oldular. Uygun fiyatlı ve
                                        kaliteli ev buldum.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
                                        <div class="pl-3">
                                            <p class="name">Ali Çelik</p>
                                            <span class="position">Öğrenci</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
