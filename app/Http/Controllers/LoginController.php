<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\guru;
// use Barryvdh\DomPDF\PDF;
use App\Models\ppdb;
use App\Models\murid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        //VALIDASI DATA YANG DITERIMA
        $this->validate($request, [
            'username' => 'required|exists:pengguna,username',
            'password' => 'required|string'
        ]);

        //CUKUP MENGAMBIL EMAIL DAN PASSWORD SAJA DARI REQUEST
        //KARENA JUGA DISERTAKAN TOKEN
        $auth = $request->only('username', 'password');

        //CHECK UNTUK PROSES OTENTIKASI
        //DARI GUARD siam, KITA ATTEMPT PROSESNYA DARI DATA $AUTH
        if (auth()->attempt($auth)) {
            //JIKA BERHASIL MAKA AKAN DIREDIRECT KE DASHBOARD
            $role = auth()->user()->role;
            if($role=='guru'){
                $nik=auth()->user()->username;
                $guru=guru::where('nik',$nik)->first();
                session(['id_guru'=>$guru->id,'nama'=>$guru->nama]);
            }
            if($role=='murid'){
                $nis=auth()->user()->username;
                $murid=murid::where('nis',$nis)->first();
                session(['id_murid'=>$murid->id,'nama'=>$murid->nama]);
            }
            if($role=='TU'){
                session(['nama'=>'Admin']);
            }
            if($role=='calon'){
                $ppdb=ppdb::where('nisn',auth()->user()->username)->first();
                session(['nisn'=>$request->username,'nama'=>$ppdb->nama]);
                return view('siam.dashboard');

            }
            return redirect()->intended(route('siam.dashboard'));
        }
        //JIKA GAGAL MAKA REDIRECT KEMBALI BERSERTA NOTIFIKASI
        return redirect()->back()->with(['error' => 'Username / Password Salah']);
    }
    public function loginForm(){
        if (auth()->check()) return redirect(route('siam.dashboard'));
        return view('auth/login');
    }
    public function dashboard(){
        return view('siam/dashboard');
    }
    public function profileForm(){
        return view('siam/profile');
    }
    public function logout(){
        auth()->logout();
        session()->flush();
        return redirect(route('landing'));
    }
    public function pdf(){
        // $pdf = PDF::loadView('siam.nilai.pdf');
        // return $pdf->stream();
        return view('siam.nilai.pdf');
    }
}
