<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;
use App\Http\Controllers;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("alumni.bios.index", [
            "biodatas" => Biodata::where('user_id', auth()->user()->id)->get()
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("alumni.bios.create");
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nim' => 'required',
            'name' => 'required',
            'user_id' => "required",
            'thnLulus' => 'required',
            'jk' => 'required',
            'tempatLahir' => 'required',
            'tglLahir' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'kawin' => 'required'
        ]);

        $tahunMasuk = "20" . $validatedData["nim"][0].$validatedData["nim"][1];
        // dd($request);
        $validatedData["thnMasuk"] = $tahunMasuk;
        // return $validatedData;

        Biodata::create($validatedData);
        return redirect("/alumni/bios")->with("success", "Biodata Berhasil Ditambahkan");
    }

    /**
     * Display the specified resource.
     */
    public function show(Biodata $biodata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Biodata $biodata)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Biodata $biodata)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Biodata $biodata)
    {
        //
    }
}
