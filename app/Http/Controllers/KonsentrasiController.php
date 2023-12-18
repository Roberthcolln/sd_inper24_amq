<?php

namespace App\Http\Controllers;

use App\Models\Konsentrasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KonsentrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data Concern';
        $konsentrasi = DB::table('konsentrasi')->orderByDesc('id_konsentrasi')->get();
        return view('konsentrasi.index', compact('title', 'konsentrasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Concern';
        return view('konsentrasi.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi!!!',
        ];
        $request->validate([
            'judul_konsentrasi' => 'required',
            'deskripsi_konsentrasi' => 'required',
            'gambar_konsentrasi' => 'required',
        ],$messages);
        $gambar_konsentrasi = $request->file('gambar_konsentrasi');
        $namagambarkonsentrasi = 'Concern'.date('Ymdhis').'.'.$request->file('gambar_konsentrasi')->getClientOriginalExtension();
        $gambar_konsentrasi->move('file/konsentrasi/',$namagambarkonsentrasi);

        $data = new Konsentrasi();
        $data->judul_konsentrasi = $request->judul_konsentrasi;
        $data->deskripsi_konsentrasi = $request->deskripsi_konsentrasi;
        $data->gambar_konsentrasi = $namagambarkonsentrasi;
        $data->save();
        return redirect()->route('konsentrasi.index')->with('Sukses', 'Berhasil Tambah Konsentrasi');

    }

    /**
     * Display the specified resource.
     */
    public function show(Konsentrasi $konsentrasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Konsentrasi $konsentrasi)
    {
        $title = 'Edit Concern';
        return view('konsentrasi.edit', compact('konsentrasi', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Konsentrasi $konsentrasi)
    {
        $namagambarkonsentrasi = $konsentrasi->gambar_konsentrasi;
        $update = [
            'judul_konsentrasi' => $request->judul_konsentrasi,
            'deskripsi_konsentrasi' => $request->deskripsi_konsentrasi,
            'gambar_konsentrasi' => $namagambarkonsentrasi,
        ];
        if ($request->gambar_konsentrasi != ""){
            $request->gambar_konsentrasi->move(public_path('file/konsentrasi/'), $namagambarkonsentrasi);
        }   
        $konsentrasi->update($update);
        return redirect()->route('konsentrasi.index')->with('Sukses', 'Berhasil Update Konsentrasi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Konsentrasi $konsentrasi)
    {
        $namagambarkonsentrasi = $konsentrasi->gambar_konsentrasi;
        $gambar_konsentrasi = ('file/konsentrasi/').$namagambarkonsentrasi;
        if(file_exists($gambar_konsentrasi)){
            @unlink($gambar_konsentrasi);
        }
        $konsentrasi->delete();
        return redirect()->back()->with('Sukses', 'Berhasil Hapus Unit Bisnis');
    }
}
