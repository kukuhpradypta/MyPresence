@extends('template.template')

@section('content')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data jadwalmapel</h6>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('jadwalmapel.create') }}" class="btn btn-primary btn-icon-split mb-3">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                        <span class="text">Tambah Data Pelajaran</span>
                                    </a>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th scope="col">NO</th>
                                            <th scope="col">Nama Mapel</th>
                                            <th scope="col">Nama Guru</th>
                                            <th scope="col">Kelas</th>
                                            <th scope="col">Hari</th>
                                            <th scope="col">Jam Masuk</th>
                                            <th scope="col">Jam Keluar</th>
                                            <th scope="col">AKSI</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th scope="col">NO</th>
                                            <th scope="col">Nama Mapel</th>
                                            <th scope="col">Nama Guru</th>
                                            <th scope="col">Kelas</th>
                                            <th scope="col">Foto</th>
                                            <th scope="col">Jam Masuk</th>
                                            <th scope="col">Jam Keluar</th>
                                            <th scope="col">AKSI</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                          @forelse ($jadwalmapels as $jadwalmapel)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{ $jadwalmapel->namamapel }}</td>
                                                <td>{{ $jadwalmapel->namaguru_id }}</td>
                                                <td>{{ $jadwalmapel->kelas_id}}</td>
                                                <td>{{ $jadwalmapel->hari}}</td>
                                                <td>{{ $jadwalmapel->jammasuk }}</td>
                                                <td>{{ $jadwalmapel->jamkeluar }}</td>
                                                <td class="text-center">
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('jadwalmapel.destroy', $jadwalmapel->id) }}" method="POST">
                                                        <a href="{{ route('jadwalmapel.edit', $jadwalmapel->id) }}" class="btn btn-sm btn-circle btn-primary"><i class="fas fa-edit"></i></a>
                        
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-circle btn-danger"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <div class="alert alert-danger">
                                                Data pelajaran belum Tersedia.
                                            </div>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>



            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>
@endsection
