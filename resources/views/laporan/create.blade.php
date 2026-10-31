@extends('layouts.app')
@section('title', 'Lapor Banjir')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card shadow-sm">
            <div class="card-body p-4">
                <h4 class="mb-1">Form Pelaporan Banjir</h4>
                <p class="text-muted">Warga dapat melapor tanpa login.</p>
                <form action="{{ route('laporan.store') }}" method="POST" novalidate>
                    @csrf
                    @php
                        $fields = [
                            ['nama_pelapor', 'Nama Pelapor', 'text'],
                            ['no_hp', 'No. HP', 'text'],
                            ['lokasi', 'Lokasi / Alamat Banjir', 'text'],
                            ['kecamatan', 'Kecamatan', 'text'],
                            ['tinggi_air', 'Tinggi Air (cm)', 'number'],
                        ];
                    @endphp
                    @foreach ($fields as [$name, $label, $type])
                        <div class="mb-3">
                            <label class="form-label" for="{{ $name }}">{{ $label }}</label>
                            <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" value="{{ old($name) }}"
                                   class="form-control @error($name) is-invalid @enderror">
                            @error($name) <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    @endforeach
                    <div class="mb-3">
                        <label class="form-label" for="keterangan">Keterangan</label>
                        <textarea id="keterangan" name="keterangan" rows="3"
                                  class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan') }}</textarea>
                        @error('keterangan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim Laporan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
