<?php

namespace App\Http\Controllers;


use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = DB::table('siswa')
        ->join('kelas', 'siswa.id_kelas', 'kelas.id_kelas')
        ->get();
        $title = 'Data Siswa';
        return view('siswa.index', compact('title', 'siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        $title = 'Tambah Siswa';
        return view('siswa.create', compact('kelas', 'siswa','title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required',
            'nisn_siswa' => 'required',
            'id_kelas' => 'required',
            'alamat_siswa' => 'required',
            'tanggal_lahir_siswa' => 'required',
            'tempat_lahir_siswa' => 'required',
            'jenis_kelamin_siswa' => 'required',
            'no_hp_siswa' => 'required',
            'nama_ayah_siswa' => 'required',
            'nama_ibu_siswa' => 'required',
            'pekerjaan_ayah_siswa' => 'required',
            'pekerjaan_ibu_siswa' => 'required',
            'alamat_ayah_siswa' => 'required',
            'alamat_ibu_siswa' => 'required',
            'foto_siswa' => 'required:jpg, jpeg, png, gif, raw, tiff',
        ]);
        $file = $request->file('foto_siswa');
        $namafile = 'Siswa'.date('Ymdhis').'.'.$request->file('foto_siswa')->getClientOriginalExtension();
        $file->move('file/siswa/',$namafile);

        $siswa = new Siswa();
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->nisn_siswa = $request->nisn_siswa;
        $siswa->id_kelas = $request->id_kelas;
        $siswa->foto_siswa = $namafile;
        $siswa->alamat_siswa = $request->alamat_siswa;
        $siswa->tanggal_lahir_siswa = $request->tanggal_lahir_siswa;
        $siswa->tempat_lahir_siswa = $request->tempat_lahir_siswa;
        $siswa->jenis_kelamin_siswa = $request->jenis_kelamin_siswa;
        $siswa->no_hp_siswa = $request->no_hp_siswa;
        $siswa->nama_ayah_siswa = $request->nama_ayah_siswa;
        $siswa->nama_ibu_siswa = $request->nama_ibu_siswa;
        $siswa->pekerjaan_ayah_siswa = $request->pekerjaan_ayah_siswa;
        $siswa->pekerjaan_ibu_siswa = $request->pekerjaan_ibu_siswa;
        $siswa->alamat_ayah_siswa = $request->alamat_ayah_siswa;
        $siswa->alamat_ibu_siswa = $request->alamat_ibu_siswa;
        $siswa->slug_siswa = Str::slug($request->nama_siswa);
        $siswa->save();
        return redirect()->route('siswa.index')->with('Sukses', 'Berhasil Tambah Siswa');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $siswa = DB::table('siswa')
            ->join('kelas', 'siswa.id_kelas', 'kelas.id_kelas')
            ->where('siswa.id_siswa', $id)
            ->first();
        $title = 'Detail Siswa';
        return view('siswa.show', compact('title', 'siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $siswa = Siswa::find($id);
        $kelas = kelas::all();
        $title = 'Edit Siswa';
        return view('siswa.edit', compact('kelas','siswa', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $siswa = Siswa::find($id);
        $namafile = $siswa->foto_siswa;
        $update = [
            'nama_siswa' => $request->nama_siswa,
            'nisn_siswa' => $request->nisn_siswa,
            'id_kelas' => $request->id_kelas,
            'foto_siswa' => $namafile,
            'alamat_siswa' => $request->alamat_siswa,
            'tanggal_lahir_siswa' => $request->tanggal_lahir_siswa,
            'tempat_lahir_siswa' => $request->tempat_lahir_siswa,
            'jenis_kelamin_siswa' => $request->jenis_kelamin_siswa,
            'no_hp_siswa' => $request->no_hp_siswa,
            'nama_ayah_siswa' => $request->nama_ayah_siswa,
            'nama_ibu_siswa' => $request->nama_ibu_siswa,
            'pekerjaan_ayah_siswa' => $request->pekerjaan_ayah_siswa,
            'pekerjaan_ibu_siswa' => $request->pekerjaan_ibu_siswa,
            'alamat_ayah_siswa' => $request->alamat_ayah_siswa,
            'alamat_ibu_siswa' => $request->alamat_ibu_siswa,
            'slug_siswa' => Str::slug($request->nama_siswa),
        ];
        if($request->foto_siswa !=""){
            $request->foto_siswa->move('file/siswa', $namafile); 
        }
        $siswa->update($update);
        return redirect()->route('siswa.index')->with('Sukses', 'Berhasil Edit Siswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $hapus = Siswa::findorfail($id);
        $namafile = $hapus->foto_siswa;
        $file = ('file/siswa/').$namafile;
        // cek file:
        if(file_exists($file)){
            @unlink($file);
        }
        // delete data dri database
        $hapus->delete();
        return redirect()->back()->with('Sukses', 'Berhasil Hapus Data siswa');
    }
}
