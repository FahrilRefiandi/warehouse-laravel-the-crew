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
        $data = Auth::user();
        // dd($data);
        return view('backend.profile',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $request->validate([
            'nama' => 'required|string',
            'username' =>  ['required','regex:/^\S*$/u',Rule::unique('users')->ignore($id)],
        ]);

        if($request->password_lama || $request->password_baru){
            $request->validate([
                'password_lama' => 'required|min:8',
                'password_baru' => 'required|same:konfirmasi_password|min:8',
                'konfirmasi_password' => 'required|min:8',
            ]);

            if(Hash::check($request->password_lama,Auth::user()->password)){
                User::where('id',$id)->update([
                    'password' => Hash::make($request->password_baru),
                ]);
            }else{
                return redirect('/profil')->with('gagal',"Profil $request->nama gagal diubah.! Password yang anda masukkan salah.");
            }
        }

        User::where('id',$id)->update([
            'nama' => $request->nama,
            'username' => $request->username,
        ]);

    return redirect('/profil')->with('sukses',"Profil $request->nama berhasil diubah.!");
    }

    public function updateFotoProfile(Request $request, $id)
    {
        $request->validate([
            'foto_profil' => 'file|image|required',
        ]);

        $file = $request->file('foto_profil')->store('foto-profil');
        Storage::delete(Auth::user()->foto_profil);
        User::where('id',$id)->update([
            'foto_profil' => $file,
        ]);

        return redirect('/profil')->with('sukses',"Foto profil berhasil diubah.!");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
