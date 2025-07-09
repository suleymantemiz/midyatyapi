@extends('layouts.admin.app')

@section('title', 'Kullanıcılar')

@section('content')
<div class="body-wrapper-inner">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="container mt-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h2>Kullanıcılar</h2>
                        <a href="{{ route('users.create') }}" class="btn btn-success">+ Kullanıcı Ekle</a>
                    </div>

                    @if($users->isEmpty())
                    <div class="alert alert-warning">Kullanıcı bulunamadı.</div>
                    @else
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                                <th>ID</th>
                                <th>İsim</th>
                                <th>Email</th>
                                <th>Oluşturulma</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Düzenle</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Silmek istediğinize emin misiniz?')">Sil</button>
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
