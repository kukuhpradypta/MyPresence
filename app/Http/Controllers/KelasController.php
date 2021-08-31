<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class KelasController extends Controller
{
     public function index()
    {
        $kelastbs = Kelas::latest()->paginate(10);
        return view('kelas.index', compact('kelastbs'));
    }

    public function create()
{
    return view('kelas.create');
}

public function store(Request $request)
{
    $this->validate($request, [
        'name'     => 'required',
        'walas'     => 'required',
    ]);

    $kelas = Kelas::create([
        'name'     => $request->name,
        'walas'     => $request->walas,
    ]);
 if($kelas){
        //redirect dengan pesan sukses
        return redirect()->route('kelas.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('kelas.index')->with(['error' => 'Data Gagal Disimpan!']);
    }
}
public function edit(Kelas $kela)
{
    return view('kelas.edit', compact('kela'));
}

public function update(Request $request, Kelas $kela)
{
    $this->validate($request, [
        'name'     => 'required',
        'walas'     => 'required',
    ]);

    //get data kelas by ID
    $kela = Kelas::findOrFail($kela->id);

     if($request->name == $kela->name) { 
                $kela->update([
                'walas'     => $request->walas,
                ]);
    
    }else {
            
        $kela->update([
            'name'     => $request->name,
            'walas'     => $request->walas,
        ]);

    }
    if($kela){
        //redirect dengan pesan sukses
        return redirect()->route('kelas.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('kelas.index')->with(['error' => 'Data Gagal Diupdate!']);
    }
}
public function destroy($id)
{
  $kelas = Kelas::findOrFail($id);
  $kelas->delete();

  if($kelas){
     //redirect dengan pesan sukses
     return redirect()->route('kelas.index')->with(['success' => 'Data Berhasil Dihapus!']);
  }else{
    //redirect dengan pesan error
    return redirect()->route('kelas.index')->with(['error' => 'Data Gagal Dihapus!']);
  }
}
public function show(Kelas $kela)
{
   return view('kelas.show',compact('kela'),['siswa'=>$kela->siswa]);
}
}
