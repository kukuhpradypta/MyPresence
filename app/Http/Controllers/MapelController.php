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
        $mapels = Mapel::latest()->paginate(5);
        return view('mapel.index', compact('mapels'));
    }
    public function create()
    {
        return view('mapel.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required',
        ]);

        $mapel = Mapel::create([
            'name'     => $request->name,
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
        return view('mapel.edit')->compact('mapel');
    }

    public function update(Request $request, Mapel $mapel)
    {
        $this->validate($request, [
            'name'     => 'required',
        ]);

        //get data kelas by ID
        $mapel = Mapel::findOrFail($mapel->id);
        $mapel->update([
            'name'     => $request->name,
        ]);

        if($mapel){
            //redirect dengan pesan sukses
            return redirect()->route('mapel.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('mapel.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    public function destroy(Mapel $mapel)
    {
    Jadwalmapel::where('mapel', $mapel->name)->delete();
    $mapel = Mapel::findOrFail($mapel);
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
        $jadwalmapel = Jadwalmapel::all()->where('mapel', $mapel->name);
        return view('mapel.show',compact('jadwalmapel'));
    }
}
