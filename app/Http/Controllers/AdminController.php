<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // tampil data
    public function index()
    {
        $admin = Admin::all();
        return view('admin.index', compact('admin'));
    }

    // tampil form tambah
    public function create()
    {
        return view('admin.create');
    }

    // simpan data (route: /admin/save)
    public function store(Request $request)
    {
        $request->validate([
            'nama'     => 'required|string|max:50',
            'email'    => 'required|email|unique:admins',
            'password' => 'required|min:6',
        ]);

        Admin::create([
            'nama'     => $request->nama,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/admin')->with('status', 'Data admin berhasil ditambahkan');
    }

    // tampil form edit (route: /admin/{id}/edit)
    public function show($id)
    {
        $admin = Admin::find($id);
        return view('admin.edit', compact('admin'));
    }

    // update data (route: /admin/{id}/update)
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'  => 'required|string|max:50',
            'email' => 'required|email|unique:admins,email,' . $id . ',id_admin',
        ]);

        $admin = Admin::find($id);
        $admin->update([
            'nama'  => $request->nama,
            'email' => $request->email,
        ]);

        return redirect('/admin')->with('status', 'Data admin berhasil diedit');
    }

    // hapus data (route: /admin/{id}/delete)
    public function destroy($id)
    {
        $admin = Admin::find($id);
        $admin->delete();

        return redirect('/admin')->with('status', 'Data admin berhasil dihapus');
    }
}
