@extends('template.template')

@section('content')
    

<div class="container mt-4">
    <div class="card shadow mb-4">
                <div class="card-header py-3">                   
                            <h3 class="m-0 font-weight-bold text-dark">Tambah Data Kelas</h3>
                        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('kelas.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf
                              <div class="form-group">
                                <label class="font-weight-bold">Nama Kelas</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Masukan nama kelas">

                                @error('name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                              <div class="form-group">
                                <label class="font-weight-bold">Nama Walas</label>
                                <input type="text" class="form-control @error('walas') is-invalid @enderror" name="walas" placeholder="Masukan walas kelas">

                                 @error('walas')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                              <button type="submit" name="submit" class="btn btn-md btn-primary">Simpan</button>
                              <a href="/kelas" class="btn btn-success">Kembali</a>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    @endsection