<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class ProfileController extends Controller
{
public function index()
    {
        return view('profile.index');
    }
public function edit(Siswa $siswa)
{
    return view('profile.edit', [ 'kelastb' => Kelas::all() ],compact('siswa'));
}

public function update(Request $request, Siswa $siswa)
{
    $this->validate($request, [
        'namasiswa'     => 'required',
        'nisn'     => 'required',
        'kelas_id'     => 'required',
        'email'     => 'required',
    ]);

    //get data siswa by ID
    $siswa = Siswa::findOrFail($siswa->id);

    if($request->file('foto') == "" && $request->password == $siswa->password) {

        $siswa->update([
        'namasiswa'     => $request->namasiswa,
        'nisn'     => $request->nisn,
        'kelas_id'     => $request->kelas_id,
        'email'     => $request->email,
        ]);

    } else if($request->file('foto') == "" ) {

            $siswa->update([
            'namasiswa'     => $request->namasiswa,
            'nisn'     => $request->nisn,
            'kelas_id'     => $request->kelas_id,
            'email'     => $request->email,
            'password' => Hash::make($request->password)
            ]);

    } else if($request->password == $siswa->password) {

        Storage::disk('local')->delete('public/siswas/'.$siswa->foto);

        //upload new image
        $foto = $request->file('foto');
        $foto->storeAs('public/siswas', $foto->hashName());

            $siswa->update([
            'namasiswa'     => $request->namasiswa,
            'nisn'     => $request->nisn,
            'kelas_id'     => $request->kelas_id,
            'foto'     => $foto->hashName(),
            'email'     => $request->email,
            ]);

} else {

        //hapus old image
        Storage::disk('local')->delete('public/siswas/'.$siswa->foto);

        //upload new image
        $foto = $request->file('foto');
        $foto->storeAs('public/siswas', $foto->hashName());

        $siswa->update([
            'namasiswa'     => $request->namasiswa,
            'nisn'     => $request->nisn,
            'kelas_id'     => $request->kelas_id,
            'foto'     => $foto->hashName(),
            'email'     => $request->email,
            'password'   => Hash::make($request->password)
        ]);

    }
    if($siswa){
        //redirect dengan pesan sukses
        return redirect()->route('profile.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('profile.index')->with(['error' => 'Data Gagal Diupdate!']);
    }
}
}