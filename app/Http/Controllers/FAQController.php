<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = FAQ::all();
        $title = "Data FAQ";
        return view('faq.index', compact('faqs', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tambah Pertanyaan";
        return view('faq.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pertanyaan' => ['required', 'string'],
            'jawaban' => ['required', 'string'],
        ]);

        FAQ::create($request->all());
        return redirect()->route('faq.index')->with('Sukses', 'Berhasil menambah pertanyaan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   $faq = FAQ::findOrFail($id);
        $title = "Edit Pertanyaan";
        return view('faq.edit', compact('faq', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'pertanyaan' => ['required', 'string'],
            'jawaban' => ['required', 'string'],
        ]);

        $faq = FAQ::findOrFail($id);
        $faq->pertanyaan = $request->pertanyaan;
        $faq->jawaban = $request->jawaban;
        $faq->save();

        return redirect()->route('faq.index')->with('Sukses', 'Sukses update pertanyaan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $faq = FAQ::findOrFail($id);
        $faq->delete();
        return redirect()->route('faq.index')->with('Delete', 'Berhasil menghapus pertanyaan');
    }
}
