<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
     public function index()
    {
        $siswas = Siswa::latest()->paginate(10);
        return view('siswa.index', compact('siswas'));
    }

    public function create()
{
    return view('siswa.create');
}

public function store(Request $request)
{
    $this->validate($request, [
        'namasiswa'     => 'required',
        'nisn'     => 'required',
        'kelas'     => 'required',
        'foto'     => 'required|image|mimes:png,jpg,jpeg',
        'email'     => 'required',
        'password'   => 'required'
    ]);

    //upload foto
    $foto = $request->file('foto');
    $foto->storeAs('public/siswas', $foto->hashName());

    $siswa = Siswa::create([
        'namasiswa'     => $request->namasiswa,
        'nisn'     => $request->nisn,
        'kelas'     => $request->kelas,
        'foto'     => $foto->hashName(),
        'email'     => $request->email,
        'password' => Hash::make($request->password)
    ]);
 if($siswa){
        //redirect dengan pesan sukses
        return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('siswa.index')->with(['error' => 'Data Gagal Disimpan!']);
    }
}
public function edit(Siswa $siswa)
{
    return view('siswa.edit', compact('siswa'));
}

public function update(Request $request, Siswa $siswa)
{
    $this->validate($request, [
        'namasiswa'     => 'required',
        'nisn'     => 'required',
        'kelas'     => 'required',
        'email'     => 'required',
    ]);

    //get data siswa by ID
    $siswa = Siswa::findOrFail($siswa->id);

    if($request->file('foto') == "" && $request->password == $siswa->password) {

        $siswa->update([
        'namasiswa'     => $request->namasiswa,
        'nisn'     => $request->nisn,
        'kelas'     => $request->kelas,
        'email'     => $request->email,
        ]);

    } else if($request->file('foto') == "" ) {

            $siswa->update([
            'namasiswa'     => $request->namasiswa,
            'nisn'     => $request->nisn,
            'kelas'     => $request->kelas,
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
            'kelas'     => $request->kelas,
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
            'kelas'     => $request->kelas,
            'foto'     => $foto->hashName(),
            'email'     => $request->email,
            'password'   => Hash::make($request->password)
        ]);

    }
    if($siswa){
        //redirect dengan pesan sukses
        return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('siswa.index')->with(['error' => 'Data Gagal Diupdate!']);
    }
}
public function destroy($id)
{
  $siswa = Siswa::findOrFail($id);
  Storage::disk('local')->delete('public/siswas/'.$siswa->image);
  $siswa->delete();

  if($siswa){
     //redirect dengan pesan sukses
     return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Dihapus!']);
  }else{
    //redirect dengan pesan error
    return redirect()->route('siswa.index')->with(['error' => 'Data Gagal Dihapus!']);
  }
}
public function show(Siswa $siswa)
{
    return view('siswa.show',compact('siswa'));
}
}
