<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GeneralProfileController extends Controller
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $profile = Profile::findOrFail($id);
//        dd($berkas);
        return view('profiles.edit',compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $profiles = Profile::findOrFail($id);
//        dd($profiles);
        $validated = Validator::make($request->all(), [
            'no_hp' => 'required',
            'alamat' => 'required',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
//            'image' => 'required',
            'sekolah' => 'required',
        ]);
//         dd($validated);
        if($validated->fails()){
            return redirect()->back()->withInput();
        }

        $update = $profiles->update([
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
//            'image' => $filename,
            'sekolah' => $request->sekolah,
        ]);

        if(!$update) {
            return abort(500);
        }

        session()->flash('notif.success', 'profile updated successfully!');
        return redirect()->route('profiles.edit', $profiles->id);

    }

    public function updatePhoto(Request $request, string $id)
    {
        $profiles = Profile::findOrFail($id);
//        dd($profiles);
        $validated = Validator::make($request->all(), [
            'image' => 'required|image|max:2048',
        ]);
//         dd($validated);
        if($validated->fails()){
            return redirect()->back()->withInput();
        }

        if ($request->hasFile('image')) {
            Storage::delete('public/Images/'.$profiles->image);
            $imagename = uniqid('profile-').'.'.$request->file('image')->extension();
            $request->file('image')->storeAs(
                'public/Images', $imagename
            );
            $profiles->image = $imagename;
        }

        $update = $profiles->save();

        if(!$update) {
            return abort(500);
        }

        session()->flash('notif.success', 'Photo profile updated successfully!');
        return redirect()->route('profiles.edit', $profiles->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
