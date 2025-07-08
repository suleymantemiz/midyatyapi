@extends('layouts.admin.app')

@section('title', 'İlan Düzenle')

@section('content')
<div class="body-wrapper-inner">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h2>İlan Düzenle</h2>
                <form action="{{ route('estate.update', $estate->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Zorunlu Alanlar --}}
                    <div class="mb-3">
                        <label for="name" class="form-label">Başlık</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $estate->name) }}" required>
                        @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="features" class="form-label">Açıklama</label>
                        <textarea class="form-control" id="features" name="features">{{ old('features', $estate->features) }}</textarea>
                        @error('features')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Fiyat (₺)</label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ old('price', $estate->price) }}" required>
                        @error('price')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="type" class="form-label">Tür</label>
                        <select class="form-control" id="type" name="type" required>
                            <option value="Daire" {{ old('type', $estate->type) == 'Daire' ? 'selected' : '' }}>Daire</option>
                            <option value="Müstakil" {{ old('type', $estate->type) == 'Müstakil' ? 'selected' : '' }}>Müstakil</option>
                            <option value="Arsa" {{ old('type', $estate->type) == 'Arsa' ? 'selected' : '' }}>Arsa</option>
                            <option value="Dükkan" {{ old('type', $estate->type) == 'Dükkan' ? 'selected' : '' }}>Dükkan</option>
                            <option value="Ofis" {{ old('type', $estate->type) == 'Ofis' ? 'selected' : '' }}>Ofis</option>
                            <option value="Villa" {{ old('type', $estate->type) == 'Villa' ? 'selected' : '' }}>Villa</option>
                        </select>
                        @error('type')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Durum</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="Satılık" {{ old('status', $estate->status) == 'Satılık' ? 'selected' : '' }}>Satılık</option>
                            <option value="Kiralık" {{ old('status', $estate->status) == 'Kiralık' ? 'selected' : '' }}>Kiralık</option>
                        </select>
                        @error('status')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="parcel_number" class="form-label">Parsel Numarası</label>
                        <input type="text" class="form-control" id="parcel_number" name="parcel_number" value="{{ old('parcel_number', $estate->parcel_number) }}">
                        @error('parcel_number')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="main_image" class="form-label">Ana Görsel</label>
                        <input type="file" class="form-control" id="main_image" name="main_image">
                        @error('main_image')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <!-- Bina Alanları -->
                    <div id="building-fields" style="display: none;">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="gross_m2" class="form-label">Brüt m²</label>
                                <input type="number" class="form-control" name="gross_m2" value="{{ old('gross_m2', $estate->gross_m2) }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="net_m2" class="form-label">Net m²</label>
                                <input type="number" class="form-control" name="net_m2" value="{{ old('net_m2', $estate->net_m2) }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="number_of_rooms" class="form-label">Oda Sayısı</label>
                                <input type="number" class="form-control" name="number_of_rooms" value="{{ old('number_of_rooms', $estate->number_of_rooms) }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="building_age" class="form-label">Bina Yaşı</label>
                                <input type="number" class="form-control" name="building_age" value="{{ old('building_age', $estate->building_age) }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="number_of_floors" class="form-label">Kat Sayısı</label>
                                <input type="number" class="form-control" name="number_of_floors" value="{{ old('number_of_floors', $estate->number_of_floors) }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="heating" class="form-label">Isıtma</label>
                                <select class="form-control" name="heating">
                                    <option value="" {{ old('heating', $estate->heating) == '' ? 'selected' : '' }}>Seçiniz</option>
                                    <option value="Doğalgaz" {{ old('heating', $estate->heating) == 'Doğalgaz' ? 'selected' : '' }}>Doğalgaz</option>
                                    <option value="Soba" {{ old('heating', $estate->heating) == 'Soba' ? 'selected' : '' }}>Soba</option>
                                    <option value="Klima" {{ old('heating', $estate->heating) == 'Klima' ? 'selected' : '' }}>Klima</option>
                                    <option value="Merkezi" {{ old('heating', $estate->heating) == 'Merkezi' ? 'selected' : '' }}>Merkezi</option>
                                    <option value="Yok" {{ old('heating', $estate->heating) == 'Yok' ? 'selected' : '' }}>Yok</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="number_of_bathrooms" class="form-label">Banyo Sayısı</label>
                                <input type="number" class="form-control" name="number_of_bathrooms" value="{{ old('number_of_bathrooms', $estate->number_of_bathrooms) }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="kitchen" class="form-label">Mutfak</label>
                                <input type="text" class="form-control" name="kitchen" value="{{ old('kitchen', $estate->kitchen) }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="parking" class="form-label">Otopark</label>
                                <select name="parking" class="form-control">
                                    <option value="Yok" {{ old('parking', $estate->parking) == 'Yok' ? 'selected' : '' }}>Yok</option>
                                    <option value="Kapalı Otopark" {{ old('parking', $estate->parking) == 'Kapalı Otopark' ? 'selected' : '' }}>Kapalı Otopark</option>
                                    <option value="Açık Otopark" {{ old('parking', $estate->parking) == 'Açık Otopark' ? 'selected' : '' }}>Açık Otopark</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="furnished" class="form-label">Eşyalı mı?</label>
                                <select name="furnished" class="form-control">
                                    <option value="Evet" {{ old('furnished', $estate->furnished) == 'Evet' ? 'selected' : '' }}>Evet</option>
                                    <option value="Hayır" {{ old('furnished', $estate->furnished) == 'Hayır' ? 'selected' : '' }}>Hayır</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="usage_status" class="form-label">Kullanım Durumu</label>
                                <select class="form-control" name="usage_status">
                                    <option value="" {{ old('usage_status', $estate->usage_status) == '' ? 'selected' : '' }}>Seçiniz</option>
                                    <option value="Boş" {{ old('usage_status', $estate->usage_status) == 'Boş' ? 'selected' : '' }}>Boş</option>
                                    <option value="Kiracı" {{ old('usage_status', $estate->usage_status) == 'Kiracı' ? 'selected' : '' }}>Kiracı</option>
                                    <option value="Ev Sahibi" {{ old('usage_status', $estate->usage_status) == 'Ev Sahibi' ? 'selected' : '' }}>Ev Sahibi</option>
                                    <option value="İnşaat Halinde" {{ old('usage_status', $estate->usage_status) == 'İnşaat Halinde' ? 'selected' : '' }}>İnşaat Halinde</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="site_content" class="form-label">Site İçinde mi?</label>
                                <select class="form-control" name="site_content">
                                    <option value="" {{ old('site_content', $estate->site_content) == '' ? 'selected' : '' }}>Seçiniz</option>
                                    <option value="Evet" {{ old('site_content', $estate->site_content) == 'Evet' ? 'selected' : '' }}>Evet</option>
                                    <option value="Hayır" {{ old('site_content', $estate->site_content) == 'Hayır' ? 'selected' : '' }}>Hayır</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="site_name" class="form-label">Site Adı</label>
                                <input type="text" class="form-control" name="site_name" value="{{ old('site_name', $estate->site_name) }}">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="help_tl" class="form-label">Aidat (₺)</label>
                                <input type="number" step="0.01" class="form-control" name="help_tl" value="{{ old('help_tl', $estate->help_tl) }}">
                            </div>
                        </div>
                    </div>
                     <!-- Arsa Alanları -->
                     <div id="land-fields" style="display: none;">
                        <div class="col-md-4 mb-3">
                            <label for="open_area_m2" class="form-label">Açık Alan m²</label>
                            <input type="number" class="form-control" name="open_area_m2" value="{{ old('open_area_m2', $estate->open_area_m2) }}">
                        </div>
                    </div>

                    <!-- Ortak Alanlar -->
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="available_for_credit" class="form-label">Krediye Uygun mu?</label>
                            <select name="available_for_credit" class="form-control">
                                <option value="Evet" {{ old('available_for_credit', $estate->available_for_credit) == 'Evet' ? 'selected' : '' }}>Evet</option>
                                <option value="Hayır" {{ old('available_for_credit', $estate->available_for_credit) == 'Hayır' ? 'selected' : '' }}>Hayır</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="title_deed_status" class="form-label">Tapu Durumu</label>
                            <select class="form-control" name="title_deed_status">
                                <option value="" {{ old('title_deed_status', $estate->title_deed_status) == '' ? 'selected' : '' }}>Seçiniz</option>
                                <option value="Kat Mülkiyetli" {{ old('title_deed_status', $estate->title_deed_status) == 'Kat Mülkiyetli' ? 'selected' : '' }}>Kat Mülkiyetli</option>
                                <option value="Kat İrtifaklı" {{ old('title_deed_status', $estate->title_deed_status) == 'Kat İrtifaklı' ? 'selected' : '' }}>Kat İrtifaklı</option>
                                <option value="Arsa Tapulu" {{ old('title_deed_status', $estate->title_deed_status) == 'Arsa Tapulu' ? 'selected' : '' }}>Arsa Tapulu</option>
                                <option value="Hisseli Tapulu" {{ old('title_deed_status', $estate->title_deed_status) == 'Hisseli Tapulu' ? 'selected' : '' }}>Hisseli Tapulu</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="from_person" class="form-label">İlan Sahibi</label>
                            <select class="form-control" name="from_person">
                                <option value="" {{ old('from_person', $estate->from_person) == '' ? 'selected' : '' }}>Seçiniz</option>
                                <option value="Sahibinden" {{ old('from_person', $estate->from_person) == 'Sahibinden' ? 'selected' : '' }}>Sahibinden</option>
                                <option value="Emlakçıdan" {{ old('from_person', $estate->from_person) == 'Emlakçıdan' ? 'selected' : '' }}>Emlakçıdan</option>
                                <option value="Bankadan" {{ old('from_person', $estate->from_person) == 'Bankadan' ? 'selected' : '' }}>Bankadan</option>
                                <option value="Müteahhitten" {{ old('from_person', $estate->from_person) == 'Müteahhitten' ? 'selected' : '' }}>Müteahhitten</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="exchange" class="form-label">Takas</label>
                            <select name="exchange" class="form-control">
                                <option value="Var" {{ old('exchange', $estate->exchange) == 'Var' ? 'selected' : '' }}>Var</option>
                                <option value="Yok" {{ old('exchange', $estate->exchange) == 'Yok' ? 'selected' : '' }}>Yok</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Güncelle</button>
                    <a href="{{ route('estate.index') }}" class="btn btn-secondary">Geri</a>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        function toggleFields() {
            var selectedType = $('#type').val();
            var buildingTypes = ['Daire', 'Müstakil', 'Dükkan', 'Ofis', 'Villa'];

            if (selectedType === 'Arsa') {
                $('#land-fields').show();
                $('#building-fields').hide();
            } else if (buildingTypes.includes(selectedType)) {
                $('#land-fields').hide();
                $('#building-fields').show();
            } else {
                $('#land-fields').hide();
                $('#building-fields').hide();
            }
        }

        $('#type').change(toggleFields);
        
        // Sayfa yüklendiğinde mevcut veriye göre alanları göster
        toggleFields();
    });
</script>
@endsection