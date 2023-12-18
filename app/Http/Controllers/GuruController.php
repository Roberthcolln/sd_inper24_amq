<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data Guru';
        $guru = DB::table('guru')
        ->orderByDesc('id_guru')
        ->get();
        return view('guru.index', compact('title', 'guru'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Tim';
        return view('guru.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_guru' => 'required',
            'facebook_guru' => 'required',
            'instagram_guru' => 'required',
            'jabatan_guru' => 'required',
            'foto_guru' => 'required',
        ]);
        $foto_guru = $request->file('foto_guru');
        $namafotoguru = 'guru'.date('Ymdhis').'.'.$request->file('foto_guru')->getClientOriginalExtension();
        $foto_guru->move('file/guru/',$namafotoguru);
        
        $guru = new Guru();
        $guru->nama_guru = $request->nama_guru;
        $guru->jabatan_guru = $request->jabatan_guru;
        $guru->foto_guru = $namafotoguru;
        $guru->facebook_guru = $request->facebook_guru;
        $guru->instagram_guru = $request->instagram_guru;
        $guru->save();

        return redirect()->route('guru.index')->with('Sukses', 'Berhasil Tambah guru');
    }

    /**
     * Display the specified resource.
     */
    public function show(Guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guru $guru)
    {
        $title = 'Edit guru';
        return view('guru.edit', compact('guru', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guru $guru)
    {
        $namafotoguru = $guru->foto_guru;
        $update = [
            'nama_guru' => $request->nama_guru,
            'jabatan_guru' => $request->jabatan_guru,
            'foto_guru' => $namafotoguru,
            'facebook_guru' => $request->facebook_guru,
            'instagram_guru' => $request->instagram_guru,
        ];
        if ($request->foto_guru != ""){
            $request->foto_guru->move(public_path('file/guru/'), $namafotoguru);
        }   
        $guru->update($update);
        return redirect()->route('guru.index')->with('Sukses', 'Berhasil Update guru');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guru $guru)
    {
        $namafotoguru = $guru->foto_guru;
        $fotoguru = ('file/guru/').$namafotoguru;
        if(file_exists($fotoguru)){
            @unlink($fotoguru);
        }
        $guru->delete();
        return redirect()->back()->with('Sukses', 'Berhasil Hapus guru');
    }
}
