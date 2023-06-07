<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\Pekerjaan;
use Illuminate\Routing\Controller;
use App\Http\Requests\StorePekerjaanRequest;
use App\Http\Requests\UpdatePekerjaanRequest;

class PekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("alumni.works.index", [
            "biodatas" => Biodata::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("alumni.works.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePekerjaanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pekerjaan $pekerjaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pekerjaan $pekerjaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePekerjaanRequest $request, Pekerjaan $pekerjaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pekerjaan $pekerjaan)
    {
        //
    }
}
