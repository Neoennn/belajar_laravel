<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;

class GuruController extends Controller
{
    // Tampil daftar guru + pagination
    public function index()
    {
        $guru = Guru::paginate(10);
        return view('guru', compact('guru'));
    }

    // Form tambah guru
    public function tambah()
    {
        return view('guru.tambah');
    }

    // Proses tambah guru
    public function store(Request $request)
    {
        Guru::create([
            'nama'   => $request->nama,
            'alamat' => $request->alamat
        ]);

        return redirect('/guru')->with('success', 'Data berhasil ditambahkan');
    }

    // Form edit guru
    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        return view('guru.edit', compact('guru'));
    }

    // Proses update data guru
    public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);

        $guru->update([
            'nama'   => $request->nama,
            'alamat' => $request->alamat
        ]);

        return redirect('/guru')->with('success', 'Data berhasil diperbarui');
    }

    // Hapus guru
    public function hapus($id)
    {
        Guru::destroy($id);
        return redirect('/guru')->with('success', 'Data berhasil dihapus');
    }

    public function trash()
    {
    	// mengampil data guru yang sudah dihapus
    	$guru = Guru::onlyTrashed()->get();
    	return view('guru_trash', ['guru' => $guru]);
    }

    public function kembalikan($id)
    {
    	$guru = Guru::onlyTrashed()->where('id',$id);
    	$guru->restore();
    	return redirect('/guru/trash');
    }
}
