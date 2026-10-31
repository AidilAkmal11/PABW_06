<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    // Publik: form pelaporan warga
    public function create()
    {
        return view('laporan.create');
    }

    // Publik: simpan laporan warga
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_pelapor' => ['required', 'string', 'max:100'],
            'no_hp'        => ['required', 'string', 'max:20'],
            'lokasi'       => ['required', 'string', 'max:255'],
            'kecamatan'    => ['required', 'string', 'max:100'],
            'tinggi_air'   => ['required', 'integer', 'min:1', 'max:500'],
            'keterangan'   => ['nullable', 'string'],
        ]);

        Laporan::create($data);

        return redirect()->route('laporan.create')
            ->with('success', 'Laporan berhasil dikirim. Terima kasih atas kepedulian Anda.');
    }

    // Terproteksi: daftar laporan (hanya petugas)
    public function index()
    {
        $laporans = Laporan::latest()->paginate(10);
        return view('laporan.index', compact('laporans'));
    }

    // Terproteksi: hapus laporan
    public function destroy(Laporan $laporan)
    {
        $laporan->delete();
        return back()->with('success', 'Laporan berhasil dihapus.');
    }
}
