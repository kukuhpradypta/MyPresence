@extends('template.template')
@section('search')
    <form  class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="get" action="{{ route('search') }}">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search by Role. . ."
            aria-label="Search" aria-describedby="basic-addon2" id="search" name="search">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                  <i class="fas fa-search fa-sm"></i>
               </button>
            </div>
        </div>
    </form>
@endsection
@section('content')







<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Guru</h6>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('guru.create') }}" class="btn btn-primary btn-icon-split mb-3">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                        <span class="text">Tambah Data Guru</span>
                                    </a>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th scope="col">NO</th>
                                            <th scope="col">nama</th>
                                            <th scope="col">nign</th>
                                            <th scope="col">role</th>
                                            <th scope="col">Foto</th>
                                            <th scope="col">email</th>
                                            <th scope="col">AKSI</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th scope="col">NO</th>
                                            <th scope="col">nama</th>
                                            <th scope="col">nign</th>
                                            <th scope="col">role</th>
                                            <th scope="col">Foto</th>
                                            <th scope="col">email</th>
                                            <th scope="col">AKSI</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                         @forelse ($gurus as $guru)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{ $guru->namaguru }}</td>
                                                <td>{{ $guru->nign }}</td>
                                                <td>{{ $guru->role }}</td>
                                                <td class="text-center">
                                                    <img src="{{ Storage::url('public/gurus/').$guru->Foto }}" class="rounded"  style="max-width: 150px;height:100px;">
                                                </td>
                                                <td>{{ $guru->email }}</td>
                                                <td class="text-center">
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('guru.destroy', $guru->id) }}" method="POST">
                                                        <a href="{{ route('guru.edit', $guru->id) }}" class="btn btn-sm btn-circle btn-primary"><i class="fas fa-edit"></i></a>
                                                        <a href="{{ route('guru.show', $guru->id) }}" class="btn btn-sm btn-circle btn-success"><i class="fas fa-search"></i></a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-circle btn-danger"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <div class="alert alert-danger">
                                                Data guru belum Tersedia.
                                            </div>
                                        @endforelse
                                    </tbody>
                                </table>
                                                          {{ $gurus->links() }}
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
