<?php

namespace App\Http\Controllers;

use App\Models\Blacklist;
use App\Models\Lamaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlacklistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $blacklists = Blacklist::all();
//        dd($blacklists);
//        return view('admin.penerimaan.blacklist.index', compact('blacklists'));
        return response()->view('admin.penerimaan.blacklist.index',[
            'blacklists' => Blacklist::all(),
        ]);
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
    public function show(Blacklist $blacklist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blacklist $blacklist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $penerimaans = Lamaran::findOrFail($id);
//            dd($penerimaans);
        $userId= $penerimaans->profile->user->id;
//            dd($userId);
        $users = User::findOrFail($userId);

        $validated = Validator::make($request->all(), [
            'feedback' => 'required',
            'status' => 'required',
        ]);

        if($validated->fails()){
//            dd($validated);
            return redirect()->back()->withInput();
        }
//            dd($request);
        $update = $penerimaans->update([
            'feedback' => $request->feedback,
            'status' => $request->status,
        ]);

        if(!$update) {
            return abort(500);
        }

        Blacklist::create([
            'user_id' => $userId,
        ]);

        // Tambahkan data ke tabel "blacklist"
//        $blacklist = new Blacklist();
//        $blacklist->user_id = $userId;
        // Tambahkan atribut lain yang diperlukan untuk "blacklist"

//        $blacklist->save();

        return redirect()->route('penerimaan.index')->with('success', 'Status Lamaran berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $blacklist = Blacklist::findOrFail($id);
//        dd($blacklist);
        $blacklist->delete();

        return redirect()->route('blacklist.index')->with('success', 'Data blacklist berhasil dihapus.');
    }
}
