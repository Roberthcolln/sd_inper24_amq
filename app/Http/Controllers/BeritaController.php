<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;


class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Berita';
        $berita = DB::table('berita')->orderByDesc('id_berita')->get();
        return view('berita.index', compact('title', 'berita'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Berita';
        return view('berita.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $message = [
            'required' => ':attribute wajib diisi!!!',
        ];

        $request->validate([
            'judul_berita' => 'required',
            'isi_berita' => 'required',
            'tanggal_berita' => 'required',
            'gambar_berita' => 'required: jpg, jpeg, png, tfif, jfif, raw, gif, ai, psd',
        ], $message);
        $gambar_berita = $request->file('gambar_berita');
        $namagambarberita = 'Berita'.date('Ymdhis').'.'.$request->file('gambar_berita')->getClientOriginalExtension();
        $gambar_berita->move('file/berita/',$namagambarberita);

        $berita = new Berita();
        $berita->judul_berita = $request->judul_berita;
        $berita->isi_berita = $request->isi_berita;
        $berita->gambar_berita = $namagambarberita;
        $berita->tanggal_berita =$request->tanggal_berita;
        $berita->slug_berita = Str::slug($request->judul_berita); 
        // $berita->tanggal_berita = Carbon::now();
        $berita->save();
        return redirect()->route('berita.index')->with('Sukses', 'Berhasil Tambah Berita');
    }

    /**
     * Display the specified resource.
     */
    public function show(Berita $berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $berita = Berita::find($id);
        $title = 'Edit Berita';
        return view('berita.edit', compact('title', 'berita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $berita = Berita::findorfail($id);
        $namagambarberita = $berita->gambar_berita;
        $update = [
            'judul_berita' => $request->judul_berita, 
            'isi_berita' => $request->isi_berita, 
            'gambar_berita' => $namagambarberita,
            'tanggal_berita' => $request->tanggal_berita,
            'slug_berita' => $berita->slug_berita,  
        ];
        if ($request->gambar_berita != ""){
            $request->gambar_berita->move('file/berita/', $namagambarberita);
        }   
        $berita->update($update);
        return redirect()->route('berita.index')->with('Sukses', 'Berhasil Edit Berita');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $berita = Berita::find($id);
        $namafileberita = $berita->gambar_berita;
        $file_berita = ('file/berita/').$namafileberita;
        if(file_exists($file_berita)){
            @unlink($file_berita);
        }
        $berita->delete();
        return redirect()->back()->with('Sukses', 'Berhasil Hapus Berita');
    }
}
