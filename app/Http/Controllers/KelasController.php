<?php

namespace App\Http\Controllers;


use App\Models\Kelas;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = DB::table('kelas')
            ->join('guru', 'kelas.id_guru', 'guru.id_guru')
            ->get();
        $title = 'Data Kelas';
        return view('kelas.index', compact('title', 'kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::all();
        $guru = Guru::all();
        $title = 'Tambah Kelas';
        return view('kelas.create', compact('guru', 'kelas', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required',
            'deskripsi_kelas' => 'required',
            'id_guru' => 'required',
            'jumlah_siswa' => 'required',
            'gambar_kelas' => 'required:jpg, jpeg, png, gif, raw, tiff',


        ]);
        $file = $request->file('gambar_kelas');
        $namafile = 'kelas' . date('Ymdhis') . '.' . $request->file('gambar_kelas')->getClientOriginalExtension();
        $file->move('file/kelas/', $namafile);

        $kelas = new Kelas();
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->deskripsi_kelas = $request->deskripsi_kelas;
        $kelas->id_guru = $request->id_guru;
        $kelas->gambar_kelas = $namafile;
        $kelas->jumlah_siswa = $request->jumlah_siswa;
        $kelas->slug_kelas = Str::slug($request->nama_kelas);
        $kelas->save();
        return redirect()->route('kelas.index')->with('Sukses', 'Berhasil Tambah Kelas');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $kelas = Kelas::find($id);
        $guru = Guru::all();
        $title = 'Edit Kelas';
        return view('kelas.edit', compact('kelas','guru', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $kelas = Kelas::find($id);
        $namafile = $kelas->gambar_kelas;
        $update = [
            'nama_kelas' => $request->nama_kelas,
            'deskripsi_kelas' => $request->deskripsi_kelas,
            'id_guru' => $request->id_guru,
            'gambar_kelas' => $namafile,
            'jumlah_siswa' => $request->jumlah_siswa,
            'slug_kelas' => Str::slug($request->nama_kelas),
        ];
        if ($request->gambar_kelas != "") {
            $request->gambar_kelas->move('file/kelas', $namafile);
        }
        $kelas->update($update);
        return redirect()->route('kelas.index')->with('Sukses', 'Berhasil Edit Kelas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $hapus = Kelas::findorfail($id);
        $namafile = $hapus->gambar_kelas;
        $file = ('file/kelas/') . $namafile;
        // cek file:
        if (file_exists($file)) {
            @unlink($file);
        }
        // delete data dri database
        $hapus->delete();
        return redirect()->back()->with('Sukses', 'Berhasil Hapus Data Kelas');
    }
}
