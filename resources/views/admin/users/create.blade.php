@extends('layouts.admin.app')

@section('title', 'Kullanıcı Ekle')

@section('content')
    <div class="body-wrapper-inner">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h2>Yeni Kullanıcı Ekle</h2>
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">İsim</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">E-posta</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Şifre</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Şifre Tekrar</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                   name="password_confirmation" required>
                        </div>
                        <button type="submit" class="btn btn-success">Kaydet</button>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">Geri</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
