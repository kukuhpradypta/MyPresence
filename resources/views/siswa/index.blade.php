@extends('template.template')
@section('search')
    <form  class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
            aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
               </button>
            </div>
        </div>
    </form>
@endsection
@section('content')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                <div class="card-header py-3">                   
                            <h3 class="m-0 font-weight-bold text-dark">Data Siswa</h3>
                        </div>
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        
                        <a href="{{ route('siswa.create') }}" class="btn btn-md btn-success mb-3"><i class="fas fa-user-plus"> Tambah siswa</i></a>
                        
                        <table class="table table-bordered">
                            <thead>  
                              <tr>
                                <th scope="col">NO</th>
                                <th scope="col">nama</th>
                                <th scope="col">nisn</th>
                                <th scope="col">kelas</th>
                                <th scope="col">Foto</th>
                                <th scope="col">email</th>
                                <th scope="col">AKSI</th>
                              </tr>
                            </thead> 
                            <tbody>
                                
                              @forelse ($siswas as $siswa)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $siswa->namasiswa }}</td>
                                    <td>{{ $siswa->nisn }}</td>
                                    <td>{{ $siswa->kelas }}</td>
                                    <td class="text-center">
                                        <img src="{{ Storage::url('public/siswas/').$siswa->foto }}" class="rounded" style="max-width: 150px;height:100px;">
                                    </td>
                                    <td>{{ $siswa->email }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('siswa.destroy', $siswa->id) }}" method="POST">
                                            <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('siswa.show', $siswa->id) }}" class="btn btn-sm btn-success"><i class="fas fa-search"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
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
