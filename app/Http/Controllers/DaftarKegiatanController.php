<?php

namespace App\Http\Controllers;

use App\Models\KategoriKegiatan;
use App\Models\DaftarKegiatan;
use App\Models\SubKategoriKegiatan;
use App\Models\Kegiatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class DaftarKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $daftar_kegiatan = DB::table('daftar_kegiatans')
            ->join('kegiatan', 'daftar_kegiatans.id_kegiatan', 'kegiatan.id_kegiatan')
            ->join('users', 'daftar_kegiatans.id', 'users.id')
            ->where('daftar_kegiatans.id_kegiatan', '=', $request->keyword)
            ->get();
        $select = DB::table('kegiatan')->get();
        $title = 'Data Pendaftaran Kegiatan';
        return view('daftar_kegiatan.index', compact('title', 'daftar_kegiatan', 'select'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kegiatan = Kegiatan::all();
        $user = User::all();
        $title = 'Tambah Daftar Kegiatan';
        return view('daftar_kegiatan.create', compact('kegiatan', 'user', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'id' => 'required|unique:daftar_kegiatans'
        //    ]);
        
        $data = new DaftarKegiatan();
        $data->id = Auth::user()->id;
        $data->id_kegiatan = $request->id_kegiatan;
        $data->save();
        return redirect()->back()->with('Sukses', 'Pendaftaran Anda Sukses !!');
    }

    /**
     * Display the specified resource.
     */
    public function show(DaftarKegiatan $daftar_kegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DaftarKegiatan $daftar_kegiatan)
    {

        $kegiatan = Kegiatan::all();
        $user = User::all();
        $title = 'Edit Daftar Kegiatan';
        return view('daftar_kegiatan.edit', compact('kegiatan', 'title', 'user', 'daftar_kegiatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DaftarKegiatan $daftar_kegiatan)
    {

        $update = [

            'id_kegiatan' => $request->id_kegiatan,
            'id' => $request->id,
            'tanggal_kegiatan' => $request->tanggal_kegiatan,
            'biaya_kegiatan' => $request->biaya_kegiatan,
        ];

        $daftar_kegiatan->update($update);
        return redirect()->route('daftar_kegiatan.index')->with('Sukses', 'Berhasil Edit Kegiatan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $hapus = DaftarKegiatan::findorfail($id);
        // delete data dri database
        $hapus->delete();
        return redirect()->back()->with('Sukses', 'Berhasil Batal Data Daftar Kegiatan');
    }
}
