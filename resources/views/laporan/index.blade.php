@extends('layouts.app')
@section('title', 'Daftar Laporan')

@section('content')
<h4 class="mb-3">Daftar Laporan Banjir</h4>
<div class="card shadow-sm">
    <div class="table-responsive">
        <table class="table table-striped align-middle mb-0">
            <thead class="table-primary">
                <tr>
                    <th>#</th><th>Pelapor</th><th>No. HP</th><th>Lokasi</th>
                    <th>Kecamatan</th><th>Tinggi Air</th><th>Waktu</th><th></th>
                </tr>
            </thead>
            <tbody>
            @forelse ($laporans as $l)
                <tr>
                    <td>{{ $laporans->firstItem() + $loop->index }}</td>
                    <td>{{ $l->nama_pelapor }}</td>
                    <td>{{ $l->no_hp }}</td>
                    <td>{{ $l->lokasi }}</td>
                    <td>{{ $l->kecamatan }}</td>
                    <td>{{ $l->tinggi_air }} cm</td>
                    <td>{{ $l->created_at->diffForHumans() }}</td>
                    <td>
                        <form action="{{ route('laporan.destroy', $l) }}" method="POST"
                              onsubmit="return confirm('Hapus laporan ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="8" class="text-center text-muted py-4">Belum ada laporan.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="mt-3">{{ $laporans->links('pagination::bootstrap-5') }}</div>
@endsection
