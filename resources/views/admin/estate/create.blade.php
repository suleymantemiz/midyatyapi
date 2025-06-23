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
              <div class="mb-3">
                <label for="estateType" class="form-label">İlan Türü</label>
                <select class="form-control" id="estateType" name="type" required>
                  <option value="">Seçiniz</option>
                  <option value="Tarla">Tarla</option>
                  <option value="Bahçe">Bahçe</option>
                  <option value="Ev">Ev</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="estateStatus" class="form-label">İlan Durumu</label>
                <select class="form-control" id="estateStatus" name="status" required>
                  <option value="">Seçiniz</option>
                  <option value="Satılık">Satılık</option>
                  <option value="Kiralık">Kiralık</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="estateName" class="form-label">İlan Adı</label>
                <input type="text" class="form-control" id="estateName" name="name" required>
              </div>
              <div class="mb-3">
                <label for="estatePrice" class="form-label">Fiyat</label>
                <input type="number" class="form-control" id="estatePrice" name="price" required>
              </div>
              <div class="mb-3">
                <label for="mainImage" class="form-label">Ana Resim</label>
                <input type="file" class="form-control" id="mainImage" name="main_image" accept="image/*" required>
              </div>
              <div class="mb-3">
                <label for="galleryImages" class="form-label">Galeri Resimleri</label>
                <input type="file" class="form-control" id="galleryImages" name="gallery_images[]" accept="image/*" multiple>
              </div>
              <div class="mb-3">
                <label for="parcelNumber" class="form-label">Ada Parsel Numarası</label>
                <input type="text" class="form-control" id="parcelNumber" name="parcel_number">
              </div>
              <div class="mb-3">
                <label for="estateFeatures" class="form-label">İlan Özellikleri</label>
                <textarea class="form-control summernote" id="estateFeatures" name="features" rows="6"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Kaydet</button>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
