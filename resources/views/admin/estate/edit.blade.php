@extends('layouts.admin.app')

@section('title', 'İlan Düzenle')

@section('content')
<div class="body-wrapper-inner">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h2>İlan Düzenle</h2>
                <form action="{{ route('estate.update', $estate->id) }}" method="POST">
                    @csrf
                    @method('PUT')

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
                        <input type="text" class="form-control" id="type" name="type" value="{{ old('type', $estate->type) }}" required>
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
                

                    <button type="submit" class="btn btn-primary">Güncelle</button>
                    <a href="{{ route('estate.index') }}" class="btn btn-secondary">Geri</a>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection