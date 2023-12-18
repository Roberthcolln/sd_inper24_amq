<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data Galeri';
        $galeri = Galeri::all();
        return view('galeri.index', compact('galeri', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Galeri';
        return view('galeri.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_galeri' => 'required',
            'gambar_galeri' => 'required',
        ]);
        $gambar_galeri = $request->file('gambar_galeri');
        $namafilegaleri = 'Galeri'.date('Ymdhis').'.'.$request->file('gambar_galeri')->getClientOriginalExtension();
        $gambar_galeri->move('file/galeri/',$namafilegaleri);
        
        $galeri = new Galeri();
        $galeri->nama_galeri = $request->nama_galeri;
        $galeri->jenis_galeri = $request->jenis_galeri;
        $galeri->keterangan_galeri = $request->keterangan_galeri;
        $galeri->gambar_galeri = $namafilegaleri;
        $galeri->save();

        return redirect()->route('galeri.index')->with('Sukses', 'Berhasil Tambah Galeri');
    }

    /**
     * Display the specified resource.
     */
    public function show(Galeri $galeri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Galeri $galeri)
    {
        $title = 'Edit Galeri';
        return view('galeri.edit', compact('title', 'galeri'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Galeri $galeri)
    {
        $namafilegaleri = $galeri->gambar_galeri;
        $update = [
            'nama_galeri' => $request->nama_galeri,
            'gambar_galeri' => $namafilegaleri,
            'keterangan_galeri' => $request->keterangan_galeri,
            'jenis_galeri' => $request->jenis_galeri
        ];
        if ($request->gambar_galeri != ""){
            $request->gambar_galeri->move(public_path('file/galeri/'), $namafilegaleri);
        }   
        $galeri->update($update);
        return redirect()->route('galeri.index')->with('Sukses', 'Berhasil Edit Galeri');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Galeri $galeri)
    {
        $namafilegaleri = $galeri->gambar_galeri;
        $file_galeri = ('file/galeri/').$namafilegaleri;
        if(file_exists($file_galeri)){
            @unlink($file_galeri);
        }
        $galeri->delete();
        return redirect()->back()->with('Sukses', 'Berhasil Hapus Galeri');
    }
    public function storeImage(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
        
            $request->file('upload')->move(public_path('images'), $fileName);
   
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/'.$fileName); 
            $msg = 'Image uploaded successfully'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }
    }
}
