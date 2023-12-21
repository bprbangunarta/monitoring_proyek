<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use App\Models\User;
use App\Http\Requests\StoreProyekRequest;
use App\Http\Requests\UpdateProyekRequest;


class ProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::where('role', false)->get();
        $pengawas = User::where('role', 2)->get();
        $manager = User::where('role', 3)->get();


        return view('proyek.proyek', [
            "title" => "PROYEK",
            "link" => "/administrator/proyek",
            "subTitle" => null,
            "role" => "MANAGER",
            "klien" => $user,
            "pengawas" => $pengawas,
            "manager" => $manager,
            "proyeks" => Proyek::get(),
            "users" => User::where('role', 3)->get()
        ]);
    }

    public function manager()
    {

        $user = auth()->user()->name;

        $proyek = Proyek::where('manager', $user)->get();

        return view('proyek.proyek', [
            "title" => "PROYEK",
            "link" => "/manager/proyek/",
            "subTitle" => null,
            "role" => "MANAGER",
            "proyeks" => $proyek,
            "users" => User::where('role', 3)->get()
        ]);
    }

    public function Pengawas()
    {

        $user = auth()->user()->name;

        $proyek = Proyek::where('pengawas', $user)->get();

        return view('proyek.proyek', [
            "title" => "PROYEK",
            "link" => "/pengawas/proyek/",
            "subTitle" => null,
            "role" => "PENGAWAS",
            "proyeks" => $proyek,
            "users" => User::where('role', 2)->get()
        ]);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProyekRequest $request)
    {
        $data = $request->validate([
            'klien' => 'required|max:255',
            'name_proyek' => 'required|max:255|unique:proyeks',
            'pengawas' => 'required',
            'manager' => 'required|max:255',
            'time_str' => 'required',
            'time_end' => 'required',
        ]);


        Proyek::create($data);

        toastr()->success('Berhasil Buat Proyek', 'Sukses');
        return redirect()->back();
    }

    public function show()
    {
        //
    }

    public function proyekManager($name)
    {
        $proyek = Proyek::where('manager', $name)->get();

        return view('proyek.proyek', [
            "title" => "PROYEK",
            "link" => "/manager/proyek/",
            "subTitle" => null,
            "role" => "MANAGER",
            "proyeks" => $proyek,
            "users" => User::where('role', 3)->get()
        ]);
    }

    public function proyekPengawas($name)
    {
        $proyek = Proyek::where('pengawas', $name)->get();

        return view('proyek.proyek', [
            "title" => "PROYEK",
            "link" => "/pengawas/proyek/",
            "subTitle" => null,
            "role" => "PENGAWAS",
            "proyeks" => $proyek,
            "users" => User::where('role', 3)->get()
        ]);
    }


    public function edit($id)
    {
        $user = User::where('role', false)->get();
        $pengawas = User::where('role', 2)->get();
        $manager = User::where('role', 3)->get();

        $proyek = Proyek::find($id);

        return view('proyek.detail', [
            "title" => "PROYEK",
            "link" => "",
            "subTitle" => "Detail",
            "klien" => $user,
            "pengawas" => $pengawas,
            "manager" => $manager,
            "proyek" => $proyek
        ]);
    }

    public function update(UpdateProyekRequest $request, Proyek $proyek)
    {

        $data = $request->validate([
            'name_proyek' => 'required|max:255|unique:proyeks,name_proyek,' . $proyek->id,
            'klien' => 'required|max:255',
            'pengawas' => 'required',
            'manager' => 'required|max:255',
            'time_str' => 'required',
            'time_end' => 'required',
        ]);

        $proyek->update($data);

        toastr()->success('Berhasil Update Proyek', 'Sukses');
        return redirect()->back();
    }
    public function updateIsStr(UpdateProyekRequest $request, Proyek $proyek)
    {
        $data = $request->validate([
            'is_str' => 'required|numeric',
        ]);

        $proyek->update(['is_str' => $data['is_str']]);

        return redirect()->back();
    }


    public function destroy($id)
    {
        $proyek = Proyek::find($id);

        Proyek::destroy($proyek->id);

        toastr()->success('Berhasil Menghapus Proyek', 'Sukses');
        return redirect()->back();
    }
}
