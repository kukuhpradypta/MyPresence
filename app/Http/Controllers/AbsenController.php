<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\AbsensiMapel;
use App\Models\Jadwalmapel;
use App\Models\Jam;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Mapel;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        if ( Str::length(Auth::guard('guru')->user())>0 ) {
            if ( Auth::guard('guru')->user()->role = 'guru' ) {
                $hari = Carbon::now()->isoFormat('dddd');
                $mapel = Jadwalmapel::all()->where('guru', Auth::guard('guru')->user()->namaguru)
                                            ->where('hari', $hari);
                $kelas = Kelas::all()->where('name', $mapel->kelas);
                $absen  = Siswa::all()->where('kelas', $id);
                return view('absensi.rekap', compact('absen', 'kelas'));
            } elseif ( Auth::guard('guru')->user()->role = 'walas'|| Auth::guard('guru')->user()->role = 'bk' ) {
                $kelas = Kelas::all()->where('name', Auth::guard('guru')->user());
                $absen  = Siswa::all()->where('kelas', $id);
                return view('absensi.rekap', compact('absen'));
            } else {
                $kelas = Kelas::all();
                $absen  = Siswa::all()->where('kelas', $id);
                return view('absensi.rekap', compact('absen', 'kelas'));
            }
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if ( Auth::guard('siswa')->check() ) {
            return view('absensi.online');
        } elseif ( Auth::guard('guru')->user()->role = 'kurikulum' ){
            return view('absensi.offline');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hari = Carbon::now()->isoFormat('dddd');
        $tanggal = Carbon::now()->isoFormat('D');
        $bulan = Carbon::now()->isoFormat('MMMM');
        $tahun = Carbon::now()->isoFormat('Y');
        $jam = Carbon::now()->isoFormat('h:mm:ss');

        $no_kartu = $request->no_kartu;

        $siswa = Siswa::all()->where('no_kartu', $no_kartu)->first();
        $absensi = Absensi::all()->where('siswa', $no_kartu)
                                ->where('hari', $hari)
                                ->where('tanggal', $tanggal)
                                ->where('bulan', $bulan)
                                ->where('tahun', $tahun);
        if( $absensi->count() ) {
            $update = Absensi::where('siswa', $no_kartu)->update([
                'jamkeluar'     => $jam,
            ]);
            if($update){
                //redirect dengan pesan sukses
                return redirect()->route('absen.create')->with(['success' => 'Data Berhasil Diupdate!']);
            }else{
                //redirect dengan pesan error
                return redirect()->route('absen.create')->with(['error' => 'Data Gagal Diupdate!']);
            }
        } elseif ( $siswa->count() ) {
                $absensi = Absensi::create([
                    'siswa' => $no_kartu,
                    'kelas' => $siswa->kelas->name,
                    'absen' => 'hadir',
                    'keterangan' => 'Telat',
                    'hari' => $hari,
                    'tanggal' => $tanggal,
                    'bulan' => $bulan,
                    'tahun' => $tahun,
                    'jam_masuk' => $jam,
                    'jam_pulang' => $jam
                ]);

                if($absensi){
                    //redirect dengan pesan sukses
                    return redirect()->route('absen.create')->with(['success' => 'Data Berhasil Disimpan!']);
                }else{
                    //redirect dengan pesan error
                    return redirect()->route('absen.create')->with(['error' => 'Data Gagal Disimpan!']);
                }
        } else{
            return redirect()->route('absen.create')->with(['gagal' => 'Maaf! Akun ini tidak ketemu']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
