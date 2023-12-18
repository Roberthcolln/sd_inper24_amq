<?php

namespace App\Http\Controllers;

use App\Models\StatusKegiatan;
use Illuminate\Http\Request;

class StatusKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $status_kegiatan = DB::table('status_kegiatan')
        ->orderByDesc('id_status_kegiatan')
        ->get();
        $title = 'Data Status Kegiatan';
        return view('status_kegiatan.index', compact('title', 'status_kegiatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Status Kegiatan';
        return view('status_kegiatan.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_status_kegiatan' => 'required'
        ]);
        StatusKegiatan::create($request->all());
        return redirect()->route('status_kegiatan.index')->with('Sukses', 'Berhasil Tambah Status Kegiatan');
    }

    /**
     * Display the specified resource.
     */
    public function show(StatusKegiatan $statusKegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StatusKegiatan $statusKegiatan)
    {
        $title = 'Edit Status Kehgiatan';
        $status_kegiatan = DB::table('status_kegiatan')->where('id_status_kegiatan', $id)->first();  
        return view('status_kegiatan.edit', compact('status_kegiatan', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StatusKegiatan $statusKegiatan)
    {
        $status_kegiatan = StatusKegiatan::findorfail($id);
        $update = [
            'nama_status_kegiatan' => $request->nama_status_kegiatan
        ];
        $status_kegiatan->update($update);
        return redirect()->route('status_kegiatan.index')->with('Sukses', 'Berhasil Edit Status Kegiatan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StatusKegiatan $statusKegiatan)
    {
        $status_kegiatan->delete();
        return redirect()->back()->with('Sukses', 'Berhasil Hapus Data Status Kegiatan');
    }
}
