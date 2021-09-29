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
        'namaguru'     => 'required',
        'role'     => 'required',
        'username'     => 'required',
        'email'     => 'required|email',
        'password'   => 'required'
    ]);

    //upload foto

    $guru = Guru::create([
        'nign'     => '312341',
        'namaguru'  => $request->namaguru,
        'role'     => $request->role,
        'Foto'     => 'default.png',
        'username'     => $request->username,
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
        'nuptk'     => 'required',
        'namaguru'     => 'required',
        'role'     => 'required',
        'email'     => 'required|email',
    ]);

    //get data guru by ID
    $guru = Guru::findOrFail($guru->id);

    if($request->password == $guru->password) {

        $guru->update([
        'namaguru'     => $request->namaguru,
        'nuptk'     => $request->nuptk,
        'role'     => $request->role,
        'mapel'     => $request->mapel,
        'email'     => $request->email,
        ]);
    
    }else {

        $guru->update([
            'namaguru'     => $request->namaguru,
            'nuptk'     => $request->nuptk,
            'role'     => $request->role,
            'mapel'     => $request->mapel,
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
