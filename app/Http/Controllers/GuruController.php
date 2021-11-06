<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    public function index()
    {
        $gurus = Guru::latest()->paginate(5);
        return view('guru.index', compact('gurus'));
    }

    public function create()
{
    return view('guru.create');
}

public function store(Request $request)
{
    $this->validate($request, [
        'nama'     => 'required',
        'nomor_induk'     => 'required',
        'role'     => 'required',
        'email'     => 'required',
        'password'   => 'required'
    ]);

    //upload foto

    $guru = Guru::create([
        'nama'     => $request->nama,
        'nomor_induk'     => $request->nomor_induk,
        'role'     => $request->role,
        'foto'     => 'gurus/default.png',
        'email'     => $request->email,
        'password' => Hash::make($request->password)
    ]);
 if($guru){
        //redirect dengan pesan sukses
        return redirect()->route('guru.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('guru.index')->with(['error' => 'Data Gagal Disimpan!']);
    }
}
public function edit(Guru $guru)
{
    return view('guru.edit', compact('guru'));
}

public function update(Request $request, Guru $guru)
{
    $this->validate($request, [
        'nama'     => 'required',
        'nomor_induk'     => 'required',
        'role'     => 'required',
        'email'     => 'required',
    ]);

    //get data guru by ID
    $guru = Guru::findOrFail($guru->id);

    if($request->file('foto') == "" && $request->password == $guru->password) {

        $guru->update([
        'nama'     => $request->nama,
        'nomor_induk'     => $request->nomor_induk,
        'role'     => $request->role,
        'email'     => $request->email,
        ]);

    } else if($request->file('foto') == "" ) {

            $guru->update([
            'namaguru'     => $request->namaguru,
            'nomor_induk'     => $request->nomor_induk,
            'role'     => $request->role,
            'email'     => $request->email,
            'password' => Hash::make($request->password)
            ]);

        } else if($request->password == $guru->password) {
    
            Storage::disk('local')->delete('public/gurus/'.$guru->foto);
    
            //upload new image
            $foto = $request->file('foto');
            $foto->storeAs('public/gurus', $foto->hashName());
    
                $guru->update([
                'namaguru'     => $request->namaguru,
                'nomor_induk'     => $request->nomor_induk,
                'role'     => $request->role,
                'foto'     => $foto->hashName(),
                'email'     => $request->email,
                ]);
    
    } 
    else if($request->role == $guru->role) {
    
            Storage::disk('local')->delete('public/gurus/'.$guru->foto);
    
            //upload new image
            $foto = $request->file('foto');
            $foto->storeAs('public/gurus', $foto->hashName());
    
                $guru->update([
                'namaguru'     => $request->namaguru,
                'nomor_induk'     => $request->nomor_induk,
                'foto'     => $foto->hashName(),
                'email'     => $request->email,
                'password'   => Hash::make($request->password)
                ]);
    
    }else {
            
        //hapus old image
        Storage::disk('local')->delete('public/gurus/'.$guru->foto);

        //upload new image
        $foto = $request->file('foto');
        $foto->storeAs('public/gurus', $foto->hashName());

        $guru->update([
            'namaguru'     => $request->namaguru,
            'nomor_induk'     => $request->nomor_induk,
            'role'     => $request->role,
            'foto'     => $foto->hashName(),
            'email'     => $request->email,
            'password'   => Hash::make($request->password)
        ]);

    }
    if($guru){
        //redirect dengan pesan sukses
        return redirect()->route('guru.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('guru.index')->with(['error' => 'Data Gagal Diupdate!']);
    }
}
public function destroy($id)
{
  $guru = Guru::findOrFail($id);
  Storage::disk('local')->delete('public/gurus/'.$guru->image);
  $guru->delete();

  if($guru){
     //redirect dengan pesan sukses
     return redirect()->route('guru.index')->with(['success' => 'Data Berhasil Dihapus!']);
  }else{
    //redirect dengan pesan error
    return redirect()->route('guru.index')->with(['error' => 'Data Gagal Dihapus!']);
  }
}
public function show(Guru $guru)
{
    return view('guru.show',compact('guru'));
}
 public function search(Request $request)
    {
        $tambah = '';
        $keyword = $request->search;
        $gurus = Guru::where('role', 'like', "%" . $keyword . "%")->paginate(10);
        return view('guru.index', compact('gurus','keyword','tambah'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
