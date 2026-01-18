<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\MataKuliah;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class KrsController extends Controller
{
    // ================== INDEX ==================
    public function index()
    {
        $krs = Krs::with(['mataKuliah', 'mahasiswa'])->get();
        return view('krs.index', compact('krs'));
    }

    // ================== CREATE ==================
    public function create()
    {
        $mataKuliah = MataKuliah::all();
        $mahasiswa  = Mahasiswa::all();

        return view('krs.create', compact('mataKuliah', 'mahasiswa'));
    }

    // ================== STORE ==================
    public function store(Request $request)
    {
        $request->validate([
            'mahasiswa_id'   => 'required|exists:mahasiswa,id',
            'mata_kuliah_id' => 'required|exists:mata_kuliah,id',
        ]);

        // CEGAH DOBEL KRS
        $exists = Krs::where('mahasiswa_id', $request->mahasiswa_id)
            ->where('mata_kuliah_id', $request->mata_kuliah_id)
            ->exists();

        if ($exists) {
            return back()->with('error', 'Mata kuliah sudah diambil!');
        }

        Krs::create($request->all());

        return redirect('/krs')->with('success', 'KRS berhasil ditambahkan');
    }

    // ================== EDIT ==================
    public function edit($id)
    {
        $krs = Krs::findOrFail($id);
        $mataKuliah = MataKuliah::all();
        $mahasiswa  = Mahasiswa::all();

        return view('krs.edit', compact('krs', 'mataKuliah', 'mahasiswa'));
    }

    // ================== UPDATE ==================
    public function update(Request $request, $id)
    {
        $krs = Krs::findOrFail($id);

        $request->validate([
            'mahasiswa_id'   => 'required|exists:mahasiswa,id',
            'mata_kuliah_id' => 'required|exists:mata_kuliah,id',
        ]);

        // CEGAH DOBEL SAAT UPDATE
        $exists = Krs::where('mahasiswa_id', $request->mahasiswa_id)
            ->where('mata_kuliah_id', $request->mata_kuliah_id)
            ->where('id', '!=', $id)
            ->exists();

        if ($exists) {
            return back()->with('error', 'Mata kuliah sudah diambil!');
        }

        $krs->update($request->all());

        return redirect('/krs')->with('success', 'KRS berhasil diupdate');
    }

    // ================== DELETE ==================
    public function destroy($id)
    {
        $krs = Krs::findOrFail($id);
        $krs->delete();

        return redirect('/krs')->with('success', 'KRS berhasil dihapus');
    }
}
