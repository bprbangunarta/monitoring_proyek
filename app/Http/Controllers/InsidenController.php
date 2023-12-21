<?php

namespace App\Http\Controllers;

use App\Models\Insiden;
use App\Models\Laporan;
use App\Models\Proyek;
use App\Models\Image;
use App\Http\Requests\StoreInsidenRequest;
use App\Http\Requests\UpdateInsidenRequest;

class InsidenController extends Controller
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
    public function store(StoreInsidenRequest $request)
    {
        $data = $request->validate([
            'proyek_id' => 'required|numeric',
            'judul' => 'required|max:255',
            'detail' => 'required',
        ]);

        $insiden = Insiden::create($data);

        for ($i = 1; $i <= 5; $i++) {
            if ($request->hasFile('insiden' . $i)) {
                $uploadedFile = $request->file('insiden' . $i);

                if ($uploadedFile->isValid()) {
                    $imgPath = $uploadedFile->store('img/insiden');
                    Image::create([
                        'img' => $imgPath,
                        'insiden_id' => $insiden->id,
                    ]);
                }
            }
        }

        toastr()->success('Berhasil Buat Insiden', 'Sukses');
        return redirect()->back();
    }


    public function show($id)
    {
        $proyek = Proyek::where('id', $id)->first();
        $insiden = Insiden::where('proyek_id', $proyek->id)->get();

        return view('manager.insiden.all_insiden', [
            "title" => "PROYEK",
            "subTitle" => "Detail Laporan",
            "proyek" => $proyek,
            "insiden" => $insiden,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Insiden $insiden)
    {
        $proyek = Proyek::where('id', $insiden->proyek_id)->first();

        return view('manager.insiden.detail_insiden', [
            "title" => "PROYEK",
            "subTitle" => "Detail Insiden",
            "proyek" => $proyek,
            "insiden" => $insiden,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInsidenRequest $request, Insiden $insiden)
    {
        $data = $request->validate([
            'laporan_id' => 'required|numeric',
            'judul' => 'required|max:255',
            'detail' => 'nullable',
        ]);

        // Simpan data laporan yang diperbarui
        $insiden->update($data);

        // Loop melalui gambar yang diunggah
        foreach ($insiden->image as $img) {
            $imgId = $img->id;
            if ($request->hasFile('insiden' . $insiden->id . $imgId)) {
                $uploadedFile = $request->file('insiden' . $insiden->id . $imgId);

                if ($uploadedFile->isValid()) {
                    $imgPath = $uploadedFile->store('img/insiden');

                    // Perbarui data gambar yang ada
                    $img->update(['img' => $imgPath]);
                }
            }
        }

        // Mengunggah gambar baru
        if ($request->hasFile('new_img' . $insiden->id)) {
            $uploadedFile = $request->file('new_img' . $insiden->id);

            if ($uploadedFile->isValid()) {
                $gambarPath = $uploadedFile->store('img/insiden');

                // Buat entri gambar baru yang terhubung dengan insiden
                Image::create([
                    'img' => $gambarPath,
                    'insiden_id' => $insiden->id,
                ]);
            }
        }

        toastr()->success('Berhasil Update insiden', 'Sukses');
        return redirect()->back();
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $insiden = Insiden::find($id);

        if (!$insiden) {
            // Handle jika insiden tidak ditemukan
            toastr()->error('Insiden tidak ditemukan.', 'Gagal');
            return redirect()->back();
        }

        // Ambil ID gambar yang sesuai dengan ID insiden
        $gambar = Image::where('insiden_id', $insiden->id)->first();

        if ($gambar) {
            // Ambil jalur file gambar
            $gambarPath = public_path('storage/' . $gambar->img);

            // Hapus file gambar dari direktori
            if (file_exists($gambarPath)) {
                unlink($gambarPath);
            }

            // Hapus data gambar dari database
            $gambar->delete();
        }

        // Hapus insiden
        $insiden->delete();

        toastr()->success('Berhasil Menghapus Insiden beserta Gambarnya', 'Sukses');
        return redirect()->back();
    }
}
