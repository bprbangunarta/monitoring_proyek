<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;




class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login&reg.log&reg', [
            'title' => 'Login',
        ]);
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);
        if (Auth::attempt($data)) {
            $request->session()->regenerate();

            toastr()->success('Login successful!');

            return redirect()->intended('/user');
        }

        return back()->with('gagal_login', 'Gagal login!');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        toastr()->success('Logout successful!');
        return redirect('/auth');
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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'username' => 'required|min:3|alpha_dash|max:255|unique:users,username',
            'email' => 'required|max:255|email:dns|unique:users,email',
            'password' => 'required|max:12|min:3'
        ]);

        if ($validator->fails()) {
            return redirect('/auth')
                ->withErrors($validator)
                ->withInput()
                ->with('gagal_daftar', 'Registration failed. Please try again.');
        }

        $data = $request->all();
        $data = $request->except('_token');
        $data['password'] = Hash::make($data['password']);

        // Simpan data jika validasi berhasil
        DB::table('users')->insert($data);

        return redirect('/auth')->with('pesan_buat_akun', 'Your account has been created! Please log in.');
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
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
