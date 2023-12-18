<?php

namespace App\Http\Controllers;

use App\Models\KategoriKegiatan;
use Illuminate\Http\Request;

class KategoriKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data Kategori Kegiatan';
        $kategori_kegiatan = KategoriKegiatan::all();
        return view('kategori_kegiatan.index', compact('kategori_kegiatan', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Kategori Kegiatan';
        return view('kategori_kegiatan.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori_kegiatan' => 'required'
        ]);
        KategoriKegiatan::create($request->all());
        return redirect()->route('kategori_kegiatan.index')->with('Sukses', 'Berhasil Menambahkan Kategori Kegiatan Baru');
    }

    /**
     * Display the specified resource.
     */
    public function show(KategoriKegiatan $kategoriKegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KategoriKegiatan $kategori_kegiatan)
    {
        $title = 'Edit Kategori Kegiatan';
        return view('kategori_kegiatan.edit', compact('kategori_kegiatan', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KategoriKegiatan $kategori_kegiatan)
    {
        $update = [
            'nama_kategori_kegiatan' => $request->nama_kategori_kegiatan
        ];
        $kategori_kegiatan->update($update);
        return redirect()->route('kategori_kegiatan.index')->with('Sukses', 'Berhasil Edit Kategori Kegiatan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KategoriKegiatan $kategori_kegiatan)
    {
        $kategori_kegiatan->delete();
        return redirect()->back()->with('Sukses', 'Berhasil Hapus Kategori Kegiatan');
    }
}
