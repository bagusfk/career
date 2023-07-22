<?php

namespace App\Http\Controllers;

use App\Models\Lamaran;
use App\Models\Lowongan;
use App\Models\Profile;
use App\Models\User;

use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Carbon\Traits\Date;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lamarans = Lamaran::whereHas('profile', function ($query) {
            $query->whereHas('user', function ($query) {
                $query->where('status_user', 'peserta');
            });
        })->get();

        return response()->view('admin.penerimaan.peserta.index',compact('lamarans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lamarans = Lamaran::whereHas('profile', function ($query) {
            $query->whereHas('user', function ($query) {
                $query->where('status_user', 'peserta');
            });
        })->get();

        $pdf = Pdf::loadView('admin.penerimaan.peserta.pdf', compact('lamarans'));
        return $pdf->download(Carbon::now()->timestamp.'-data-peserta.pdf');

        return view('admin.penerimaan.peserta.pdf',compact('lamarans'));
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
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
    }
}
