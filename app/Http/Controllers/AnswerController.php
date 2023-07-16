<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

    }

    /**
     * Display the specified resource.
     */
    public function show(answer $answer)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $answer)
    {
        $answers = Answer::findOrFail($answer);

        $validated = Validator::make($request->all(), [
            'file_url' => 'mimes:pdf'
        ]);
        // dd($validated);

        if($validated->fails()){
            return redirect()->back()->withInput();
        }

        $filename = null;
        if ($request->hasFile('file_url')) {
            Storage::delete('public/Files/'.$answers->file_url);
            // dd($request);
            $filename = uniqid('answer-').'.'.$request->file('file_url')->extension();
            $request->file('file_url')->storeAs(
                'public/Files', $filename
            );
        }
        // dd($filename);
        $update = $answers->update([
            'file_url' => $filename,
        ]);

        if(!$update) {
            return abort(500);
        }

        session()->flash('notif.success', 'Sent answer successfully!');
        return redirect()->route('timeline.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(answer $answer)
    {
        //
    }
}
