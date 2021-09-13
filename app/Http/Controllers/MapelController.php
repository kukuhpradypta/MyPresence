<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Jadwalmapel;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class MapelController extends Controller
{
    public function index()
    {
        if (Str::length(Auth::guard('siswa')->user())>0) {
            # code...
            $mapels = Mapel::latest()->where('kelas_id', Auth::guard('siswa')->user()->kelas->name)->paginate(5);
        } else {
            $mapels = Mapel::latest()->paginate(5);
        }
        return view('mapel.index', compact('mapels'));
    }
    public function create()
{
    return view('mapel.create',[ 'kelastb' => Kelas::all() ]);
}

public function store(Request $request)
{
    $this->validate($request, [
        'kelas_id'     => 'required',
    ]);

    $mapel = Mapel::create([
        'kelas_id'     => $request->kelas_id,
    ]);
 if($mapel){
        //redirect dengan pesan sukses
        return redirect()->route('mapel.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('mapel.index')->with(['error' => 'Data Gagal Disimpan!']);
    }
}


public function edit(Mapel $mapel)
{
     return view('mapel.edit',  ['kelastb' => Kelas::all(),'mapel'=>$mapel]);
}

public function update(Request $request, Mapel $mapel)
{
    $this->validate($request, [
        'kelas_id'     => 'required',
    ]);

    //get data kelas by ID
    $mapel = Mapel::findOrFail($mapel->id);

     if($request->kelas_id == $mapel->kelas_id) { 
                $kela->update([
                    '',
                ]);
    
    }else {       
        $mapel->update([
            'kelas_id'     => $request->kelas_id,
        ]);

    }
    if($mapel){
        //redirect dengan pesan sukses
        return redirect()->route('mapel.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('mapel.index')->with(['error' => 'Data Gagal Diupdate!']);
    }
}
public function destroy($id)
{
  Jadwalmapel::where('kelas_id', $id)->delete();
  $mapel = Mapel::findOrFail($id);
  $mapel->delete();

  if($mapel){
     //redirect dengan pesan sukses
     return redirect()->route('mapel.index')->with(['success' => 'Data Berhasil Dihapus!']);
  }else{
    //redirect dengan pesan error
    return redirect()->route('mapel.index')->with(['error' => 'Data Gagal Dihapus!']);
  }
}
public function show(Mapel $mapel)
{
    $jadwalmapel = Jadwalmapel::all()->where('kelas_id', $mapel->kelas_id);
   return view('mapel.show',compact('jadwalmapel'));
}
}
