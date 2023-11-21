<?php

namespace App\Http\Controllers;

use App\Models\Interview;
use App\Models\Lamaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;



class InterviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        return response()->view('interviewer.index',[
            'interviews'=>Interview::where('user_id', $user->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Lamaran $interview)
    {
        // dd($interview);
        $interviewers = User::where('role','interviewer')->orWhere('role', 'admin')->get();
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
            'link' => 'required|string',
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

        Lamaran::where('id', $request->lamaran_id)->update(['status' => 'interview']);

        return redirect()->route('interview.create', $request->lamaran_id)
            ->with('success', 'Jadwal Interview berhasil ditambahkan dan status berhasil dirubah ke interview.');
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
    public function edit(Interview $interviewer)
    {
        // dd($interviewer);
        $interviews = Interview::findOrFail($interviewer->id);
        return view('interviewer.edit',compact('interviews'));
    }
    public function updateJadwal(Request $request,$id)
    {
        $data = Interview::findOrFail($id);
//        dd($data);
        $validated=Validator::make($request->all(), [
            'type' => 'required',
            'tgl_interview' => 'required',
            'user_id' => 'required',
            'link' => 'required',
        ]);
        // dd($interviewer);
        if($validated->fails()){
            return redirect()->back()->withInput();
        }

        $data->update([
            'type' => $request->type,
            'tgl_interview' => $request->tgl_interview,
            'user_id' => $request->user_id,
            'link' => $request->link,
        ]);

        session()->flash('notif.success', 'update successfully!');
        return redirect()->route('interview.create', $data->lamaran->id);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Interview $interviewer)
    {
        $data = $request->validate([
            'feedback' => 'required',
        ]);
        // dd($interviewer);

        $interviewer->update($data);

        session()->flash('notif.success', 'feedback sent successfully!');
        return redirect()->route('interviewer.edit', $interviewer->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Interview $interview)
    {
        //
    }
}
