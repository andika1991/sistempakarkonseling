<?php

namespace App\Http\Controllers;

use App\Models\DaftarKonsultasi;
use Illuminate\Http\Request;
class DaftarKonsultasiController extends Controller
{
    /**
     * Menampilkan daftar konsultasi.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Ambil parameter pencarian dan filter
        $search = $request->input('search');
        $filterKelas = $request->input('kelas');

        // Query data berdasarkan pencarian dan filter
        $query = DaftarKonsultasi::with('solution');

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        if ($filterKelas) {
            $query->where('class', $filterKelas);
        }

        $daftarKonsultasi = $query->get();

        // Kirim data ke view
        return view('daftarkonsultasi', [
            'daftarKonsultasi' => $daftarKonsultasi,
            'kelasList' => DaftarKonsultasi::distinct()->pluck('class'), // List semua kelas untuk filter
        ]);
    }

    public function destroy($id)
    {
 
        $konsultasi = DaftarKonsultasi::find($id);

        
        if (!$konsultasi) {
            return redirect()->route('daftarkonsultasi')->with('error', __('Data konsultasi tidak ditemukan.'));
        }

       
        $konsultasi->delete();


        return redirect()->route('daftarkonsultasi')->with('success', __('Data konsultasi berhasil dihapus.'));
    }
}
