<?php

namespace App\Http\Controllers;

use App\Models\Lamaran;
use App\Models\Answer;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PenerimaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // dd($answers);
        return response()->view('admin.penerimaan.index',[
            'lamarans'=>Lamaran::orderBy('updated_at', 'desc')->get(),
            'answers' => Answer::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Lamaran $penerimaan)
    {
        $data = $request->validate([
            'feedback' => 'required',
        ]);

        $penerimaan->update($data);

        return redirect()->route('penerimaan.index')->with('success', 'Feedback Lamaran berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lamaran $penerimaan)
    {
        return view('admin.penerimaan.show', compact('penerimaan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lamaran $penerimaan)
    {
        $data = $request->validate([
            'status' => 'required',
        ]);

        $penerimaan->update($data);

        return redirect()->route('penerimaan.index')->with('success', 'Status Lamaran berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
