<section id="search-section" class="ftco-section ftco-no-pb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="search-wrap-1 ftco-animate">
                    <form action="{{ route('home') }}" method="GET" class="search-property-1">
                        <div class="row">
                            <div class="col-lg align-items-end">
                                <div class="form-group">
                                    <label for="#">Mahalle</label>
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                            <select name="neighborhood" class="form-control">
                                                <option value="">Tümü</option>
                                                <option
                                                    value="Bahçelievler" {{ old('neighborhood', request('neighborhood')) == 'Bahçelievler' ? 'selected' : '' }}>
                                                    Bahçelievler
                                                </option>
                                                <option
                                                    value="Cumhuriyet" {{ old('neighborhood', request('neighborhood')) == 'Cumhuriyet' ? 'selected' : '' }}>
                                                    Cumhuriyet
                                                </option>
                                                <option
                                                    value="Gölcük" {{ old('neighborhood', request('neighborhood')) == 'Gölcük' ? 'selected' : '' }}>
                                                    Gölcük
                                                </option>
                                                <option
                                                    value="Gültepe" {{ old('neighborhood', request('neighborhood')) == 'Gültepe' ? 'selected' : '' }}>
                                                    Gültepe
                                                </option>
                                                <option
                                                    value="Harmanlı" {{ old('neighborhood', request('neighborhood')) == 'Harmanlı' ? 'selected' : '' }}>
                                                    Harmanlı
                                                </option>
                                                <option
                                                    value="Işıklar" {{ old('neighborhood', request('neighborhood')) == 'Işıklar' ? 'selected' : '' }}>
                                                    Işıklar
                                                </option>
                                                <option
                                                    value="Şenköy" {{ old('neighborhood', request('neighborhood')) == 'Şenköy' ? 'selected' : '' }}>
                                                    Şenköy
                                                </option>
                                                <option
                                                    value="Yenimahalle" {{ old('neighborhood', request('neighborhood')) == 'Yenimahalle' ? 'selected' : '' }}>
                                                    Yenimahalle
                                                </option>
                                                <option
                                                    value="Estel" {{ old('neighborhood', request('neighborhood')) == 'Estel' ? 'selected' : '' }}>
                                                    Estel
                                                </option>
                                                <option
                                                    value="Akçakaya" {{ old('neighborhood', request('neighborhood')) == 'Akçakaya' ? 'selected' : '' }}>
                                                    Akçakaya
                                                </option>
                                                <option
                                                    value="Anıtlı" {{ old('neighborhood', request('neighborhood')) == 'Anıtlı' ? 'selected' : '' }}>
                                                    Anıtlı
                                                </option>
                                                <option
                                                    value="Mercimekli" {{ old('neighborhood', request('neighborhood')) == 'Mercimekli' ? 'selected' : '' }}>
                                                    Mercimekli
                                                </option>
                                                <option
                                                    value="Yolbaşı" {{ old('neighborhood', request('neighborhood')) == 'Yolbaşı' ? 'selected' : '' }}>
                                                    Yolbaşı
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg align-items-end">
                                <div class="form-group">
                                    <label for="#">İlan Tipi</label>
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                            <select name="type" id="" class="form-control">
                                                <option value="">Tümü</option>
                                                <option
                                                    value="Daire" {{ old('type', request('type')) == 'Daire' ? 'selected' : '' }}>
                                                    Daire
                                                </option>
                                                <option
                                                    value="Müstakil" {{ old('type', request('type')) == 'Müstakil' ? 'selected' : '' }}>
                                                    Müstakil
                                                </option>
                                                <option
                                                    value="Arsa" {{ old('type', request('type')) == 'Arsa' ? 'selected' : '' }}>
                                                    Arsa
                                                </option>
                                                <option
                                                    value="Dükkan" {{ old('type', request('type')) == 'Dükkan' ? 'selected' : '' }}>
                                                    Dükkan
                                                </option>
                                                <option
                                                    value="Ofis" {{ old('type', request('type')) == 'Ofis' ? 'selected' : '' }}>
                                                    Ofis
                                                </option>
                                                <option
                                                    value="Villa" {{ old('type', request('type')) == 'Villa' ? 'selected' : '' }}>
                                                    Villa
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg align-items-end">
                                <div class="form-group">
                                    <label for="#">Durum</label>
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                            <select name="status" id="" class="form-control">
                                                <option value="">Tümü</option>
                                                <option
                                                    value="Kiralık" {{ old('status', request('status')) == 'Kiralık' ? 'selected' : '' }}>
                                                    Kiralık
                                                </option>
                                                <option
                                                    value="Satılık" {{ old('status', request('status')) == 'Satılık' ? 'selected' : '' }}>
                                                    Satılık
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg align-items-end">
                                <div class="form-group">
                                    <label for="#">Max Fiyat</label>
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                            <select name="price_max" id="" class="form-control">
                                                <option value="">Sınırsız</option>
                                                <option
                                                    value="50000" {{ old('price_max', request('price_max')) == '50000' ? 'selected' : '' }}>
                                                    50.000 ₺
                                                </option>
                                                <option
                                                    value="100000" {{ old('price_max', request('price_max')) == '100000' ? 'selected' : '' }}>
                                                    100.000 ₺
                                                </option>
                                                <option
                                                    value="250000" {{ old('price_max', request('price_max')) == '250000' ? 'selected' : '' }}>
                                                    250.000 ₺
                                                </option>
                                                <option
                                                    value="500000" {{ old('price_max', request('price_max')) == '500000' ? 'selected' : '' }}>
                                                    500.000 ₺
                                                </option>
                                                <option
                                                    value="750000" {{ old('price_max', request('price_max')) == '750000' ? 'selected' : '' }}>
                                                    750.000 ₺
                                                </option>
                                                <option
                                                    value="1000000" {{ old('price_max', request('price_max')) == '1000000' ? 'selected' : '' }}>
                                                    1.000.000 ₺
                                                </option>
                                                <option
                                                    value="2000000" {{ old('price_max', request('price_max')) == '2000000' ? 'selected' : '' }}>
                                                    2.000.000 ₺
                                                </option>
                                                <option
                                                    value="5000000" {{ old('price_max', request('price_max')) == '5000000' ? 'selected' : '' }}>
                                                    5.000.000 ₺
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg align-self-end">
                                <div class="form-group">
                                    <div class="form-field">
                                        <input type="submit" value="İlan Ara" class="form-control btn btn-primary">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
