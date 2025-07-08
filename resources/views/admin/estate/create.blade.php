@extends('layouts.admin.app')

@section('title', 'Yeni İlan Ekle')

@section('content')
<div class="body-wrapper-inner">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <h2>Yeni İlan Ekle</h2>
        <form method="POST" action="{{ route('estate.store') }}" enctype="multipart/form-data">
          @csrf

          <!-- Temel Bilgiler -->
          <div class="mb-3">
            <label for="type" class="form-label">Tür</label>
            <select class="form-control" id="type" name="type" required>
              <option value="Daire" {{ old('type') == 'Daire' ? 'selected' : '' }}>Daire</option>
              <option value="Müstakil" {{ old('type') == 'Müstakil' ? 'selected' : '' }}>Müstakil</option>
              <option value="Arsa" {{ old('type') == 'Arsa' ? 'selected' : '' }}>Arsa</option>
              <option value="Dükkan" {{ old('type') == 'Dükkan' ? 'selected' : '' }}>Dükkan</option>
              <option value="Ofis" {{ old('type') == 'Ofis' ? 'selected' : '' }}>Ofis</option>
              <option value="Villa" {{ old('type') == 'Villa' ? 'selected' : '' }}>Villa</option>
            </select>
            @error('type')<small class="text-danger">{{ $message }}</small>@enderror
          </div>

          <div class="mb-3">
            <label for="status" class="form-label">İlan Durumu</label>
            <select class="form-control" id="status" name="status" required>
              <option value="">Seçiniz</option>
              <option value="Satılık">Satılık</option>
              <option value="Kiralık">Kiralık</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="name" class="form-label">İlan Başlığı</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>

          <div class="mb-3">
            <label for="price" class="form-label">Fiyat (TL)</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" required>
          </div>

          <div class="mb-3">
            <label for="main_image" class="form-label">Ana Resim</label>
            <input type="file" class="form-control" id="main_image" name="main_image" accept="image/*" required>
          </div>

          <div class="mb-3">
            <label for="gallery_images" class="form-label">Galeri Resimleri</label>
            <input type="file" class="form-control" id="gallery_images" name="gallery_images[]" accept="image/*" multiple>
          </div>

          <div class="mb-3">
            <label for="parcel_number" class="form-label">Ada Parsel Numarası</label>
            <input type="text" class="form-control" id="parcel_number" name="parcel_number" value="{{ old('parcel_number') }}">
          </div>

          <!-- Bina Alanları -->
          <div id="building-fields" style="display: none;">
            <div class="row">
              <div class="col-md-4 mb-3">
                <label for="gross_m2" class="form-label">Brüt m²</label>
                <input type="number" class="form-control" name="gross_m2" value="{{ old('gross_m2') }}">
              </div>
              <div class="col-md-4 mb-3">
                <label for="net_m2" class="form-label">Net m²</label>
                <input type="number" class="form-control" name="net_m2" value="{{ old('net_m2') }}">
              </div>
              <div class="col-md-4 mb-3">
                <label for="number_of_rooms" class="form-label">Oda Sayısı</label>
                <input type="text" class="form-control" name="number_of_rooms" value="{{ old('number_of_rooms') }}">
              </div>
              <div class="col-md-4 mb-3">
                <label for="building_age" class="form-label">Bina Yaşı</label>
                <input type="number" class="form-control" name="building_age" value="{{ old('building_age') }}">
              </div>
              <div class="col-md-4 mb-3">
                <label for="number_of_floors" class="form-label">Kat Sayısı</label>
                <input type="number" class="form-control" name="number_of_floors" value="{{ old('number_of_floors') }}">
              </div>
              <div class="col-md-4 mb-3">
                <label for="heating" class="form-label">Isıtma</label>
                <select class="form-control" name="heating">
                  <option value="" {{ old('heating') == '' ? 'selected' : '' }}>Seçiniz</option>
                  <option value="Doğalgaz" {{ old('heating') == 'Doğalgaz' ? 'selected' : '' }}>Doğalgaz</option>
                  <option value="Soba" {{ old('heating') == 'Soba' ? 'selected' : '' }}>Soba</option>
                  <option value="Klima" {{ old('heating') == 'Klima' ? 'selected' : '' }}>Klima</option>
                  <option value="Merkezi" {{ old('heating') == 'Merkezi' ? 'selected' : '' }}>Merkezi</option>
                  <option value="Yok" {{ old('heating') == 'Yok' ? 'selected' : '' }}>Yok</option>
                </select>
              </div>
              <div class="col-md-4 mb-3">
                <label for="number_of_bathrooms" class="form-label">Banyo Sayısı</label>
                <input type="number" class="form-control" name="number_of_bathrooms" value="{{ old('number_of_bathrooms') }}">
              </div>
              <div class="col-md-4 mb-3">
                <label for="kitchen" class="form-label">Mutfak</label>
                <input type="text" class="form-control" name="kitchen" value="{{ old('kitchen') }}">
              </div>
              <div class="col-md-4 mb-3">
                <label for="parking" class="form-label">Otopark</label>
                <select class="form-control" name="parking">
                  <option value="" {{ old('parking') == '' ? 'selected' : '' }}>Seçiniz</option>
                  <option value="Yok" {{ old('parking') == 'Yok' ? 'selected' : '' }}>Yok</option>
                  <option value="Açık Otopark" {{ old('parking') == 'Açık Otopark' ? 'selected' : '' }}>Açık Otopark</option>
                  <option value="Kapalı Otopark" {{ old('parking') == 'Kapalı Otopark' ? 'selected' : '' }}>Kapalı Otopark</option>
                </select>
              </div>
              <div class="col-md-4 mb-3">
                <label for="furnished" class="form-label">Eşyalı mı?</label>
                <select class="form-control" name="furnished">
                  <option value="" {{ old('furnished') == '' ? 'selected' : '' }}>Seçiniz</option>
                  <option value="Evet" {{ old('furnished') == 'Evet' ? 'selected' : '' }}>Evet</option>
                  <option value="Hayır" {{ old('furnished') == 'Hayır' ? 'selected' : '' }}>Hayır</option>
                </select>
              </div>
              <div class="col-md-4 mb-3">
                <label for="usage_status" class="form-label">Kullanım Durumu</label>
                <select class="form-control" name="usage_status">
                  <option value="" {{ old('usage_status') == '' ? 'selected' : '' }}>Seçiniz</option>
                  <option value="Boş" {{ old('usage_status') == 'Boş' ? 'selected' : '' }}>Boş</option>
                  <option value="Kiracı" {{ old('usage_status') == 'Kiracı' ? 'selected' : '' }}>Kiracı</option>
                  <option value="Ev Sahibi" {{ old('usage_status') == 'Ev Sahibi' ? 'selected' : '' }}>Ev Sahibi</option>
                  <option value="İnşaat Halinde" {{ old('usage_status') == 'İnşaat Halinde' ? 'selected' : '' }}>İnşaat Halinde</option>
                </select>
              </div>
              <div class="col-md-4 mb-3">
                <label for="site_content" class="form-label">Site İçinde mi?</label>
                <select class="form-control" name="site_content">
                  <option value="" {{ old('site_content') == '' ? 'selected' : '' }}>Seçiniz</option>
                  <option value="Evet" {{ old('site_content') == 'Evet' ? 'selected' : '' }}>Evet</option>
                  <option value="Hayır" {{ old('site_content') == 'Hayır' ? 'selected' : '' }}>Hayır</option>
                </select>
              </div>
              <div class="col-md-4 mb-3">
                <label for="site_name" class="form-label">Site Adı</label>
                <input type="text" class="form-control" name="site_name" value="{{ old('site_name') }}">
              </div>
              <div class="col-md-4 mb-3">
                <label for="help_tl" class="form-label">Aidat (TL)</label>
                <input type="number" class="form-control" name="help_tl" value="{{ old('help_tl') }}">
              </div>
            </div>
          </div>
          <!-- Arsa Alanları -->
          <div id="land-fields" style="display: none;">
            <div class="mb-3">
              <label for="open_area_m2" class="form-label">Açık Alan m²</label>
              <input type="number" class="form-control" name="open_area_m2" value="{{ old('open_area_m2') }}">
            </div>
          </div>

          <!-- Ortak Alanlar -->
          <div class="mb-3">
            <label for="available_for_credit" class="form-label">Krediye Uygun mu?</label>
            <select class="form-control" name="available_for_credit">
              <option value="" {{ old('available_for_credit') == '' ? 'selected' : '' }}>Seçiniz</option>
              <option value="Evet" {{ old('available_for_credit') == 'Evet' ? 'selected' : '' }}>Evet</option>
              <option value="Hayır" {{ old('available_for_credit') == 'Hayır' ? 'selected' : '' }}>Hayır</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="title_deed_status" class="form-label">Tapu Durumu</label>
            <select class="form-control" name="title_deed_status">
              <option value="">Seçiniz</option>
              <option value="Kat Mülkiyetli" {{ old('title_deed_status') == 'Kat Mülkiyetli' ? 'selected' : '' }}>Kat Mülkiyetli</option>
              <option value="Kat İrtifaklı" {{ old('title_deed_status') == 'Kat İrtifaklı' ? 'selected' : '' }}>Kat İrtifaklı</option>
              <option value="Arsa Tapulu" {{ old('title_deed_status') == 'Arsa Tapulu' ? 'selected' : '' }}>Arsa Tapulu</option>
              <option value="Hisseli Tapulu" {{ old('title_deed_status') == 'Hisseli Tapulu' ? 'selected' : '' }}>Hisseli Tapulu</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="from_person" class="form-label">İlan Sahibi</label>
            <select class="form-control" name="from_person">
              <option value="">Seçiniz</option>
              <option value="Sahibinden" {{ old('from_person') == 'Sahibinden' ? 'selected' : '' }}>Sahibinden</option>
              <option value="Emlakçıdan" {{ old('from_person') == 'Emlakçıdan' ? 'selected' : '' }}>Emlakçıdan</option>
              <option value="Bankadan" {{ old('from_person') == 'Bankadan' ? 'selected' : '' }}>Bankadan</option>
              <option value="Müteahhitten" {{ old('from_person') == 'Müteahhitten' ? 'selected' : '' }}>Müteahhitten</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="exchange" class="form-label">Takas</label>
            <select class="form-control" name="exchange">
              <option value="">Seçiniz</option>
              <option value="Var">Var</option>
              <option value="Yok">Yok</option>
            </select>
          </div>

          <!-- Açıklama Alanı -->
          <div class="mb-3">
            <label for="features" class="form-label">Açıklamalar / Özellikler</label>
            <textarea class="form-control summernote" name="features" rows="5"></textarea>
          </div>

          <button type="submit" class="btn btn-primary">Kaydet</button>
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

    // Sayfa yüklendiğinde ve formda eski veri varsa kontrol et
    toggleFields();
  });
</script>
@endsection