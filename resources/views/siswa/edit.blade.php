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
                    <div class="card-body">
                        <form action="{{ route('siswa.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Siswa</label>
                                <input type="text" class="form-control @error('namasiswa') is-invalid @enderror" name="namasiswa" value="{{ old('namasiswa', $siswa->namasiswa) }}">
                            
                                <!-- error message untuk namasiswa -->
                                @error('namasiswa')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                                <div class="form-group">
                                <label class="font-weight-bold">NISN</label>
                                <input type="text" class="form-control @error('nisn') is-invalid @enderror" name="nisn" value="{{ old('nisn', $siswa->nisn) }}">
                            
                                <!-- error message untuk nisn -->
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
                                    @if (old('kelas_id', $siswa->kelas_id == $kelas->id) )
                                        <option value="{{$kelas->id }}" selected>{{ $kelas->name }}</option>  
                                    @else
                                        
                                    <option value="{{$kelas->id }}">{{ $kelas->name }}</option>
                                    @endif
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
                                <input type="file" style="padding-bottom:36px;" class="form-control" name="foto">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $siswa->email) }}">
                            
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
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password', $siswa->password) }}" placeholder="Masukan Password baru">
                            
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