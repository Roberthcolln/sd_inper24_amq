<?php

namespace App\Http\Controllers;

use App\Models\KategoriKegiatan;
use App\Models\Kegiatan;
use App\Models\StatusKegiatan;
use App\Models\PublishKegiatan;
use App\Models\SubKategoriKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kegiatan = DB::table('kegiatan')
        ->join('kategori_kegiatan', 'kegiatan.id_kategori_kegiatan', 'kategori_kegiatan.id_kategori_kegiatan')
        ->join('sub_kategori_kegiatan', 'kegiatan.id_sub_kategori_kegiatan', 'sub_kategori_kegiatan.id_sub_kategori_kegiatan')
        ->join('status_kegiatan', 'kegiatan.id_status_kegiatan', 'status_kegiatan.id_status_kegiatan')
        ->join('publish_kegiatan', 'kegiatan.id_publish_kegiatan', 'publish_kegiatan.id_publish_kegiatan')
        ->get();
        $title = 'Data Kegiatan';
        return view('kegiatan.index', compact('title', 'kegiatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kegiatan = Kegiatan::all();
        $kategori_kegiatan = KategoriKegiatan::all();
        $sub_kategori_kegiatan = SubKategoriKegiatan::all();
        $status_kegiatan = StatusKegiatan::all();
        $publish_kegiatan = PublishKegiatan::all();
        $title = 'Tambah Kegiatan';
        return view('kegiatan.create', compact('kategori_kegiatan', 'sub_kategori_kegiatan', 'kegiatan', 'status_kegiatan', 'publish_kegiatan', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_kategori_kegiatan' => 'required',
            'id_sub_kategori_kegiatan' => 'required',
            'nama_kegiatan' => 'required',
            'deskripsi_kegiatan' => 'required',
            'tempat_kegiatan' => 'required',
            'gambar_kegiatan' => 'required:jpg, jpeg, png, gif, raw, tiff',
            'tanggal_kegiatan' => 'required',
            'jam_kegiatan' =>'required',
            'id_status_kegiatan' =>'required',
            'id_publish_kegiatan' =>'required'
        ]);
        $file = $request->file('gambar_kegiatan');
        $namafile = 'Kegiatan'.date('Ymdhis').'.'.$request->file('gambar_kegiatan')->getClientOriginalExtension();
        $file->move('file/kegiatan/',$namafile);

        $kegiatan = new Kegiatan();
        $kegiatan->id_kategori_kegiatan = $request->id_kategori_kegiatan;
        $kegiatan->id_sub_kategori_kegiatan = $request->id_sub_kategori_kegiatan;
        $kegiatan->nama_kegiatan = $request->nama_kegiatan;
        $kegiatan->deskripsi_kegiatan = $request->deskripsi_kegiatan;
        $kegiatan->tempat_kegiatan = $request->tempat_kegiatan;
        $kegiatan->gambar_kegiatan = $namafile;
        $kegiatan->tanggal_kegiatan = $request->tanggal_kegiatan;
        $kegiatan->jam_kegiatan = $request->jam_kegiatan;
        $kegiatan->biaya_kegiatan = $request->biaya_kegiatan;
        $kegiatan->id_status_kegiatan = $request->id_status_kegiatan;
        $kegiatan->id_publish_kegiatan = $request->id_publish_kegiatan;
        $kegiatan->slug_kegiatan = Str::slug($request->nama_kegiatan);
        $kegiatan->save();
        return redirect()->route('kegiatan.index')->with('Sukses', 'Berhasil Tambah Kegiatan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kegiatan $kegiatan)
    {
        $kategori_kegiatan = KategoriKegiatan::all();
        $sub_kategori_kegiatan = SubKategoriKegiatan::all();
        $status_kegiatan = StatusKegiatan::all();
        $publish_kegiatan = PublishKegiatan::all();
        $title = 'Edit Kegiatan';
        return view('kegiatan.edit', compact('kategori_kegiatan', 'sub_kategori_kegiatan', 'title', 'status_kegiatan', 'publish_kegiatan', 'kegiatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kegiatan $kegiatan)
    {
        $namafile = $kegiatan->gambar_kegiatan;
        $update = [
            'id_kategori_kegiatan' => $request->id_kategori_kegiatan,
            'id_sub_kategori_kegiatan' => $request->id_sub_kategori_kegiatan,
            'nama_kegiatan' => $request->nama_kegiatan,
            'deskripsi_kegiatan' => $request->deskripsi_kegiatan,
            'tempat_kegiatan' => $request->tempat_kegiatan,
            'gambar_kegiatan' => $namafile,
            'tanggal_kegiatan' => $request->tanggal_kegiatan,
            'jam_kegiatan' => $request->jam_kegiatan,
            'biaya_kegiatan' => $request->biaya_kegiatan,
            'id_status_kegiatan' => $request->id_status_kegiatan,
            'id_publish_kegiatan' => $request->id_publish_kegiatan,
            'slug_kegiatan' => Str::slug($request->nama_kegiatan),
        ];
        if($request->gambar_kegiatan !=""){
            $request->gambar_kegiatan->move('file/kegiatan', $namafile); 
        }
        $kegiatan->update($update);
        return redirect()->route('kegiatan.index')->with('Sukses', 'Berhasil Edit Kegiatan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $hapus = Kegiatan::findorfail($id);
        $namafile = $hapus->gambar_kegiatan;
        $file = ('file/kegiatan/').$namafile;
        // cek file:
        if(file_exists($file)){
            @unlink($file);
        }
        // delete data dri database
        $hapus->delete();
        return redirect()->back()->with('Sukses', 'Berhasil Hapus Data Kegiatan');
    }
}
