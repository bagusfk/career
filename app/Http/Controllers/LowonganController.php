<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lowongan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class LowonganController extends Controller
{
    public function index()
    {
        return response()->view('admin.lowongan.index',[
            'lowongans'=>Lowongan::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.lowongan.create ');
    }

    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'judul' => 'required',
            'deskripsi' => 'required',
            'posisi' => 'required',
            'file_test' => 'mimes:pdf',
            'tgl_open' => 'required|date',
            'tgl_closed' => 'required|date',
        ]);

        if($validated->fails()){
            return redirect()->back()->withInput();
        }

        $filename = null;
        if ($request->hasFile('file_test')) {
            $filename = uniqid('file-').'.'.$request->file('file_test')->extension();
            $request->file('file_test')->storeAs(
                'public/Files', $filename
            );
        }

        Lowongan::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'posisi' => $request->posisi,
            'tgl_open' => $request->tgl_open,
            'tgl_closed' => $request->tgl_closed,
            'file_test' => $filename
        ]);

        return redirect()->route('lowongan.index')
            ->with('success', 'Lowongan berhasil ditambahkan.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $lowo = Lowongan::findOrFail($id);
        return view('admin.lowongan.edit', compact('lowo'));
    }

    public function update(Request $request, $id)
    {
        $lowongans = Lowongan::findOrFail($id);

        $validated = Validator::make($request->all(), [
            'judul' => 'required',
            'deskripsi' => 'required',
            'posisi' => 'required',
            'file_test' => 'mimes:pdf',
            'tgl_open' => 'required|date',
            'tgl_closed' => 'required|date',
        ]);
        // dd($validated);
        if($validated->fails()){
            return redirect()->back()->withInput();
        }

        $filename = null;
        if ($request->hasFile('file_test')) {
            Storage::delete('public/Files/'.$lowongans->file_test);
            $filename = uniqid('file-').'.'.$request->file('file_test')->extension();
            $request->file('file_test')->storeAs(
                'public/Files', $filename
            );
            // dd($request);
        }

        $update = $lowongans->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'posisi' => $request->posisi,
            'tgl_open' => $request->tgl_open,
            'tgl_closed' => $request->tgl_closed,
            'file_test' => $filename
        ]);

        if(!$update) {
            return abort(500);
        }

        session()->flash('notif.success', 'lowongan updated successfully!');
        return redirect()->route('lowongan.index');
    }

    public function destroy($id)
    {
        $lowongan = Lowongan::findOrFail($id);
        Storage::delete('public/Files/'.$lowongan->file_test);
        $delete = $lowongan->delete($id);

        if(!$delete) {
            return abort(500);
        }

        session()->flash('notif.success', 'lowongan deleted successfully!');
        return redirect()->route('lowongan.index');
    }
}
