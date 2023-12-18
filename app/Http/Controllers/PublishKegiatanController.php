<?php

namespace App\Http\Controllers;

use App\Models\PublishKegiatan;
use Illuminate\Http\Request;

class PublishKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publish_kegiatan = DB::table('publish_kegiatan')
        ->orderByDesc('id_publish_kegiatan')
        ->get();
        $title = 'Data Status Kegiatan';
        return view('publish_kegiatan.index', compact('title', 'publish_kegiatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Status Kegiatan';
        return view('publish_kegiatan.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_publish_kegiatan' => 'required'
        ]);
        PublishKegiatan::create($request->all());
        return redirect()->route('publish_kegiatan.index')->with('Sukses', 'Berhasil Tambah Status Kegiatan');
    }

    /**
     * Display the specified resource.
     */
    public function show(PublishKegiatan $PublishKegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PublishKegiatan $PublishKegiatan)
    {
        $title = 'Edit Status Kehgiatan';
        $publish_kegiatan = DB::table('publish_kegiatan')->where('id_publish_kegiatan', $id)->first();  
        return view('publish_kegiatan.edit', compact('publish_kegiatan', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PublishKegiatan $PublishKegiatan)
    {
        $publish_kegiatan = PublishKegiatan::findorfail($id);
        $update = [
            'nama_publish_kegiatan' => $request->nama_publish_kegiatan
        ];
        $publish_kegiatan->update($update);
        return redirect()->route('publish_kegiatan.index')->with('Sukses', 'Berhasil Edit Status Kegiatan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PublishKegiatan $PublishKegiatan)
    {
        $publish_kegiatan->delete();
        return redirect()->back()->with('Sukses', 'Berhasil Hapus Data Status Kegiatan');
    }
}
