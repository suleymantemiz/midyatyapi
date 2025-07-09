@extends('layouts.admin.app')

@section('title', 'Hakkımızda İçeriği Düzenle')

@section('content')
<div class="body-wrapper-inner">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h2>Hakkımızda İçeriği Düzenle</h2>
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <form action="{{ route('admin.about.update') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="title">Başlık</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $about->title ?? '') }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="main_content">Ana İçerik</label>
                        <textarea name="main_content" id="main_content" class="form-control" rows="5">{{ old('main_content', $about->main_content ?? '') }}</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="features">Öne Çıkanlar (Her satır bir madde)</label>
                        <textarea name="features" id="features" class="form-control" rows="4">{{ old('features', $about->features ?? '') }}</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="stats">İstatistikler (ör: 500+ Mutlu Müşteri | Her satır bir istatistik)</label>
                        <textarea name="stats" id="stats" class="form-control" rows="3">{{ old('stats', $about->stats ?? '') }}</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="contact">İletişim Bilgileri (ör: Telefon: 0xxx | Her satır bir bilgi)</label>
                        <textarea name="contact" id="contact" class="form-control" rows="3">{{ old('contact', $about->contact ?? '') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Kaydet</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 