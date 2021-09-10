<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class KelasController extends Controller
{
public function index()
    {
        $kelastbs = Kelas::latest()->paginate(5);
        return view('kelas.index', compact('kelastbs'));
    }
    public function create()
{
    $walas = Guru::where('role', 'walas')->get();
    return view('kelas.create', compact('walas'));
}

public function store(Request $request)
{
    $this->validate($request, [
        'name'     => 'required',
        'walas_id'     => 'required',
    ]);

    $kelas = Kelas::create([
        'name'     => $request->name,
        'walas_id'     => $request->walas_id,
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
     $walas = Guru::where('role', 'walas')->get();
     return view('kelas.edit', compact('walas', 'kela'));
}

public function update(Request $request, Kelas $kela)
{
    $this->validate($request, [
        'name'     => 'required',
        'walas_id'     => 'required',
    ]);

    //get data kelas by ID
    $kela = Kelas::findOrFail($kela->id);

     if($request->name == $kela->name) { 
                $kela->update([
                'walas_id'     => $request->walas_id,
                ]);
    
    }else {
            
        $kela->update([
            'name'     => $request->name,
            'walas_id'     => $request->walas_id,
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
  Siswa::where('kelas_id', $id)->delete();
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
