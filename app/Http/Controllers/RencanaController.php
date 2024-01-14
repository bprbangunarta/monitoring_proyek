<?php

namespace App\Http\Controllers;

use App\Models\Rencana;
use App\Models\Proyek;
use App\Http\Requests\StoreRencanaRequest;
use App\Http\Requests\UpdateRencanaRequest;

class RencanaController extends Controller
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
    public function store(StoreRencanaRequest $request)
    {
        $data = $request->validate([
            'proyek_id' => 'required|numeric',
            'pekerjaan' => 'required|max:255|unique:rencanas',
            'alat' => 'max:255',
            'time_str' => 'required',
            'time_end' => 'required',
        ]);


        Rencana::create($data);

        toastr()->success('Berhasil Buat Proyek', 'Sukses');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $rencana = Rencana::where('proyek_id', $id)->get();
        $proyek = Rencana::where('id', $id)->first();

        $back = route('proyek.index');
        if (auth()->user()->role == 0) {
            $back = route('proyek.index');
        } elseif (auth()->user()->role == 2) {
            $back = '/pengawas/proyek';
        } elseif (auth()->user()->role == 3) {
            $back = '/manager/proyek';
        }

        return view('administrator.rencana.index', [
            "title" => "PROYEK",
            "link" => $back,
            "subTitle" => 'Rencana Kerja',
            "rencana" => $rencana,
            "proyek" => $proyek,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rencana $rencana)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRencanaRequest $request, Rencana $rencana)
    {
        $data = $request->validate([
            'status' => 'required',
        ]);

        $rencana->update($data);

        toastr()->success('Berhasil Update Status', 'Sukses');
        return redirect()->back();
    }
    public function fullupdate(UpdateRencanaRequest $request, Rencana $rencana)
    {
        $data = $request->validate([
            'proyek_id' => 'required|numeric',
            'pekerjaan' => 'required|max:255',
            'alat' => 'required',
            'time_str' => 'required',
            'time_end' => 'required',
        ]);

        $rencana->update($data);

        toastr()->success('Berhasil Update Rencana', 'Sukses');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $rencana = Rencana::find($id);

        Rencana::destroy($rencana->id);

        toastr()->success('Berhasil Menghapus Rencana', 'Sukses');
        return redirect()->back();
    }
}
