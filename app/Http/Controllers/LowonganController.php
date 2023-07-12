<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use Illuminate\Http\Request;
use Storage;

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
        if ($request->hasFile('file_test')) {
            $file = $request->file('file_test');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('file_test'), $fileName);
            $validated['file_test'] = $fileName;
        }
        Lowongan::create($validated);

        return redirect()->route('admin.lowongan.index')
            ->with('success', 'Lowongan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lowongan $id)
    {
        return response()->view('admin.lowongan.show',[
            'lowongans'=>Lowongan::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lowongan $id)
    {
        // dd($id);
        return response()->view('admin.lowongan.edit',[
            'lowongans'=>Lowongan::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lowongan $id)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'posisi' => 'required',
            'file_test' => 'nullable|mimes:pdf',
            'tgl_open' => 'required|date',
            'tgl_closed' => 'required|date',
        ]);

        $lowongan = Lowongan::findOrFail($id);

        if ($request->hasFile('file_test')) {
            $file = $request->file('file_test');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('file_test'), $fileName);
            $validated['file_test'] = $fileName;

            // Hapus file lama jika ada
            if ($lowongan->file_test && file_exists(public_path('file_test/' . $lowongan->file_test))) {
                unlink(public_path('file_test/' . $lowongan->file_test));
            }
        }

        $lowongan->update($validated);

        return redirect()->route('admin.lowongan.index')
            ->with('success', 'Lowongan berhasil diperbarui.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lowongan $id)
    {
        $lowongan = Lowongan::findOrFail($id);

        // Hapus file terkait jika ada
        if ($lowongan->file_test && file_exists(public_path('file_test/' . $lowongan->file_test))) {
            unlink(public_path('file_test/' . $lowongan->file_test));
        }

        $lowongan->delete();

        return redirect()->route('admin.lowongan.index')
            ->with('success', 'Lowongan berhasil dihapus.');
    }
}
