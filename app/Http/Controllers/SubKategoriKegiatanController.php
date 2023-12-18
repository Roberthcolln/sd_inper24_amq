<?php

namespace App\Http\Controllers;

use App\Models\KategoriKegiatan;
use App\Models\SubKategoriKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubKategoriKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Sub Kategori Kegiatan';
        $sub_kategori_kegiatan = DB::table('sub_kategori_kegiatan')
        ->join('kategori_kegiatan', 'sub_kategori_kegiatan.id_kategori_kegiatan', 'kategori_kegiatan.id_kategori_kegiatan')
        ->orderBy('sub_kategori_kegiatan.id_kategori_kegiatan')
        ->get();
        return view('sub_kategori_kegiatan.index', compact('title', 'sub_kategori_kegiatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Sub Kategori Kegiatan';
        $kategori_kegiatan = KategoriKegiatan::all();
        return view('sub_kategori_kegiatan.create', compact('title', 'kategori_kegiatan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_kategori_kegiatan' =>'required',
            'nama_sub_kategori_kegiatan' => 'required'
        ]);
        SubKategoriKegiatan::create($request->all());
        return redirect()->route('sub_kategori_kegiatan.index')->with('Sukses', 'Berhasil Tambah Sub Kategori Kegiatan');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubKategoriKegiatan $sub_kategori_kegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubKategoriKegiatan $sub_kategori_kegiatan)
    {
        $title = 'Edit Sub Kategori Kegiatan';
        $kategori_kegiatan = KategoriKegiatan::all();
        return view('sub_kategori_kegiatan.edit',compact('title', 'sub_kategori_kegiatan', 'kategori_kegiatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubKategoriKegiatan $sub_kategori_kegiatan)
    {
        $update = [
            'id_kategori_kegiatan' => $request->id_kategori_kegiatan,
            'nama_sub_kategori_kegiatan' => $request->nama_sub_kategori_kegiatan
        ];
        $sub_kategori_kegiatan->update($update);
        return redirect()->route('sub_kategori_kegiatan.index')->with('Sukses', 'Berhasi; Edit Sub Kategori Kegiatan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubKategoriKegiatan $sub_kategori_kegiatan)
    {
        $sub_kategori_kegiatan->delete();
        return redirect()->back()->with('Sukses', 'Berhasil Hapus Sub Kategori Kegiatan');
    }
    public function fetchKegiatan(Request $request)
    {
        $data['sub_kategori_kegiatan'] = SubKategoriKegiatan::where("id_kategori_kegiatan",$request->id_kategori_kegiatan)->get(["nama_sub_kategori_kegiatan", "id_sub_kategori_kegiatan"]);
        return response()->json($data);
    }
}
