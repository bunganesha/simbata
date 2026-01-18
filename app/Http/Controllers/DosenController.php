<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    // menampilkan data dosen
    public function index()
    {
        $dosen = Dosen::all();
        return view('dosen.index', compact('dosen'));
    }

    // form tambah dosen
    public function create()
    {
        return view('dosen.create');
    }

    // simpan data dosen
    public function store(Request $request)
    {
        $request->validate([
            'nidn' => 'required|unique:dosen,nidn',
            'nama_dosen' => 'required',
            'email' => 'required|email|unique:dosen,email',
        ]);

        Dosen::create($request->all());

        return redirect('/dosen');
    }

    // form edit dosen
    public function edit($id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('dosen.edit', compact('dosen'));
    }

    // update data dosen
    public function update(Request $request, $id)
    {
        $dosen = Dosen::findOrFail($id);

        $request->validate([
            'nidn' => 'required|unique:dosen,nidn,' . $id,
            'nama_dosen' => 'required',
            'email' => 'required|email|unique:dosen,email,' . $id,
        ]);

        $dosen->update($request->all());

        return redirect('/dosen');
    }

    // hapus data dosen
    public function destroy($id)
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->delete();

        return redirect('/dosen');
    }
}
