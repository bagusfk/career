<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use Illuminate\Http\Request;

class BerkasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $file = Berkas::findOrFail($id);
        // dd($file);

        return view('admin.penerimaan.berkas.show', compact('file'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berkas $berkas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berkas $berkas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berkas $berkas)
    {
        //
    }
}
