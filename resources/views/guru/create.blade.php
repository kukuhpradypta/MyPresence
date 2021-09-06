@extends('template.template')

@section('content')
    

<div class="container mt-4">
    <div class="card shadow mb-4">
                <div class="card-header py-3">                   
                            <h3 class="m-0 font-weight-bold text-dark">Tambah Data Guru</h3>
                        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('guru.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf
                              <div class="form-group">
                                <label class="font-weight-bold">nama</label>
                                <input type="text" class="form-control @error('namaguru') is-invalid @enderror" name="namaguru" placeholder="Masukan nama guru">

                                @error('namaguru')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                              <div class="form-group">
                                <label class="font-weight-bold">nign</label>
                                <input type="text" class="form-control @error('nign') is-invalid @enderror" name="nign" placeholder="Masukan nign guru">

                                 @error('nign')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                            <label class="font-weight-bold">role</label>
                            <select name="role" class="custom-select form-control-border border-width-2" id="exampleSelectBorderWidth2">
                                <option value="kurikulum">kurikulum</option>
                                <option value="bk">bk</option>
                                <option value="guru">guru</option>
                                <option value="walas">walas</option>
                                <option value="kesiswaan">kesiswaan</option>
                            </select>
                                 @error('role')
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
                              <a href="/guru" class="btn btn-success">Kembali</a>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    @endsection
