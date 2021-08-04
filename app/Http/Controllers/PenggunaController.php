<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Imports\UserImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenggunaController extends Controller
{
    public function index(){
        return view('siam/user/user');
    }
    public function import(Request $request){
        $file = $request->file('file')->store('import');
        $import = new UserImport;
        $import->import($file);
        // dd($import->failures());
        if ($import->failures()->isNotEmpty()) {
            return back()->withFailures($import->failures());
        }
        return back()->withStatus('Import berhasil');
    }
    public function download(){
        $filename='user.xlsx';
        return response()->download(storage_path('app/public/' . $filename),'template.xlsx');
    }
    public function create(){
        return view('siam/user/create');
    }
    public function store(Request $request){
        $this->validate($request, [
            'username' => 'required|string|unique:pengguna,username',
            'password' => 'required|string',
            'role'     => 'required|in:TU,guru,murid'
        ]);

        $user = pengguna::where('username',$request->username)->exists();
        if($user){
            return redirect()->back()->with(['error' => 'Username sudah ada']);
        }
        $pengguna = pengguna::create([
            'username' => $request->username,
            'password' => $request->password,
            'role' => $request->role,
        ]);
        return redirect(route('siam.user'))->with(['success' => 'User Baru Ditambahkan']);
    }

    public function edit($id){
        $user = pengguna::find($id);
        // return response()->json(['data' => $user]);
        return view('siam/user/edit', compact('user'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'role'     => 'required'
        ]);
        $user = pengguna::find($id);
        if($request->password == ''){
            $user->update([
                'role' => $request->role
            ]);
            return redirect(route('siam.user'))->with(['success' => 'User berhasil diperbaharui']);
        }

        $user->update([
            'password' => $request->password,
            'role' => $request->role
        ]);
        return redirect(route('siam.user'))->with(['success' => 'User berhasil diperbaharui']);

    }

    public function delete($id){
        $user = pengguna::find($id);
        $user->delete();
        return redirect(route('siam.user'))->with(['success' => 'User berhasil dihapus']);
    }

    public function profileForm(){
        return view('siam/profile');
    }

    public function profileUpdate(Request $request){
        $this->validate($request, [
            'username' => 'required|exists:pengguna,username',
            'password' => 'required|string'
        ]);
        $user = Pengguna::find(auth()->user()->id)->update(['password'=>$request->password]);
        return redirect()->action('PenggunaController@profileForm')->with(['success'=>'Password telah diperbaharui']);
        // $auth = $request->only('username', 'password');
        // if (auth()->attempt($auth)){
        //     $user->update([
        //         'password' => $request->passwordNew
        //     ]);
        //     return redirect(route('siam.profile'))->with(['success' => 'Password telah diperbaharui']);
        // }
        // return redirect()->back()->with(['error' => 'Password Salah']);

    }
}
