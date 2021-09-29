<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jadwalmapel;
use App\Models\Mapel;
use App\Models\Kelas;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwalmapels = Jadwalmapel::latest()->paginate(5);
        return view('jadwalmapel.index', compact('jadwalmapels'));
    }
    public function create()
{
       return view('jadwalmapel.create', [ 'gurutb' => Guru::all() ],[ 'kelastb' => Kelas::all() ]);
}

public function store(Request $request)
{
    $this->validate($request, [
        'waktu'     => 'required',
        'hari'     => 'required',
        'mapel'     => 'required',
        'guru'     => 'required',
        'kelas'     => 'required',
        'ruangan'     => 'required',

    ]);

    $jadwalmapel = Jadwalmapel::create([
        'waktu'     => $request->waktu,
        'hari'     => $request->hari,
        'mapel'     => $request->mapel,
        'guru'     => $request->guru,
        'kelas'     => $request->kelas,
        'ruangan'     => $request->ruangan,
    ]);
 if($jadwalmapel){
        //redirect dengan pesan sukses
        return redirect()->route('jadwalmapel.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('jadwalmapel.index')->with(['error' => 'Data Gagal Disimpan!']);
    }
}


public function edit(Jadwalmapel $jadwalmapel)
{

    return view('jadwalmapel.edit',  [ 'gurutb' => Guru::all(),'kelastb' => Kelas::all(),'jadwalmapel'=>$jadwalmapel]);
}

public function update(Request $request, Jadwalmapel $jadwalmapel)
{
       $this->validate($request, [
        'namamapel'     => 'required',
        'namaguru_id'     => 'required',
        'kelas_id'     => 'required',
        'hari'     => 'required',
        'jammasuk'     => 'required',
        'jamkeluar'     => 'required',
    ]);

    //get data kelas by ID
    $jadwalmapel = Jadwalmapel::findOrFail($jadwalmapel->id);

    if($request->namamapel == $jadwalmapel->namamapel) { 
        $jadwalmapel->update([
        'namaguru_id'     => $request->namaguru_id,
        'kelas_id'     => $request->kelas_id,
        'hari'     => $request->hari,
        'jammasuk'     => $request->jammasuk,
        'jamkeluar'     => $request->jamkeluar,
    ]);
    
    }
    else if($request->hari == $jadwalmapel->hari) { 
        $jadwalmapel->update([
        'namamapel'     => $request->namamapel,
        'namaguru_id'     => $request->namaguru_id,
        'kelas_id'     => $request->kelas_id,
        'jammasuk'     => $request->jammasuk,
        'jamkeluar'     => $request->jamkeluar,
        ]);

    }else{
      $jadwalmapel->update([
        'namamapel'     => $request->namamapel,
        'namaguru_id'     => $request->namaguru_id,
        'kelas_id'     => $request->kelas_id,
        'hari'     => $request->hari,
        'jammasuk'     => $request->jammasuk,
        'jamkeluar'     => $request->jamkeluar,
    ]);
    }
    if($jadwalmapel){
        //redirect dengan pesan sukses
        return redirect()->route('jadwalmapel.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('jadwalmapel.index')->with(['error' => 'Data Gagal Diupdate!']);
    }
}
public function destroy($id)
{
  $jadwalmapel = Jadwalmapel::findOrFail($id);
  $jadwalmapel->delete();

  if($jadwalmapel){
     //redirect dengan pesan sukses
     return redirect()->route('jadwalmapel.index')->with(['success' => 'Data Berhasil Dihapus!']);
  }else{
    //redirect dengan pesan error
    return redirect()->route('jadwalmapel.index')->with(['error' => 'Data Gagal Dihapus!']);
  }
}
public function show(Jadwalmapel $jadwalmapel)
{
    return view('jadwalmapel.show',compact('jadwalmapel'));
}
}
