<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data Partner';
        $partner = Partner::all();
        return view('partner.index', compact('partner', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Partner';
        return view('partner.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori_partner' => 'required',
            'nama_partner' => 'required',
            'gambar_partner' => 'required',
        ]);
        $gambar_partner = $request->file('gambar_partner');
        $namafilepartner = 'Partner'.date('Ymdhis').'.'.$request->file('gambar_partner')->getClientOriginalExtension();
        $gambar_partner->move('file/partner/',$namafilepartner);
        
        $partner = new Partner();
        $partner->kategori_partner = $request->kategori_partner;
        $partner->nama_partner = $request->nama_partner;
        $partner->gambar_partner = $namafilepartner;
        $partner->url_partner = $request->url_partner;
        $partner->save();
        return redirect()->route('partner.index')->with('Sukses', 'Berhasil Tambah partner');
    }

    /**
     * Display the specified resource.
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partner)
    {
        $title = 'Edit Partner';
        return view('partner.edit', compact('title', 'partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Partner $partner)
    {
        $namafilepartner = $partner->gambar_partner;
        $update = [
            'nama_partner' => $request->nama_partner,
            'kategori_partner' => $request->kategori_partner,
            'gambar_partner' => $namafilepartner,
            'url_partner' => $request->url_partner,
        ];
        if ($request->gambar_partner != ""){
            $request->gambar_partner->move('file/partner/', $namafilepartner);
        }   
        $partner->update($update);
        return redirect()->route('partner.index')->with('Sukses', 'Berhasil Edit Partner');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner)
    {
        $namafilepartner = $partner->gambar_partner;
        $file_partner = ('file/partner/').$namafilepartner;
        if(file_exists($file_partner)){
            @unlink($file_partner);
        }
        $partner->delete();
        return redirect()->back()->with('Sukses', 'Berhasil Hapus Partner');
    }
}
