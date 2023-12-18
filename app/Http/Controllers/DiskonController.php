<?php

namespace App\Http\Controllers;

use App\Models\Diskon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DiskonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data Diskon';
        $diskon = DB::table('diskon')->orderByDesc('id_diskon')->get();
        return view('diskon.index', compact('diskon', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Diskon';
        return view('diskon.create', compact('title'));
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
            'nama_diskon' => 'required',
            'gambar_diskon' => 'required',
            'keterangan_diskon' => 'required',
        ],$messages);
        $gambar_diskon = $request->file('gambar_diskon');
        $namagambardiskon = 'diskon'.date('Ymdhis').'.'.$request->file('gambar_diskon')->getClientOriginalExtension();
        $gambar_diskon->move('file/diskon/',$namagambardiskon);

        $data = new Diskon();
        $data->nama_diskon = $request->nama_diskon;
        $data->gambar_diskon = $namagambardiskon;
        $data->keterangan_diskon = $request->keterangan_diskon;
        $data->slug_diskon = Str::slug($request->nama_diskon); 
        $data->save();
        return redirect()->route('diskon.index')->with('Sukses', 'Berhasil Tambah Diskon');
    }

    /**
     * Display the specified resource.
     */
    public function show(Diskon $diskon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $diskon = Diskon::find($id);
        $title = 'Edit Diskon';
        return view('diskon.edit', compact('diskon', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $diskon = Diskon::find($id);
        $namagambardiskon = $diskon->gambar_diskon;
        $update = [
            'nama_diskon' => $request->nama_diskon,
            'gambar_diskon' => $namagambardiskon,
            'keterangan_diskon' => $request->keterangan_diskon,
            'slug_diskon' => Str::slug($request->nama_diskon),
        ];
        if ($request->gambar_diskon != ""){
            $request->gambar_diskon->move(public_path('file/diskon/'), $namagambardiskon);
        }   
        $diskon->update($update);
        return redirect()->route('diskon.index')->with('Sukses', 'Berhasil Edit Laanan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $diskon = Diskon::find($id);
        $namagambardiskon = $diskon->gambar_diskon;
        $gambar_diskon =public_path ('file/diskon/').$namagambardiskon;
        if(file_exists($gambar_diskon)){
            @unlink($gambar_diskon);
        }
        $diskon->delete();
        return redirect()->back()->with('Sukses', 'Berhasil Hapus Diskon');
    }
}
