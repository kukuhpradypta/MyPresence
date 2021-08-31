@extends('template.template')

@section('content')
    

<div class="container mt-4">
    <div class="card shadow mb-4">
                <div class="card-header py-3">                   
                            <h3 class="m-0 font-weight-bold text-dark">Tambah Data Siswa</h3>
                        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf
                              <div class="form-group">
                                <label class="font-weight-bold">nama</label>
                                <input type="text" class="form-control @error('namasiswa') is-invalid @enderror" name="namasiswa" placeholder="Masukan nama siswa">

                                @error('namasiswa')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                              <div class="form-group">
                                <label class="font-weight-bold">nisn</label>
                                <input type="text" class="form-control @error('nisn') is-invalid @enderror" name="nisn" placeholder="Masukan NISN siswa">

                                 @error('nisn')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                            <label class="font-weight-bold">kelas</label>
                            <select name="kelas_id" class="custom-select form-control-border border-width-2" id="exampleSelectBorderWidth2">
                                @foreach ($kelastb as $kelas) 
                                    <option value="{{$kelas->id }}">{{ $kelas->name }}</option>
                                @endforeach
                            </select>
                                 @error('kelas_id')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> 

                            <div class="form-group">
                                <label class="font-weight-bold">Foto</label>
                                <input type="file" style="padding-bottom:36px;" class="form-control @error('foto') is-invalid @enderror" name="foto">

                                @error('foto')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror"" name="email" placeholder="Masukan alamat email">

                                @error('email')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Masukan password">

                                @error('password')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                              <button type="submit" name="submit" class="btn btn-md btn-primary">Simpan</button>
                              <a href="/siswa" class="btn btn-success">Kembali</a>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    @endsection
