<?php

namespace App\Http\Controllers;

use App\Models\Visi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Visi';
        $visi = DB::table('visi')->orderByDesc('id_visi')->get();
        return view('visi.index', compact('title', 'visi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Visi';
        return view('visi.create', compact('title'));
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
            'judul_visi' => 'required',
            'deskripsi_visi' => 'required',
            'gambar_visi' => 'required',
        ],$messages);
        $gambar_visi = $request->file('gambar_visi');
        $namagambarvisi = 'Visi'.date('Ymdhis').'.'.$request->file('gambar_visi')->getClientOriginalExtension();
        $gambar_visi->move('file/visi/',$namagambarvisi);

        $data = new Visi();
        $data->judul_visi = $request->judul_visi;
        $data->deskripsi_visi = $request->deskripsi_visi;
        $data->gambar_visi = $namagambarvisi;
        $data->save();
        return redirect()->route('visi.index')->with('Sukses', 'Berhasil Tambah Visi');
    }

    /**
     * Display the specified resource.
     */
    public function show(Visi $visi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Visi $visi)
    {
        $title = 'Edit Visi';
        return view('visi.edit',compact('visi', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Visi $visi)
    {
        $namagambarvisi = $visi->gambar_visi;
        $update = [
            'judul_visi' => $request->judul_visi,
            'deskripsi_visi' => $request->deskripsi_visi,
            'gambar_visi' => $namagambarvisi,
        ];
        if ($request->gambar_visi != ""){
            $request->gambar_visi->move(public_path('file/visi/'), $namagambarvisi);
        }   
        $visi->update($update);
        return redirect()->route('visi.index')->with('Sukses', 'Berhasil Update Visi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visi $visi)
    {
        $namagambarvisi = $visi->gambar_visi;
        $gambar_visi = ('file/visi/').$namagambarvisi;
        if(file_exists($gambar_visi)){
            @unlink($gambar_visi);
        }
        $visi->delete();
        return redirect()->back()->with('Sukses', 'Berhasil Hapus Visi');
    }
}
