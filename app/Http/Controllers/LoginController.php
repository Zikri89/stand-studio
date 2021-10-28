<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function check_login(Request $request)
    {
        $email      = $request->input('email');
        $password   = $request->input('password');
        
        if(Auth::guard('web')->attempt(['email' => $email, 'password' => $password])) {
            $request->session()->regenerate();
            return response()->json([
                'success' => true,
                'message' => 'Login Successfully!'
            ], 200);
        } else {
            $isExists = User::where('email',$email)->first();
            if(!$isExists){
                return response()->json([
                    'success' => false,
                    'message' => 'Email Tidak Terdaftar!'
                ], 401);
            }else{
                return response()->json([
                    'success' => false,
                    'message' => 'Login Gagal, mohon periksa kembali email dan password anda!'
                ], 401);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        Session::flush();
        return redirect('login')->with('alert','Kamu sudah logout');
    }
}
