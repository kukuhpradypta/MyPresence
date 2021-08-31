@extends('template.template')

@section('content')
     <div class="container">
         <div class="card shadow mb-4">
                <div class="card-header py-3">                   
                            <h3 class="m-0 font-weight-bold text-dark">Edit Data Guru</h3>
                        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('guru.update', $guru->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">Nama guru</label>
                                <input type="text" class="form-control @error('namaguru') is-invalid @enderror" name="namaguru" value="{{ old('namaguru', $guru->namaguru) }}">
                            
                                <!-- error message untuk namaguru -->
                                @error('namaguru')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                                <div class="form-group">
                                <label class="font-weight-bold">NIGN</label>
                                <input type="text" class="form-control @error('nign') is-invalid @enderror" name="nign" value="{{ old('nign', $guru->nign) }}">
                            
                                <!-- error message untuk nign -->
                                @error('nign')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                            <label class="font-weight-bold">role</label>
                            <select name="role" class="custom-select form-control-border border-width-2" id="exampleSelectBorderWidth2">                              
                                <option value="{{ old('nign', $guru->role) }}"></option>
                                <option value="kurikulum">kurikulum</option>
                                <option value="bk">bk</option>
                                <option value="guru">guru</option>
                                <option value="walas">walas</option>
                                <option value="kesiswaan">kesiswaan</option>
                                <option value="siswa">siswa</option>
                            </select>
                                 @error('role')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>  

                            <div class="form-group">
                                <label class="font-weight-bold">Foto</label>
                                <input type="file" style="padding-bottom:36px;" class="form-control" name="foto">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $guru->email) }}">
                            
                                <!-- error message untuk email -->
                                @error('email')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Password</label>

                                <span><small><i style="color:red;">* kosongkan jika tidak ingin diubah</i></small></span>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Masukan Password baru">
                            
                                <!-- error message untuk password -->
                                @error('password')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary"><i class="fas fa-edit"> Edit</i></button>
                             <a href="{{ route('guru.index') }}" class="btn btn-md btn-success"><i class="fas fa-backspace"> Kembali</i></a>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
         </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection