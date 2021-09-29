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
    $bk = Guru::all()->where('role', 'bk');
    $walas = Guru::all();
    return view('kelas.create', compact('bk', 'walas'));
}

public function store(Request $request)
{
    $this->validate($request, [
        'angkatan'     => 'required',
        'name'     => 'required',
        'walas_id'     => 'required',
        'bk'     => 'required',
    ]);

    date_default_timezone_set('Asia/Jakarta');
    $tahun = date('Y');
    $tahun1 = date('Y', strtotime('+1 year', strtotime($tahun)));

    $kelas = Kelas::create([
        'angkatan'     => $request->angkatan,
        'name'     => $request->name,
        'walas'     => $request->walas_id,
        'bk'     => $request->bk,
        'tahun'     => $tahun.'/'.$tahun1,
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
        'angkatan'     => 'required',
        'name'     => 'required',
        'walas_id'     => 'required',
        'bk'     => 'required',
    ]);

    //get data kelas by ID
    $kela = Kelas::findOrFail($kela->id);
            
        $kela->update([
            'angkatan'     => $request->angkatan,
            'name'     => $request->name,
            'walas'     => $request->walas_id,
            'bk'     => $request->bk,
        ]);


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
