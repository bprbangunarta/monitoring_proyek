<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Proyek;
use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('administrator.dasboard.dasboard', [
            "title" => "dasboard",
            "link" => "/administrator",
            "subTitle" => null,
            "users" => User::count(),
            "klien" => User::where('role', 0)->count(),
            "proyek" => Proyek::where('is_str', 0)->count(),
            "proyek_aktif" => Proyek::where('is_str', 1)->count(),
            "proyek_selesai" => Proyek::where('is_str', 2)->count(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administrator.anggota.user_table', [
            "title" => "Tabel Anggota",
            "link" => "/administrator/create",
            "subTitle" => null,
            "users" => User::get()
        ]);
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
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update([
            'role' => $request->role,
        ]);

        toastr()->success('Successfully Update', 'Sukses');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $user = User::find($id);

        User::destroy($user->id);

        toastr()->success('Successfully Delete', 'Sukses');
        return redirect()->back();
    }
}
