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
<<<<<<< HEAD
            "pekerjaan" => Pekerjaan::all(),
=======
            "biodatas" => Biodata::where('user_id', auth()->user()->id)->get()
>>>>>>> 84e084bdb39e2781841d2f201b35d1d85fd9b45a
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
<<<<<<< HEAD
 

        $validatedData = $request->validate([
            'nim' => 'required',
            'kategori_pekerjaan' => 'required',
            'nama_pekerjaan' => "required",
            'tempat_pekerjaan' => 'required',
            'tanggal_pekerjaan' => 'required',
            'gaji' => 'required',
            'relevansi_pekerjaan' => 'required'
        ]);

        // return $validatedData;

        Pekerjaan::create($validatedData);
        return redirect("/alumni/works")->with("success", "Pekerjaan Berhasil Ditambahkan");
=======
        //
>>>>>>> 84e084bdb39e2781841d2f201b35d1d85fd9b45a
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
<<<<<<< HEAD
    public function edit($id)
    {
        return view("alumni.works.edit",[
            'pekerjaan' => Pekerjaan::find($id)
        ]);
=======
    public function edit(Pekerjaan $pekerjaan)
    {
        //
>>>>>>> 84e084bdb39e2781841d2f201b35d1d85fd9b45a
    }

    /**
     * Update the specified resource in storage.
     */
<<<<<<< HEAD
    public function update(UpdatePekerjaanRequest $request, $id)
    {
        $validatedData = $request->validate([
            'nim' => 'required',
            'kategori_pekerjaan' => 'required',
            'nama_pekerjaan' => "required",
            'tempat_pekerjaan' => 'required',
            'tanggal_pekerjaan' => 'required',
            'gaji' => 'required',
            'relevansi_pekerjaan' => 'required'
        ]);

        // return $validatedData;

        Pekerjaan::where("id", $id)->update($validatedData);
        return redirect("/alumni/works")->with("success", "Pekerjaan Berhasil Diubah");
=======
    public function update(UpdatePekerjaanRequest $request, Pekerjaan $pekerjaan)
    {
        //
>>>>>>> 84e084bdb39e2781841d2f201b35d1d85fd9b45a
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pekerjaan $pekerjaan)
    {
        //
    }
}
