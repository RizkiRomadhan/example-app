<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth/login');
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\LoginRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials, $request->input('remember_me'))) {
            $request->session()->regenerate();

            $user = Auth::user();
            switch (Auth::user()->role) {
                case 'admin':
                    return redirect(RouteServiceProvider::ADMIN);
                case 'mahasiswa':
                    session(['nidn_dosen_1'=>$user->nidn_dosen_1, 'nidn_dosen_2'=>$user->nidn_dosen_2]);
                    return redirect(RouteServiceProvider::MAHASISWA);
                case 'pembimbing':
                    return redirect(RouteServiceProvider::PEMBIMBING);
                case 'koordinator':
                    return redirect(RouteServiceProvider::KOORDINATOR);
                case 'penguji':
                    return redirect(RouteServiceProvider::PENGUJI);
                case 'laboran':
                    return redirect(RouteServiceProvider::LABORAN);
            }
        }

        return back()->withInput()
            ->withErrors(['email' => 'The provided credentials do not match our records.']);
    }


    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \App\Http\Requests\LoginRequest  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(LoginRequest $request)
    // {
    //     $role = $request->role;
    //     $credentials = $request->only(['email', 'password']);

    //     if (Auth::attempt($credentials, $request->remember_me)) {
            
    //         $userRole = Auth::user()->role;
            
    //         if ($role == $userRole) {
    //             if ($userRole == 'admin') {
    //                 // buat sesi login
    //                 $request->session()->regenerate();

    //                 return redirect(RouteServiceProvider::ADMIN);
    //             } else if ($userRole == 'mahasiswa') {
    //                 $request->session()->regenerate();

    //                 return redirect(RouteServiceProvider::MAHASISWA);
    //             } else if ($userRole == 'pembimbing') {
    //                 $request->session()->regenerate();

    //                 return redirect(RouteServiceProvider::PEMBIMBING);

    //             } else if ($userRole == 'koordinator') {
    //                 $request->session()->regenerate();

    //                 return redirect(RouteServiceProvider::KOORDINATOR);

    //             } else if ($userRole == 'penguji') {
    //                 $request->session()->regenerate();

    //                 return redirect(RouteServiceProvider::PENGUJI);

    //             } else if ($userRole == 'laboran') {
    //                 $request->session()->regenerate();

    //                 return redirect(RouteServiceProvider::LABORAN);


    //             } else {
    //                 // role tidak dikenal
    //                 return back()->withInput()
    //         ->withErrors(['role' => 'The provided credentials do not match our records.']);
    //             }
    //         }
    //         // tidak sesuai role
    //         return back()->withInput()->withErrors(['role' => 'The provided credentials do not match our records.']);
    //     }
    //     return back()->withInput()
    //         ->withErrors(['email' => 'The provided credentials do not match our records.']);
    // }

    public function logout(Request $request) {
        $token = $request["_token"];
        Auth::logout($token);
        return redirect(route('login'));
    }
}
