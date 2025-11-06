<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsenController extends Controller
{
    public function index()
    {
        // Ambil 5 absensi terakhir
        $last5Absen = Absen::with('karyawan.departemen', 'karyawan.plant')
            ->orderBy('tanggal_masuk', 'desc')
            ->limit(5)
            ->get();

        return view('absen.index', compact('last5Absen'));
    }

    public function check(Request $request)
    {
        $request->validate([
            'nik' => 'required|string',
        ]);

        // Cari karyawan berdasarkan NIK
        $karyawan = Karyawan::where('nik', $request->nik)
            ->with('departemen', 'plant')
            ->first();

        if (!$karyawan) {
            return redirect()->back()
                ->with('error_nik', true)
                ->with('error_message', 'NIK tidak ditemukan!');
        }

        // Cek apakah sudah pernah absen hari ini
        $today = now()->startOfDay();
        $todayAbsen = Absen::where('id_karyawan', $karyawan->id)
            ->whereDate('tanggal_masuk', $today)
            ->with('karyawan.departemen', 'karyawan.plant')
            ->first();

        if ($todayAbsen) {
            return redirect()->back()
                ->with('already_absen', true)
                ->with('absen_data', [
                    'nama' => $todayAbsen->karyawan->nama_lengkap,
                    'jabatan' => $todayAbsen->karyawan->jabatan ?? '-',
                    'jam_masuk' => $todayAbsen->tanggal_masuk->format('H:i:s'),
                    'tanggal' => $todayAbsen->tanggal_masuk->format('d/m/Y'),
                    'nik' => $request->nik
                ]);
        }

        // Simpan absen baru
        $newAbsen = Absen::create([
            'id_karyawan' => $karyawan->id,
            'tanggal_masuk' => now(),
            'nomor_tiket' => $request->nik, // Simpan NIK sebagai nomor_tiket untuk referensi
        ]);

        // Load relasi
        $newAbsen->load('karyawan.departemen', 'karyawan.plant');

        return redirect()->back()
            ->with('success_absen', true)
            ->with('absen_data', [
                'nama' => $newAbsen->karyawan->nama_lengkap,
                'jabatan' => $newAbsen->karyawan->jabatan ?? '-',
                'jam_masuk' => $newAbsen->tanggal_masuk->format('H:i:s'),
                'tanggal' => $newAbsen->tanggal_masuk->format('d/m/Y'),
                'nik' => $request->nik
            ]);
    }
}

