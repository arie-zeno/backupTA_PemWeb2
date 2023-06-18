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
            "biodatas" => Biodata::where('nim', auth()->user()->nim)->get()
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
        // return $request->file('foto')->store('img');
        $validatedData = $request->validate([
            'nim' => 'required',
            'name' => 'required',
            'foto' => 'image|file',
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

        if($request->file('foto')){
            $validatedData['foto'] = $request->file('foto')->store('img');
        }
        // return $validatedData;

        Biodata::create($validatedData);
        return redirect("/alumni/bios")->with("success", "Biodata Berhasil Ditambahkan");
    }

    /**
     * Display the specified resource.
     */
    public function show(Biodata $biodata)
    {
        return view("alumni.bios.show",[
            'bio' => $biodata
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($nim)
    {
        return view("alumni.bios.edit",[
            'bio' => Biodata::find($nim)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $nim)
    {

        $validatedData = $request->validate([
            'nim' => 'required',
            'name' => 'required',
            'foto' => 'image|file',
            'user_id' => "required",
            'thnLulus' => 'required',
            'jk' => 'required',
            'tempatLahir' => 'required',
            'tglLahir' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'kawin' => 'required'
        ]);
        // return $validatedData;
        if($request->file('foto')){
            $validatedData['foto'] = $request->file('foto')->store('img');
        }

        Biodata::where('nim', $nim)->update($validatedData);
        $request->session()->flash('success', 'Biodata Berhasil Diubah"');
        return redirect('/alumni/bios');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Biodata $biodata)
    {
        //
    }
}
