<?php

namespace App\Http\Controllers;

use App\Models\UnitBisnis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

class UnitBisnisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $unit_bisnis = DB::table('unit_bisnis')->orderByDesc('id_unit_bisnis')->get();
        $title = 'Data Unit Bisnis';
        return view('unit_bisnis.index', compact('title', 'unit_bisnis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Unit Bisnis';
        return view('unit_bisnis.create', compact('title'));
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
            'nama_unit_bisnis' => 'required',
            'deskripsi_unit_bisnis' => 'required',
            'logo_unit_bisnis' => 'required',
            'url_unit_bisnis' => 'required',
        ],$messages);
        $unit_bisnis = $request->file('logo_unit_bisnis');
        $namagambarunitbisnis = 'Ubis'.date('Ymdhis').'.'.$request->file('logo_unit_bisnis')->getClientOriginalExtension();
        $unit_bisnis->move('file/ubis/',$namagambarunitbisnis);

        $data = new UnitBisnis();
        $data->nama_unit_bisnis = $request->nama_unit_bisnis;
        $data->deskripsi_unit_bisnis = $request->deskripsi_unit_bisnis;
        $data->logo_unit_bisnis = $namagambarunitbisnis;
        $data->url_unit_bisnis = $request->url_unit_bisnis;
        $data->save();
        return redirect()->route('unit_bisnis.index')->with('Sukses', 'Berhasil Tambah Unit Bisnis');

    }

    /**
     * Display the specified resource.
     */
    public function show(UnitBisnis $unitBisnis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ubis = UnitBisnis::find($id);
        $title = 'Edit Unit Bisnis';
        return view('unit_bisnis.edit', compact('title', 'ubis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $ubis = UnitBisnis::findorfail($id);
        $namagambarunitbisnis = $ubis->logo_unit_bisnis;
        $update = [
            'nama_unit_bisnis' => $request->nama_unit_bisnis,
            'deskripsi_unit_bisnis' => $request->deskripsi_unit_bisnis,
            'logo_unit_bisnis' => $namagambarunitbisnis,
            'url_unit_bisnis' => $request->url_unit_bisnis,
        ];
        if ($request->logo_unit_bisnis != ""){
            $request->logo_unit_bisnis->move(public_path('file/ubis/'), $namagambarunitbisnis);
        }   
        $ubis->update($update);
        return redirect()->route('unit_bisnis.index')->with('Sukses', 'Berhasil Update Unit Bisnis');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ubis = UnitBisnis::find($id);
        $namagambarunitbisnis = $ubis->logo_unit_bisnis;
        $logo_unit_bisnis = ('file/ubis/').$namagambarunitbisnis;
        if(file_exists($logo_unit_bisnis)){
            @unlink($logo_unit_bisnis);
        }
        $ubis->delete();
        return redirect()->back()->with('Sukses', 'Berhasil Hapus Unit Bisnis');
    }
}
