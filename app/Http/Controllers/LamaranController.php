<?php

namespace App\Http\Controllers;

use App\Models\Lamaran;
use App\Models\Lowongan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class LamaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $now = Carbon::now()->format('Y-m-d');?\
//        App::setLocale('id');

        return response()->view('user.lamaran.index',[
            'lowongans'=>Lowongan::whereDate('tgl_open', '<=', Carbon::now())
                ->whereDate('tgl_closed', '>=', Carbon::now())
                ->orderBy('updated_at', 'desc')
                ->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Lowongan $lowongan)
    {
        $profileId= Auth::User()->profile->id;
//        dd($user);
        $lamaran = Lamaran::where('profile_id', $profileId)->get();
//        dd($lamaran);
        foreach ($lamaran as $row) {
            if ($row->status !== 'failed') {
                return redirect()->route('lamaran.index')->with('error', 'Anda tidak dapat melamar saat ini.');
            }
        };

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
    public function show($id)
    {
//        $lowongan = Lowongan::findOrFail($id);
        return response()->view('user.lamaran.show',[
            'lowongans'=>Lowongan::findOrFail($id),
        ]);
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
        // $answer = Lowongan::findOrFail($id);

        // $validated = Validator::make($request->all(), [
        //     'judul' => 'required',
        //     'deskripsi' => 'required',
        //     'posisi' => 'required',
        //     'file_test' => 'mimes:pdf',
        //     'tgl_open' => 'required|date',
        //     'tgl_closed' => 'required|date',
        // ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
//        dd($id);
        $lamaran = Lamaran::findOrFail($id);
//        dd($lamaran);
        Storage::delete('public/Files/'.$lamaran->answer->file_url);
        $delete = $lamaran->delete($id);

        if(!$delete) {
            return abort(500);
        }

        return redirect()->back()->with('success', 'lamaran berhasil dibatalkan.');
    }

    public function json(Request $request)
    {
        $value = $request->header('x-api-key');
//        return $value;
        if ($value == '827ccb0eea8a706c4c34a16891f84e7b'){
            $user = User::all();
            return response()->json($user);
        }else{
            return response()->json([
                'status' => 'failed',
                'message' => 'kunci salah',
            ]);
        }
    }
}
