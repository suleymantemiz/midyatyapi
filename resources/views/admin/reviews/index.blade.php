@extends('layouts.admin.app')

@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Yorum Yönetimi</h4>
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Ana Sayfa</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Yorumlar</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tüm Yorumlar</h5>

                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>İlan</th>
                                        <th>Kullanıcı</th>
                                        <th>E-posta</th>
                                        <th>Puan</th>
                                        <th>Yorum</th>
                                        <th>Durum</th>
                                        <th>Tarih</th>
                                        <th>İşlemler</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($reviews as $review)
                                        <tr>
                                            <td>{{ $review->id }}</td>
                                            <td>
                                                <a href="{{ route('estate.show', $review->estate->id) }}"
                                                   target="_blank">
                                                    {{ $review->estate->name }}
                                                </a>
                                            </td>
                                            <td>{{ $review->name }}</td>
                                            <td>{{ $review->email }}</td>
                                            <td>
                                            <span class="text-warning">
                                                @for($i = 1; $i <= 5; $i++)
                                                    @if($i <= $review->rating)
                                                        ★
                                                    @else
                                                        ☆
                                                    @endif
                                                @endfor
                                            </span>
                                                ({{ $review->rating }}/5)
                                            </td>
                                            <td>
                                                <div
                                                    style="max-width: 300px; overflow: hidden; text-overflow: ellipsis;">
                                                    {{ Str::limit($review->comment, 100) }}
                                                </div>
                                            </td>
                                            <td>
                                                @if($review->is_approved)
                                                    <span class="badge badge-success">Onaylı</span>
                                                @else
                                                    <span class="badge badge-warning">Beklemede</span>
                                                @endif
                                            </td>
                                            <td>{{ $review->created_at->format('d.m.Y H:i') }}</td>
                                            <td>
                                                @if(!$review->is_approved)
                                                    <form action="{{ route('admin.reviews.approve', $review->id) }}"
                                                          method="POST" style="display: inline;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success btn-sm"
                                                                onclick="return confirm('Bu yorumu onaylamak istediğinizden emin misiniz?')">
                                                            <i class="fas fa-check"></i> Onayla
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('admin.reviews.reject', $review->id) }}"
                                                          method="POST" style="display: inline;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Bu yorumu reddetmek istediğinizden emin misiniz?')">
                                                            <i class="fas fa-times"></i> Reddet
                                                        </button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('admin.reviews.destroy', $review->id) }}"
                                                          method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Bu yorumu silmek istediğinizden emin misiniz?')">
                                                            <i class="fas fa-trash"></i> Sil
                                                        </button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="text-center">Henüz yorum bulunmuyor.</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <div class="d-flex justify-content-center">
                                {{ $reviews->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
