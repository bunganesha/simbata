<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use App\Models\Dosen;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function index()
    {
        $mataKuliah = MataKuliah::with('dosen')->get();
        return view('mata_kuliah.index', compact('mataKuliah'));
    }

    public function create()
    {
        $dosen = Dosen::all();
        return view('mata_kuliah.create', compact('dosen'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_matkul' => 'required|unique:mata_kuliah,kode_matkul',
            'nama_matkul' => 'required',
            'sks' => 'required|integer',
            'dosen_id' => 'required|exists:dosen,id',
        ]);

        MataKuliah::create($request->all());

        return redirect('/mata-kuliah');
    }

    // ====== EDIT ======
    public function edit($id)
    {
        $mataKuliah = MataKuliah::findOrFail($id);
        $dosen = Dosen::all();
        return view('mata_kuliah.edit', compact('mataKuliah', 'dosen'));
    }

    // ====== UPDATE ======
    public function update(Request $request, $id)
    {
        $mataKuliah = MataKuliah::findOrFail($id);

        $request->validate([
            'kode_matkul' => 'required|unique:mata_kuliah,kode_matkul,' . $id,
            'nama_matkul' => 'required',
            'sks' => 'required|integer',
            'dosen_id' => 'required|exists:dosen,id',
        ]);

        $mataKuliah->update($request->all());

        return redirect('/mata-kuliah');
    }

    // ====== DELETE ======
    public function destroy($id)
    {
        $mataKuliah = MataKuliah::findOrFail($id);
        $mataKuliah->delete();

        return redirect('/mata-kuliah');
    }
}
