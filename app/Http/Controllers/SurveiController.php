<?php

namespace App\Http\Controllers;

use App\Models\Survei;
use App\Models\Laporan;
use App\Models\Proyek;
use App\Models\Image;
use App\Http\Requests\StoreSurveiRequest;
use App\Http\Requests\UpdateSurveiRequest;

class SurveiController extends Controller
{
    public function index()
    {
        //
    }
    public function create()
    {
        //
    }
    public function store(StoreSurveiRequest $request)
    {
        $data = $request->validate([
            'proyek_id' => 'required|numeric',
            'judul' => 'required|max:255',
            'detail' => '',
        ]);

        $survei = Survei::create($data);

        for ($i = 1; $i <= 5; $i++) {
            if ($request->hasFile('img' . $i)) {
                $uploadedFile = $request->file('img' . $i);

                if ($uploadedFile->isValid()) {
                    $imgPath = $uploadedFile->store('img/survei');
                    Image::create([
                        'img' => $imgPath,
                        'survei_id' => $survei->id,
                    ]);
                }
            }
        }



        toastr()->success('Berhasil Buat Survei', 'Sukses');
        return redirect()->back();
    }


    public function show($id)
    {
        $proyek = Proyek::where('id', $id)->first();
        $survei = Survei::where('proyek_id', $proyek->id)->get();

        return view('pengawas.survei.all_survei', [
            "title" => "PROYEK",
            "subTitle" => "Survei",
            "proyek" => $proyek,
            "survei" => $survei,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Survei $survei)
    {
        $proyek = Proyek::where('id', $survei->proyek_id)->first();

        return view('pengawas.survei.detail_survei', [
            "title" => "PROYEK",
            "link" => "/manager/proyek/$proyek->id/edit",
            "subTitle" => "Detail survei",
            "proyek" => $proyek,
            "survei" => $survei,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSurveiRequest $request, Survei $survei)
    {

        $data = $request->validate([
            'laporan_id' => 'numeric',
            'judul' => 'max:255',
            'detail' => 'nullable',
        ]);

        // Simpan data laporan yang diperbarui
        $survei->update($data);

        // Loop melalui gambar yang diunggah
        foreach ($survei->image as $img) {
            $imgId = $img->id;
            if ($request->hasFile('survei' . $survei->id . $imgId)) {
                $uploadedFile = $request->file('survei' . $survei->id . $imgId);

                if ($uploadedFile->isValid()) {
                    $imgPath = $uploadedFile->store('img/survei');

                    // Perbarui data gambar yang ada
                    $img->update(['img' => $imgPath]);
                }
            }
        }

        // Mengunggah gambar baru
        if ($request->hasFile('new_img' . $survei->id)) {
            $uploadedFile = $request->file('new_img' . $survei->id);

            if ($uploadedFile->isValid()) {
                $gambarPath = $uploadedFile->store('img/survei');

                // Buat entri gambar baru yang terhubung dengan survei
                Image::create([
                    'img' => $gambarPath,
                    'survei_id' => $survei->id,
                ]);
            }
        }

        toastr()->success('Berhasil Update Survei', 'Sukses');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $survei = Survei::find($id);

        if (!$survei) {
            toastr()->error('survei tidak ditemukan.', 'Gagal');
            return redirect()->back();
        }
        $gambar = Image::where('survei_id', $survei->id)->first();

        if ($gambar) {
            $gambarPath = public_path('storage/' . $gambar->img);
            if (file_exists($gambarPath)) {
                unlink($gambarPath);
            }
            $gambar->delete();
        }

        $survei->delete();

        toastr()->success('Berhasil Menghapus survei beserta Gambarnya', 'Sukses');
        return redirect()->back();
    }
}
