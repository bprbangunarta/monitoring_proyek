<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Proyek;
use App\Models\Image;
use App\Http\Requests\StoreLaporanRequest;
use App\Http\Requests\UpdateLaporanRequest;

class LaporanController extends Controller
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
    public function store(StoreLaporanRequest $request)
    {
        $data = $request->validate([
            'proyek_id' => 'required|numeric',
            'pekerjaan' => 'required|max:255',
            'detail' => '',
        ]);

        $laporan = Laporan::create($data);

        for ($i = 1; $i <= 5; $i++) {
            if ($request->hasFile('laporan' . $i)) {
                $uploadedFile = $request->file('laporan' . $i);

                if ($uploadedFile->isValid()) {
                    $imgPath = $uploadedFile->store('img/laporan');
                    Image::create([
                        'img' => $imgPath,
                        'laporan_id' => $laporan->id,
                    ]);
                }
            }
        }

        toastr()->success('Berhasil Buat Laporan', 'Sukses');
        return redirect()->back();
    }

    public function show($id)
    {
        $proyek = Proyek::where('id', $id)->first();
        $laporan = Laporan::where('proyek_id', $id)->first();

        return view('manager.laporan.all_laporan', [
            "title" => "PROYEK",
            "link" => "/manager/proyek/$proyek->id/edit",
            "subTitle" => "DETAIL LAPORAN",
            "proyek" => $proyek,
            "laporan" => $laporan,
        ]);
    }

    public function detailLaporan(Laporan $laporan)
    {
        $proyek = Proyek::where('id', $laporan->proyek_id)->first();

        return view('proyek.detail_laporan', [
            "title" => "DETAIL PROYEK",
            "link" => "/manager/proyek/$proyek->id/edit",
            "subTitle" => "DETAIL LAPORAN",
            "proyek" => $proyek,
            "laporan" => $laporan,
        ]);
    }
    public function soloLaporan(Laporan $laporan)
    {
        $proyek = Proyek::where('id', $laporan->proyek_id)->first();

        return view('manager.laporan.detail_laporan', [
            "title" => "DETAIL PROYEK",
            "link" => "/manager/proyek/$proyek->id/edit",
            "subTitle" => "DETAIL LAPORAN",
            "proyek" => $proyek,
            "laporan" => $laporan,
        ]);
    }

    public function edit(Laporan $laporan)
    {
        $proyek = Proyek::where('id', $laporan->proyek_id)->first();

        return view('manager.laporan.detail_laporan', [
            "title" => "PROYEK",
            "link" => "/manager/proyek/$proyek->id/edit",
            "subTitle" => "DETAIL LAPORAN",
            "proyek" => $proyek,
            "laporan" => $laporan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLaporanRequest $request, Laporan $laporan)
    {
        $data = $request->validate([
            'proyek_id' => 'required|numeric',
            'pekerjaan' => 'required|max:255',
            'detail' => 'nullable',
        ]);

        // Simpan data laporan yang diperbarui
        $laporan->update($data);

        // Loop melalui gambar yang diunggah
        foreach ($laporan->image as $img) {
            $imgId = $img->id;
            if ($request->hasFile('laporan' . $laporan->id . $imgId)) {
                $uploadedFile = $request->file('laporan' . $laporan->id . $imgId);

                if ($uploadedFile->isValid()) {
                    $imgPath = $uploadedFile->store('img/laporan');

                    // Perbarui data gambar yang ada
                    $img->update(['img' => $imgPath]);
                }
            }
        }

        // Mengunggah gambar baru
        if ($request->hasFile('new_img' . $laporan->id)) {
            $uploadedFile = $request->file('new_img' . $laporan->id);

            if ($uploadedFile->isValid()) {
                $gambarPath = $uploadedFile->store('img/laporan');

                // Buat entri gambar baru yang terhubung dengan laporan
                Image::create([
                    'img' => $gambarPath,
                    'laporan_id' => $laporan->id,
                ]);
            }
        }

        toastr()->success('Berhasil Update Laporan', 'Sukses');
        return redirect()->back();
    }

    public function destroy(Laporan $laporan)
    {
        //
    }
}
