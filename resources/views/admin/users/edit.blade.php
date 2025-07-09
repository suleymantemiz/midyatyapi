@extends('layouts.admin.app')

@section('title', 'Kullanıcı Düzenle')

@section('content')
    <div class="body-wrapper-inner">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h2>Kullanıcı Düzenle</h2>
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">İsim</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   value="{{ old('name', $user->name) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">E-posta</label>
                            <input type="email" class="form-control" id="email" name="email"
                                   value="{{ old('email', $user->email) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Şifre (Değiştirmek için doldurun)</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Şifre Tekrar</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                   name="password_confirmation">
                        </div>
                        <button type="submit" class="btn btn-primary">Güncelle</button>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">Geri</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
