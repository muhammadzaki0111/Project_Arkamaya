<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login.login',['title'=>'Login','active'=>'login']);

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function __construct()
    {
        $this->middleware('auth.redirect')->except(['index', 'authenticate']);
    }

    public function authenticate(Request $request)
    {
        $this->middleware('auth.redirect');

        $validate = $request->validate(
            [
                'email' => 'required',
                'password'=>'required'
            ]
        );

        // cek jika sudah berhasil login
        if (Auth::attempt($validate)) {
            $request->session()->regenerate();
            //direct ke halaman admin
            return redirect('/');
        }
        //jika gagal login
        return back()->with('loginError','Login gagal, Periksa kembali email dan Password');
    }
}
