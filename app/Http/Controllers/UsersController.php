<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // mengambil data user dan mengurutkan berdasarkan level
        $data = User::orderBy('level','desc')->orderBy('nama','asc')->where('id','!=',Auth::user()->id)->get();
        // kirim ke view users
        return view('backend.users',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // update data user password berdasarkan id
        User::where('id',$id)->update([
            'password' => Hash::make(12345678),
        ]);
        // alihkan halaman ke halaman users dan kirimkan pesan sukses
        return redirect('/users')->with('sukses',"Password $request->nama Berhasil direset.!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req,$id)
    {
        // menghapus data user berdasarkan id
        User::where('id',$id)->delete();
        // alihkan halaman ke halaman users dan tampilkan pesan sukses
        return redirect('/users')->with('sukses',"Pengguna $req->nama Berhasil dihapus.!");
    }
}
