@extends('layouts.admin.app')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="body-wrapper-inner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="stats-icon bg-primary">
                                        <i class="ti ti-home"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-0">Toplam İlan</h6>
                                    <h4 class="mb-0">{{ $totalEstates }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="stats-icon bg-success">
                                        <i class="ti ti-search"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-0">Parsel Sorgulama</h6>
                                    <h4 class="mb-0">Aktif</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="stats-icon bg-warning">
                                        <i class="ti ti-user"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-0">Kullanıcılar</h6>
                                    <h4 class="mb-0">{{ $totalUsers }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="stats-icon bg-info">
                                        <i class="ti ti-chart-bar"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-0">Parsel İlanları</h6>
                                    <h4 class="mb-0">{{ $parcelEstates }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Hızlı İşlemler</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <a href="{{ route('estate.create') }}" class="btn btn-primary w-100 mb-2">
                                        <i class="ti ti-plus"></i> Yeni İlan Ekle
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="{{ route('estate.index') }}" class="btn btn-success w-100 mb-2">
                                        <i class="ti ti-list"></i> İlanları Görüntüle
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="{{ route('parsel.index') }}" class="btn btn-info w-100 mb-2">
                                        <i class="ti ti-search"></i> Parsel Sorgula
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="{{ route('users.index') }}" class="btn btn-warning w-100 mb-2">
                                        <i class="ti ti-users"></i> Kullanıcılar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
