<?php

namespace App\Http\Controllers;

use App\Models\Iventaris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class IventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data Iventaris';
        $iventaris = DB::table('iventaris')->orderByDesc('id_iventaris')->get();
        return view('iventaris.index', compact('iventaris', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah iventaris';
        return view('iventaris.create', compact('title'));
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
            'nama_iventaris' => 'required',
            'jumlah_iventaris' => 'required',
            'kondisi_iventaris' => 'required',
            'gambar_iventaris' => 'required',
        ],$messages);
        $gambar_iventaris = $request->file('gambar_iventaris');
        $namagambariventaris = 'iventaris'.date('Ymdhis').'.'.$request->file('gambar_iventaris')->getClientOriginalExtension();
        $gambar_iventaris->move('file/iventaris/',$namagambariventaris);

        $data = new Iventaris();
        $data->nama_iventaris = $request->nama_iventaris;
        $data->gambar_iventaris = $namagambariventaris;
        $data->jumlah_iventaris = $request->jumlah_iventaris;
        $data->kondisi_iventaris = $request->kondisi_iventaris;
        $data->slug_iventaris = Str::slug($request->nama_iventaris); 
        $data->save();
        return redirect()->route('iventaris.index')->with('Sukses', 'Berhasil Tambah iventaris');
    }

    /**
     * Display the specified resource.
     */
    public function show(Layanan $layanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $iventaris = Iventaris::find($id);
        $title = 'Edit iventaris';
        return view('iventaris.edit', compact('iventaris', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $iventaris = Iventaris::find($id);
        $namagambariventaris = $iventaris->gambar_iventaris;
        $update = [
            'nama_iventaris' => $request->nama_iventaris,
            'gambar_iventaris' => $namagambariventaris,
            'jumlah_iventaris' => $request->jumlah_iventaris,
            'kondisi_iventaris' => $request->kondisi_iventaris,
            'slug_iventaris' => Str::slug($request->nama_iventaris),
        ];
        if ($request->gambar_iventaris != ""){
            $request->gambar_iventaris->move(public_path('file/iventaris/'), $namagambariventaris);
        }   
        $iventaris->update($update);
        return redirect()->route('iventaris.index')->with('Sukses', 'Berhasil Edit Iventaris');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $iventaris = Iventaris::find($id);
        $namagambariventaris = $iventaris->gambar_iventaris;
        $gambar_iventaris =public_path ('file/iventaris/').$namagambariventaris;
        if(file_exists($gambar_iventaris)){
            @unlink($gambar_iventaris);
        }
        $iventaris->delete();
        return redirect()->back()->with('Sukses', 'Berhasil Hapus iventaris');
    }
}
