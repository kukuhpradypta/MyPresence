@extends('template.template')

@section('content')
     <div class="container">
         <div class="card shadow mb-4">
                <div class="card-header py-3">                   
                            <h3 class="m-0 font-weight-bold text-dark">Edit Data Siswa</h3>
                        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body" id="editakun">
                        <form @if(Str::length(Auth::guard('siswa')->user())>0)
                            action="{{ route('akun.update', Auth::guard('siswa')->user()->id) }}"
                            @elseif(Str::length(Auth::guard('guru')->user())>0)
                            action="{{ route('akun.update', Auth::guard('guru')->user()->id) }}"
                            @endif method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">Nama</label>
                                <input type="text" class="form-control @error('namasiswa') is-invalid @enderror" name="nama" @if(Str::length(Auth::guard('siswa')->user())>0)
                            value="{{ old('nama', Auth::guard('siswa')->user()->namasiswa) }}"
                            @elseif(Str::length(Auth::guard('guru')->user())>0)
                            value="{{ old('nama', Auth::guard('guru')->user()->namaguru) }}"
                            @endif>
                            
                                <!-- error message untuk namasiswa -->
                                @error('namasiswa')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> 

                            <div class="form-group">
                                <label class="font-weight-bold">Foto</label>
                                <input type="file" style="padding-bottom:36px;" class="form-control" name="foto" @if(Str::length(Auth::guard('siswa')->user())>0)
                            value="{{ old('foto', Auth::guard('siswa')->user()->foto) }}"
                            @elseif(Str::length(Auth::guard('guru')->user())>0)
                            value="{{ old('foto', Auth::guard('guru')->user()->Foto) }}"
                            @endif>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" @if(Str::length(Auth::guard('siswa')->user())>0)
                            value="{{ old('email', Auth::guard('siswa')->user()->email) }}"
                            @elseif(Str::length(Auth::guard('guru')->user())>0)
                            value="{{ old('email', Auth::guard('guru')->user()->email) }}"
                            @endif>
                            
                                <!-- error message untuk email -->
                                @error('email')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Password</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukan Password baru" @if(Str::length(Auth::guard('siswa')->user())>0)
                            value="{{ old('password', Auth::guard('siswa')->user()->password) }}"
                            @elseif(Str::length(Auth::guard('guru')->user())>0)
                            value="{{ old('password', Auth::guard('guru')->user()->password) }}"
                            @endif>
                                                                                                                                                        
                                <!-- error message untuk password -->
                                @error('password')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary"><i class="fas fa-edit"> Edit</i></button>
                             <a href="{{ route('siswa.index') }}" class="btn btn-md btn-success"><i class="fas fa-backspace"> Kembali</i></a>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
         </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection