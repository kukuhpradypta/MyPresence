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


class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::latest()->paginate(5);
        return view('siswa.index', compact('siswas'));
    }

    public function create()
    {
        
        return view('siswa.create', [ 'kelastb' => Kelas::all() ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nisn'      => 'required',
            'nama'      => 'required',
            'kelas_id'  => 'required',
            'email'     => 'required',
            'password'  => 'required',
            'no_kartu'  => 'required'
        ]);

        //upload foto

        $siswa = Siswa::create([
            'nama'     => $request->nama,
            'nisn'     => $request->nisn,
            'kelas_id'     => $request->kelas_id,
            'foto'     => 'default.png',
            'nipd'     => $request->nisn,
            'email'     => $request->email,
            'password' => Hash::make($request->password),
            'no_kartu' => $request->no_kartu,
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
        return view('siswa.edit', [ 'kelastb' => Kelas::all() ],compact('siswa'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        $this->validate($request, [
            'nama'     => 'required',
            'nisn'     => 'required|unique',
            'kelas_id'     => 'required',
            'email'     => 'required',
            'no_kartu'     => 'required',
        ]);

        //get data siswa by ID
        $siswa = Siswa::findOrFail($siswa->id);

        if($request->password == $siswa->password) {

            $siswa->update([
            'nama'     => $request->nama,
            'nisn'     => $request->nisn,
            'kelas_id'     => $request->kelas_id,
            'email'     => $request->email,
            'no_kartu'     => $request->no_kartu,
            ]);

        } else {

            $siswa->update([
                'nama'     => $request->nama,
                'nisn'     => $request->nisn,
                'kelas_id'     => $request->kelas_id,
                'email'     => $request->email,
                'password'   => Hash::make($request->password),
                'no_kartu'   => $request->no_kartu
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

    public function showakun()
    {
        $siswa = Auth::guard('siswa')->user();

        $guru = Auth::guard('guru')->user();

        return view('showakun', ['guru' => $guru, 'siswa' => $siswa]);

    }

    public function editakun(Siswa $siswa)
    {
        return view('editakun');
    }

    public function updateakun(Request $request, Siswa $siswa, Guru $guru)
    {   

    
        $siswaakun = Auth::guard('siswa')->user();

        $guruakun = Auth::guard('guru')->user();

        if (Str::length($siswaakun)>0) {
            $this->validate($request, [
                'nama'     => 'required',
                'email'     => 'required',
            ]);
            $siswaakun1 = Auth::guard('siswa')->user();

        
            //get data siswa by ID
            $siswa = Siswa::where('id', $siswaakun->id);
        
            if($request->file('foto') == "" && $request->password == $siswaakun1->password) {
        
                $siswa->update([
                'nama'     => $request->nama,
                'email'     => $request->email,
                ]);
        
            } else if($request->file('foto') == "" ) {
        
                    $siswa->update([
                    'nama'     => $request->nama,
                    'email'     => $request->email,
                    'password' => Hash::make($request->password)
                    ]);
        
            } else if($request->password == $siswaakun1->password) {
        
                Storage::disk('local')->delete('public/siswas/'.Auth::guard('siswa')->user()->foto);
        
                //upload new image
                $foto = $request->file('foto');
                $foto->storeAs('public/siswas', $foto->hashName());
        
                    $siswa->update([
                    'nama'     => $request->nama,
                    'foto'     => $foto->hashName(),
                    'email'     => $request->email,
                    ]);
        
        } else {
        
                //hapus old image
                Storage::disk('local')->delete('public/siswas/'.Auth::guard('siswa')->user()->foto);
        
                //upload new image
                $foto = $request->file('foto');
                $foto->storeAs('public/siswas', $foto->hashName());
        
                $siswa->update([
                    'nama'     => $request->nama,
                    'foto'     => $foto->hashName(),
                    'email'     => $request->email,
                    'password'   => Hash::make($request->password)
                ]);
        
            }
            if($siswa){
                //redirect dengan pesan sukses
                return redirect()->route('dashboard')->with(['success' => 'Data Berhasil Diupdate!']);
            }else{
                //redirect dengan pesan error¿¿¿¿¿¿¿¿¿¿¿¿¿¿
                return redirect()->route('dashboard')->with(['error' => 'Data Gagal Diupdate!']);
            }
        } else if(Str::length($guruakun)>0){
            $this->validate($request, [
            'nama'     => 'required',
            'email'     => 'required',
            ]);
        $guruakun1 = Auth::guard('guru')->user();


            //get data guru by ID
            $guru = Guru::where('id', $guruakun->id);

            if($request->file('foto') == "" && $request->password == $guruakun1->password) {

                $guru->update([
                'nama'     => $request->nama,
                'email'     => $request->email,
                ]);

            } else if($request->file('foto') == "" ) {

                    $guru->update([
                    'nama'     => $request->nama,
                    'email'     => $request->email,
                    'password' => Hash::make($request->password)
                    ]);

                } else if($request->password == $guruakun1->password) {
            
                    Storage::disk('local')->delete('public/gurus/'.Auth::guard('guru')->user()->foto);
            
                    //upload new image
                    $foto = $request->file('foto');
                    $foto->storeAs('public/gurus', $foto->hashName());
            
                        $guru->update([
                        'nama'     => $request->nama,
                        'foto'     => $foto->hashName(),
                        'email'     => $request->email,
                        ]);
            
            }else {
                    
                //hapus old image
                Storage::disk('local')->delete('public/gurus/'.Auth::guard('guru')->user()->foto);

                //upload new image
                $foto = $request->file('foto');
                $foto->storeAs('public/gurus', $foto->hashName());

                $guru->update([
                    'nama'     => $request->nama,
                    'foto'     => $foto->hashName(),
                    'email'     => $request->email,
                    'password'   => Hash::make($request->password)
                ]);

            }
            if($guru){
                //redirect dengan pesan sukses
                return redirect()->route('dashboard')->with(['success' => 'Data Berhasil Diupdate!']);
            }else{
                //redirect dengan pesan error
                return redirect()->route('dashboard')->with(['error' => 'Data Gagal Diupdate!']);
            }
        }

    }

}