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
                            <h3 class="m-0 font-weight-bold text-dark">Data Kelas</h3>
                        </div>
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('kelas.create') }}" class="btn btn-md btn-success mb-3"><i class="fas fa-user-plus"> Tambah Kelas</i></a>
                        
                        <table class="table table-bordered">
                            <thead>  
                              <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Nama Kelas</th>
                                <th scope="col">Nama Walas</th>
                                <th scope="col">AKSI</th>
                              </tr>
                            </thead> 
                            <tbody>
                                
                              @forelse ($kelastbs as $kelas)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $kelas->name }}</td>
                                    <td>{{ $kelas->walas }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('kelas.destroy', $kelas->id) }}" method="POST">
                                            <a href="{{ route('kelas.edit', $kelas->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('kelas.show', $kelas->id) }}" class="btn btn-sm btn-success"><i class="fas fa-search"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
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
