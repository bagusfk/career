<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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
        return view('admin.penerimaan.berkas.show', compact('file'));
    }

    /**
     * Show the form for editing the specified resource.
     * @throws \Exception
     */
    public function edit($berkas)
    {
        $databerkas = Berkas::findOrFail($berkas);
//        dd($databerkas);
        return view('profiles.partials.update-documents',compact('databerkas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $berkas)
    {
        $databerkas = Berkas::findOrFail($berkas);

        $validated = Validator::make($request->all(), [
            'cv' => 'nullable|file|mimes:pdf|max:2048',
            'transkip' => 'nullable|file|mimes:pdf|max:2048',
            'ijazah' => 'nullable|file|mimes:pdf|max:2048',
            'profiling' => 'nullable|file|mimes:xlsx,xlsm,xlsb,xltx|max:2048',
        ]);

        if($validated->fails()){
            return redirect()->back()->withInput();
        }

        if ($request->hasFile('cv')) {
            Storage::delete('public/Files/'.$databerkas->cv);
            $cvname = uniqid('cv-').'.'.$request->file('cv')->extension();
            $request->file('cv')->storeAs(
                'public/Files', $cvname
            );
            $databerkas->cv = $cvname;
        }

        if ($request->hasFile('transkip')) {
            Storage::delete('public/Files/'.$databerkas->transkip);
            $transkipname = uniqid('transkip-').'.'.$request->file('transkip')->extension();
            $request->file('transkip')->storeAs(
                'public/Files', $transkipname
            );
            $databerkas->transkip = $transkipname;
        }

        if ($request->hasFile('ijazah')) {
            Storage::delete('public/Files/'.$databerkas->ijazah);
            $ijazahname = uniqid('ijazah-').'.'.$request->file('ijazah')->extension();
            $request->file('ijazah')->storeAs(
                'public/Files', $ijazahname
            );
            $databerkas->ijazah = $ijazahname;
        }

        if ($request->hasFile('profiling')) {
            Storage::delete('public/Files/'.$databerkas->profiling);
            $profilingname = uniqid('profiling-').'.'.$request->file('profiling')->extension();
            $request->file('profiling')->storeAs(
                'public/Files', $profilingname
            );
            $databerkas->profiling = $profilingname;
        }

        $update = $databerkas->save();

        if(!$update) {
            return abort(500);
        }

        session()->flash('notif.success', 'lowongan updated successfully!');
        return redirect()->route('berkas.edit', $berkas);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berkas $berkas)
    {

    }
}
