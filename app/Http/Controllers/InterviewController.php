<?php

namespace App\Http\Controllers;

use App\Models\Interview;
use App\Models\Lamaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class InterviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('interviewer.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Lamaran $interview)
    {
        // dd($interview);
        $interviewers = User::where('role', 'interviewer')->get();
        $jadwal = Interview::where('lamaran_id', $interview->id)->orderBy('updated_at', 'desc')->get();
        // dd($jadwal);

        return view('admin.interview.create', compact('interview','interviewers','jadwal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validated = Validator::make($request->all(), [
            'type' => 'required',
            'tgl_interview' => 'required',
            'user_id' => 'required',
            'link' => 'required',
            'lamaran_id' => 'required',
        ]);

        if($validated->fails()){
            return redirect()->back()->withInput();
        }
        // $interview = Interview::create([
        //     'deskripsi' => $request->input('deskripsi'),
        //     'application_id' => $request->input('application_id'),
        //     'user_id' => $request->input('user_id'),
        //     'type' => $request->input('type'),
        // ]);
        Interview::create([
            'type' => $request->type,
            'tgl_interview' => $request->tgl_interview,
            'user_id' => $request->user_id,
            'link' => $request->link,
            'lamaran_id' => $request->lamaran_id
        ]);


        return redirect()->route('interview.create', $request->lamaran_id)
            ->with('success', 'Jadwal Interview berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Interview $interview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Interview $interview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Interview $interview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Interview $interview)
    {
        //
    }
}
