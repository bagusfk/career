<?php

namespace App\Http\Controllers;

use App\Models\Lamaran;
use App\Models\Lowongan;
use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TimelineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user =auth()->user();
        $lamarans = $user->profile->lamaran;
        $profileId = $user->profile->id;

        $answers = Answer::whereHas('lamaran', function ($query) use ($profileId) {
            $query->where('profile_id', $profileId);
        })->get();

        // dd($answers);

        return view('user.timeline.index', compact('lamarans','answers'));

        // return response()->view('user.timeline.index',[
        //     'lamarans'=>Lamaran::orderBy('updated_at', 'desc')->get(),
        // ]);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
