<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // mengambil data user berdasarkan yang login
        $data = Auth::user();
        // mengirim data ke view
        return view('backend.profile',compact('data'));
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
        // validasi data
        $request->validate([
            'nama' => 'required|string',
            'username' =>  ['required','regex:/^\S*$/u',Rule::unique('users')->ignore($id)],
        ]);

        // cek jika password lama atau baru tidak kosong
        if($request->password_lama || $request->password_baru){
            // validasi password lama,baru,dan konfirmasi pasword
            $request->validate([
                'password_lama' => 'required|min:8',
                'password_baru' => 'required|same:konfirmasi_password|min:8',
                'konfirmasi_password' => 'required|min:8',
            ]);
            // cek apakah password lama sama dengan password yang ada di database
            if(Hash::check($request->password_lama,Auth::user()->password)){
                // jika sama,maka update password
                User::where('id',$id)->update([
                    'password' => Hash::make($request->password_baru),
                ]);
                // jika tidak sama,maka redirect ke halaman profile dan tampilkan pesan error
            }else{
                return redirect('/profil')->with('gagal',"Profil $request->nama gagal diubah.! Password yang anda masukkan salah.");
            }
        }
        // update data user
        User::where('id',$id)->update([
            'nama' => $request->nama,
            'username' => $request->username,
        ]);
        // redirect ke halaman profile dan tampilkan pesan sukses
        return redirect('/profil')->with('sukses',"Profil $request->nama berhasil diubah.!");
    }

    public function updateFotoProfile(Request $request, $id)
    {
        // validasi foto profile
        $request->validate([
            'foto_profil' => 'file|image|required',
        ]);
        // upload file foto profile
        $file = $request->file('foto_profil')->store('foto-profil');
        // menghapus file foto profile yang lama
        Storage::delete(Auth::user()->foto_profil);
        // update foto profile ke database
        User::where('id',$id)->update([
            'foto_profil' => $file,
        ]);
        // redirect ke halaman profile dan tampilkan pesan sukses
        return redirect('/profil')->with('sukses',"Foto profil berhasil diubah.!");

    }

}
