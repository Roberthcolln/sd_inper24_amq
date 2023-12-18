<?php

namespace App\Http\Controllers;

use App\Models\Rekening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekeningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rekening = DB::table('rekening')->orderByDesc('id_rekening')->get();
        $title = 'Data Rekening';
        return view('rekening.index', compact('rekening', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Rekening';
        return view('rekening.create', compact('title'));
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
            'nama_rekening' => 'required',
            'logo_rekening' => 'required',
            'bank_rekening' => 'required',
            'no_rekening' => 'required',
        ],$messages);
        $logo_rekening = $request->file('logo_rekening');
        $namagambarrekening = 'Rekening'.date('Ymdhis').'.'.$request->file('logo_rekening')->getClientOriginalExtension();
        $logo_rekening->move('file/rekening/',$namagambarrekening);

        $data = new Rekening();
        $data->nama_rekening = $request->nama_rekening;
        $data->logo_rekening = $namagambarrekening;
        $data->bank_rekening = $request->bank_rekening;
        $data->no_rekening = $request->no_rekening;
        $data->save();
        return redirect()->route('rekening.index')->with('Sukses', 'Berhasil Tambah Rekening');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rekening $rekening)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rekening $rekening)
    {
        $title = 'Edit Rekening';
        return view('rekening.edit', compact('rekening', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rekening $rekening)
    {
        $namagambarrekening = $rekening->logo_rekening;
        $update = [
            'nama_rekening' => $request->nama_rekening,
            'logo_rekening' => $namagambarrekening,
            'bank_rekening' => $request->bank_rekening,
            'no_rekening' => $request->no_rekening,
        ];
        if ($request->logo_rekening != ""){
            $request->logo_rekening->move(public_path('file/rekening/'), $namagambarrekening);
        }   
        $rekening->update($update);
        return redirect()->route('rekening.index')->with('Sukses', 'Berhasil Edit Rekening');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rekening $rekening)
    {
        $namagambarrekening = $rekening->logo_rekening;
        $logo_rekening = ('file/rekening/').$namagambarrekening;
        if(file_exists($logo_rekening)){
            @unlink($logo_rekening);
        }
        $rekening->delete();
        return redirect()->back()->with('Sukses', 'Berhasil Hapus Rekening');
    }
}
