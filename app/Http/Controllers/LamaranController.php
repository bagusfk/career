<?php

namespace App\Http\Controllers;

use App\Models\Lamaran;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class LamaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->view('user.lamaran.index',[
            'lowongans'=>Lowongan::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Lowongan $lowongan)
    {
        return view('user.lamaran.create', compact('lowongan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'profile_id' => 'required',
            'lowongan_id' => 'required',
            'status' => 'nullable|required',
        ]);
        $lamaran=Lamaran::create([
            'profile_id' => $request->profile_id,
            'lowongan_id' => $request->lowongan_id,
            'status' => $request->status
        ]);

        $answer = new \App\Models\Answer();
        $answer->lamaran_id = $lamaran->id;
        $answer->save();

        return redirect()->route('lamaran.index')
            ->with('success', 'Lamaran berhasil dikirim.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lamaran $lamaran)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lamaran $lamaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lamaran $lamaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lamaran $lamaran)
    {
        //
    }
}
