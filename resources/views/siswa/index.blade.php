@extends('template.template')

@section('content')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
        </div>
        <div class="card-body">
            <a href="{{ route('siswa.create') }}" class="btn btn-primary btn-icon-split mb-3">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Data Siswa</span>
            </a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">NISN</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Foto</th>
                            <th scope="col">NIPD</th>
                            <th scope="col">Email</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">NISN</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Foto</th>
                            <th scope="col">NIPD</th>
                            <th scope="col">Email</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @forelse ($siswas as $siswa)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $siswa->nama }}</td>
                                <td>{{ $siswa->nisn }}</td>
                                <td>{{ $siswa->kelas->name }}</td>
                                <td class="text-center">
                                    <img src="{{ asset('foto/' . $siswa->foto) }}" class="rounded"
                                        style="max-width: 150px;height:100px;">
                                </td>
                                <td>{{ $siswa->nipd }}</td>
                                <td>{{ $siswa->email }}</td>
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('siswa.destroy', $siswa->id) }}" method="POST">
                                        <a href="{{ route('siswa.edit', $siswa->id) }}"
                                            class="btn btn-sm btn-circle btn-primary"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('siswa.show', $siswa->id) }}"
                                            class="btn btn-sm btn-circle btn-success"><i class="fas fa-search"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-circle btn-danger"><i
                                                class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-danger">
                                Data siswa belum Tersedia.
                            </div>
                        @endforelse
                    </tbody>
                </table>
                {{ $siswas->links() }}
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
