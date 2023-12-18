<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data Program';
        $program = DB::table('program')->orderByDesc('id_program')->get();
        return view('program.index', compact('program', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Program';
        return view('program.create', compact('title'));
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
            'nama_program' => 'required',
            'gambar_program' => 'required',
            'keterangan_program' => 'required',
        ],$messages);
        $gambar_program = $request->file('gambar_program');
        $namagambarprogram = 'program'.date('Ymdhis').'.'.$request->file('gambar_program')->getClientOriginalExtension();
        $gambar_program->move('file/program/',$namagambarprogram);

        $data = new Program();
        $data->nama_program = $request->nama_program;
        $data->gambar_program = $namagambarprogram;
        $data->keterangan_program = $request->keterangan_program;
        $data->slug_program = Str::slug($request->nama_program); 
        $data->save();
        return redirect()->route('program.index')->with('Sukses', 'Berhasil Tambah Program');
    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $program = Program::find($id);
        $title = 'Edit program';
        return view('program.edit', compact('program', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $program = Program::find($id);
        $namagambarprogram = $program->gambar_program;
        $update = [
            'nama_program' => $request->nama_program,
            'gambar_program' => $namagambarprogram,
            'keterangan_program' => $request->keterangan_program,
            'slug_program' => Str::slug($request->nama_program),
        ];
        if ($request->gambar_program != ""){
            $request->gambar_program->move(public_path('file/program/'), $namagambarprogram);
        }   
        $program->update($update);
        return redirect()->route('program.index')->with('Sukses', 'Berhasil Edit Program');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $program = Program::find($id);
        $namagambarprogram = $program->gambar_program;
        $gambar_program =public_path ('file/program/').$namagambarprogram;
        if(file_exists($gambar_program)){
            @unlink($gambar_program);
        }
        $program->delete();
        return redirect()->back()->with('Sukses', 'Berhasil Hapus Program');
    }
}
