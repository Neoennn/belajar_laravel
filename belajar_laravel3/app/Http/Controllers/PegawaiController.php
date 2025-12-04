<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    public function index()
    {
        // mengambil data pegawai dengan pagination (lebih aman)
        $pegawai = Pegawai::paginate(10);

        // kirim ke view
        return view('pegawai', compact('pegawai'));
    }

    public function tambah()
    {
        return view('tambah');
    }

    public function store(Request $request)
    {
        Pegawai::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat
        ]);

        return redirect('/pegawai');
    }

    public function edit($id)
    {
        $pegawai = Pegawai::find($id);
        return view('edit', compact('pegawai'));
    }

    public function update(Request $request)
    {
        Pegawai::where('id', $request->id)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat
        ]);

        return redirect('/pegawai');
    }

    public function hapus($id)
    {
        Pegawai::destroy($id);
        return redirect('/pegawai');
    }
}
