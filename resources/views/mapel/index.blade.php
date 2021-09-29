@extends('template.template')

@section('content')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Jadwal Pelajaran</h6>
        </div>
        <div class="card-body">
            @if (Str::length(Auth::guard('siswa')->user()) > 0)

            @elseif (Str::length(Auth::guard('guru')->user()->role == 'kurikulum')>0)
                <a href="{{ route('mapel.create') }}" class="btn btn-primary btn-icon-split mb-3">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Jadwal Pelajaran</span>
                </a>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Nama Kelas</th>
                            <th scope="col">AKSI</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Nama Kelas</th>
                            <th scope="col">AKSI</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @forelse ($mapels as $mapel)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $mapel->kelas_id }}</td>
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('mapel.destroy', $mapel->id) }}" method="POST">

                                        @if (Str::length(Auth::guard('siswa')->user()) > 0)

                                        @elseif (Str::length(Auth::guard('guru')->user()->role == 'kurikulum')>0)
                                            <a href="{{ route('mapel.edit', $mapel->id) }}"
                                                class="btn btn-sm btn-circle btn-primary"><i class="fas fa-edit"></i></a>
                                        @endif
                                        <a href="{{ route('mapel.show', $mapel->id) }}"
                                            class="btn btn-sm btn-circle btn-success"><i class="fas fa-search"></i></a>

                                        @if (Str::length(Auth::guard('siswa')->user()) > 0)

                                        @elseif (Str::length(Auth::guard('guru')->user()->role == 'kurikulum')>0)
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-circle btn-danger"><i
                                                    class="fas fa-trash"></i></button>
                                        @endif
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-danger">
                                Data kelas belum Tersedia.
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
        @if (session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!');
        
        @elseif(session()->has('error'))
        
            toastr.error('{{ session('error') }}', 'GAGAL!');
        
        @endif
    </script>

@endsection
