@extends('layouts.admin.app')

@section('title', 'İlanlar')

@section('content')
    <div class="body-wrapper-inner">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="container mt-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h2>İlanlar</h2>
                            <a href="{{ route('estate.create') }}" class="btn btn-success">+ İlan Ekle</a>
                        </div>

                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if($estates->isEmpty())
                            <div class="alert alert-warning">Hiç ilan bulunamadı.</div>
                        @else
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Başlık</th>
                                    <th>Tür</th>
                                    <th>Durum</th>
                                    <th>Fiyat</th>
                                    <th>Parsel</th>
                                    <th>Adres</th>
                                    <th>Konum</th>
                                    <th>Özel Teklif</th>
                                    <th>İşlemler</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($estates as $estate)
                                    <tr>
                                        <td>{{ $estate->id }}</td>
                                        <td>{{ $estate->name }}</td>
                                        <td>{{ $estate->type }}</td>
                                        <td>{{ $estate->status }}</td>
                                        <td>{{ number_format($estate->price, 2, ',', '.') }} ₺</td>
                                        <td>{{ $estate->parcel_number ?? '-' }}</td>
                                        <td>
                                            @if($estate->address)
                                                <span title="{{ $estate->address }}" style="cursor: help;">
                                            {{ Str::limit($estate->address, 30) }}
                                        </span>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if($estate->latitude && $estate->longitude)
                                                <div>
                                                    <small class="text-muted d-block">
                                                        {{ $estate->latitude }}, {{ $estate->longitude }}
                                                    </small>
                                                    <a href="https://www.google.com/maps?q={{ $estate->latitude }},{{ $estate->longitude }}"
                                                       target="_blank"
                                                       class="btn btn-info btn-sm"
                                                       title="Google Maps'te Aç">
                                                        📍 Haritada Göster
                                                    </a>
                                                </div>
                                            @else
                                                <span class="text-muted">Konum yok</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($estate->is_featured)
                                                <span class="badge bg-success">✓ Özel Teklif</span>
                                            @else
                                                <span class="badge bg-secondary">Normal</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('estate.edit', $estate->id) }}"
                                               class="btn btn-warning btn-sm">Düzenle</a>
                                            <form action="{{ route('estate.destroy', $estate->id) }}" method="POST"
                                                  style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Silmek istediğinize emin misiniz?')">
                                                    Sil
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
