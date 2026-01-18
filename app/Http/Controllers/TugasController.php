<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tugas;
use App\Models\PengerjaanTugas;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tugas = Tugas::all();
        $totalBeban = $tugas->sum('bobot_persen');
        $statusBeban = ($totalBeban > 12) ? 'Overload' : 'Normal';
        return view('tugas.index', compact('tugas', 'totalBeban', 'statusBeban'));
    }

    public function pengerjaan()
    {
        $pengerjaan = \Illuminate\Support\Facades\DB::table('pengerjaan_tugas')
        ->join('mahasiswa', 'pengerjaan_tugas.id_mahasiswa', '=', 'mahasiswa.id_mahasiswa')
        ->join('tugas', 'pengerjaan_tugas.id_tugas', '=', 'tugas.id_tugas')
        ->select('pengerjaan_tugas.*', 'mahasiswa.nama_mahasiswa', 'tugas.judul_tugas')
        ->get();
        $mahasiswa = DB::table('mahasiswa')->get();
        $all_tugas = Tugas::all();
        return view('tugas.pengerjaan', compact('pengerjaan','mahasiswa','all_tugas'));
    }

    public function laporan()
    {
        $laporan = DB::table('mahasiswa')
        ->leftJoin('pengerjaan_tugas', 'mahasiswa.id_mahasiswa', '=', 'pengerjaan_tugas.id_mahasiswa')
        ->leftJoin('tugas', 'pengerjaan_tugas.id_tugas', '=', 'tugas.id_tugas')
        ->select(
            'mahasiswa.nama_mahasiswa',
            DB::raw('count(pengerjaan_tugas.id_pengerjaan) as jumlah_tugas'),
            DB::raw('sum(tugas.bobot_persen) as total_beban')
        )
        ->groupBy('mahasiswa.id_mahasiswa', 'mahasiswa.nama_mahasiswa')
        ->get();

    return view('tugas.laporan', compact('laporan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $matakuliah = DB::table('matakuliah')->get();
        return view('tugas.create', compact('matakuliah'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $validated = $request->validate([
        'id_matakuliah'     => 'required|exists:matakuliah,id_matakuliah',
        'judul_tugas'       => 'required|string|max:150',
        'deskripsi'         => 'nullable|string',
        'tipe_tugas'        => 'required|in:individu,kelompok',
        'tingkat_kesulitan' => 'required|in:ringan,sedang,berat',
        'bobot_persen'      => 'required|numeric|min:0|max:100',
        'deadline'          => 'required|date',
     ]);

    \App\Models\Tugas::create([
        'id_matakuliah'     => $request->id_matakuliah,
        'judul_tugas'       => $request->judul_tugas,
        'deskripsi'         => $request->deskripsi,
        'tipe_tugas'        => $request->tipe_tugas,
        'tingkat_kesulitan' => $request->tingkat_kesulitan,
        'bobot_persen'      => $request->bobot_persen,
        'tanggal_diberikan' => now(), 
        'deadline'          => $request->deadline,
    ]);
        return redirect()->route('tugas.index')->with('success', 'Tugas berhasil dibuat!');
    }
    public function storePengerjaan(Request $request)
    {
        $request->validate([
            'id_mahasiswa' => 'required',
            'id_tugas'     => 'required',
            'nilai'        => 'required|numeric',
        ]);

        \App\Models\PengerjaanTugas::create([
            'id_mahasiswa' => $request->id_mahasiswa, // Pastikan variabel ini tidak null
            'id_tugas'     => $request->id_tugas,
            'nilai'        => $request->nilai,
            'status'       => 'selesai',
        ]);
        return back()->with('success', 'Nilai berhasil disimpan!');
    }

    public function edit(string $id)
    {
        $tugas = Tugas::where('id_tugas', $id)->firstOrFail();
        $matakuliah = DB::table('matakuliah')->get();
        return view('tugas.edit', compact('tugas', 'matakuliah'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_matakuliah'     => 'required',
            'judul_tugas'       => 'required|max:150',
            'bobot_persen'      => 'required|numeric',
            'deadline'          => 'required|date',
        ]);
        $tugas = Tugas::where('id_tugas', $id)->firstOrFail();
        $tugas->update([
            'id_matakuliah'     => $request->id_matakuliah,
            'judul_tugas'       => $request->judul_tugas,
            'deskripsi'         => $request->deskripsi,
            'tipe_tugas'        => $request->tipe_tugas,
            'tingkat_kesulitan' => $request->tingkat_kesulitan,
            'bobot_persen'      => $request->bobot_persen,
            'deadline'          => $request->deadline,
        ]);

        return redirect()->route('tugas.index')->with('success', 'Tugas berhasil diperbarui!');   
    }

    public function updateNilai(Request $request, $id)
    {
        $data = PengerjaanTugas::where('id_pengerjaan', $id)->firstOrFail();
        $data->update(['nilai' => $request->nilai]);
        return back()->with('success', 'Nilai berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
