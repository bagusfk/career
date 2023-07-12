<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Lowongan;
use Illuminate\Support\Facades\Storage;

class LowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $lowongans = Lowongan::orderBy('updated_at', 'desc')->get();
        // return view('admin.lowongan.index', compact('lowongans'));
        return response()->view('admin.lowongan.index',[
            'lowongans'=>Lowongan::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.lowongan.create ');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'posisi' => 'required',
            'file_test' => 'mimes:pdf',
            'tgl_open' => 'required|date',
            'tgl_closed' => 'required|date',
        ]);
        // dd($request);
        if ($request->hasFile('file_test')) {
            $filepath=Storage::disk('public')->put('file_test', request()->file('file_test'));
            $validated['file_test'] = $filepath;
        }

        Lowongan::create($validated);

        return redirect()->route('lowongan.index')
            ->with('success', 'Lowongan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lowongan $lowongan)
    {
        // return response()->view('admin.lowongan.show',[
        //     'lowongans'=>Lowongan::findOrFail($id),
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lowongan $lowongan)
    {
        // dd($lowongan);
        $lowo = Lowongan::findOrFail($lowongan);
        return view('admin.lowongan.edit', compact('lowo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lowongan $id)
    {
        $lowongan = Lowongan::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'posisi' => 'required',
            'file_test' => 'nullable|mimes:pdf',
            'tgl_open' => 'required|date',
            'tgl_closed' => 'required|date',
        ]);

        if ($request->hasFile('file_test')) {
            // delete image
            Storage::disk('public')->delete($lowongan->file_test);

            $filePath = Storage::disk('public')->put('file_test', request()->file('file_test'), 'public');
            $validated['file_test'] = $filePath;
        }

        $update = $lowongan->update($validated);

        if($update) {
            session()->flash('notif.success', 'lowongan updated successfully!');
            return redirect()->route('lowongan.index');
        }
        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lowongan $id)
    {
        dd($id);
        $lowongan = Lowongan::findOrFail($id);
        Storage::disk('public')->delete($lowongan->file_test);
        $delete = $lowongan->delete($id);
        if($delete) {
            session()->flash('notif.success', 'lowongan deleted successfully!');
            return redirect()->route('lowongan.index');
        }
        return abort(500);
    }
}
