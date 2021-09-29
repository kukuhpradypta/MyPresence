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

        $siswa = Siswa::all()->where('no_kartu', $no_kartu);
        $absensi = Absensi::all()->where('siswa', $siswa->nipd)
                                ->where('hari', $hari)
                                ->where('tanggal', $tanggal)
                                ->where('bulan', $bulan)
                                ->where('tahun', $tahun);

        if( $absensi->count() ) {
            $update = Absensi::where('siswa', $siswa->nipd)->update([
                'jamkeluar'     => $jam,
            ]);
            if($update){
                //redirect dengan pesan sukses
                return redirect()->route('blog.index')->with(['success' => 'Data Berhasil Diupdate!']);
            }else{
                //redirect dengan pesan error
                return redirect()->route('blog.index')->with(['error' => 'Data Gagal Diupdate!']);
            }
        } elseif ( $siswa->count() ) {
            $jadwal = Jadwalmapel::all()->where('kelas', $siswa->kelas)
                            ->where('hari', $hari)->first();
            $jadwal1 = Jadwalmapel::all()->where('kelas', $siswa->kelas)
                            ->where('hari', $hari);
            $mapel = Mapel::all()->where('name', $jadwal1->mapel);
            if ( $jam > $jadwal->awal ) {
                $absensi = Absensi::create([
                    'siswa' => $siswa->nipd,
                    'kelas' => $siswa->kelas,
                    'absen' => $hadir,
                    'keterangan' => 'Telat',
                    'hari' => $hari,
                    'tanggal' => $tanggal,
                    'bulan' => $bulan,
                    'tahun' => $tahun,
                    'jam_masuk' => $jam
                ]);

                $absensi = AbsensiMapel::create([
                    'siswa' => $siswa->nipd,
                    'kelas' => $siswa->kelas,
                    'mapel' => $mapel->name,
                    'absen' => $hadir,
                    'hari' => $hari,
                    'tanggal' => $tanggal,
                    'bulan' => $bulan,
                    'tahun' => $tahun,
                ]);

                if($absensi){
                    //redirect dengan pesan sukses
                    return redirect()->route('absensi.offline')->with(['success' => 'Data Berhasil Disimpan!']);
                }else{
                    //redirect dengan pesan error
                    return redirect()->route('absensi.offline')->with(['error' => 'Data Gagal Disimpan!']);
                }
            } else {
                $absensi = Absensi::create([
                    'siswa' => $siswa->nipd,
                    'kelas' => $siswa->kelas,
                    'absen' => $hadir,
                    'keterangan' => 'Tepat Waktu',
                    'hari' => $hari,
                    'tanggal' => $tanggal,
                    'bulan' => $bulan,
                    'tahun' => $tahun,
                    'jam_masuk' => $jam
                ]);

                $absensi = AbsensiMapel::create([
                    'siswa' => $siswa->nipd,
                    'kelas' => $siswa->kelas,
                    'mapel' => $mapel->name,
                    'absen' => $hadir,
                    'hari' => $hari,
                    'tanggal' => $tanggal,
                    'bulan' => $bulan,
                    'tahun' => $tahun,
                ]);
                if($absensi){
                    //redirect dengan pesan sukses
                    return redirect()->route('absensi.offline')->with(['success' => 'Data Berhasil Disimpan!']);
                }else{
                    //redirect dengan pesan error
                    return redirect()->route('absensi.offline')->with(['error' => 'Data Gagal Disimpan!']);
                }
            }
        } else{
            return redirect()->route('absensi.offline')->with(['gagal' => 'Maaf! Akun ini tidak ketemu']);

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
