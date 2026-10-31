@extends('layouts.app')
@section('title', 'Profil Petugas')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7 col-lg-6">
        <div class="card shadow-sm">
            <div class="card-header fw-semibold">Profil Petugas</div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Nama:</strong> {{ Auth::user()->name }}</li>
                <li class="list-group-item"><strong>Email:</strong> {{ Auth::user()->email }}</li>
                <li class="list-group-item">
                    <strong>Akun dibuat:</strong>
                    {{ Auth::user()->created_at->format('d M Y H:i') }}
                    ({{ Auth::user()->created_at->diffForHumans() }})
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
