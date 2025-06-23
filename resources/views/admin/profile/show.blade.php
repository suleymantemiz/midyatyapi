@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="body-wrapper-inner">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
    <h1>Profilim</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">İsim</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
            @error('name')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-posta</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
            @error('email')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Şifre (Değiştirmek istemiyorsanız boş bırakın)</label>
            <input type="password" id="password" name="password" class="form-control">
            @error('password')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Şifre (Tekrar)</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Güncelle</button>
    </form>
</div>
            </div>
        </div>
    </div>
</div>
@endsection
