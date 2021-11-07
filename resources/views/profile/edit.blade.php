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
                            <form action="                        
                                                               @if (Str::length(Auth::guard('siswa')->user()) > 0)
                                {{ route('profile.update', Auth::guard('siswa')->user()->id) }}
                            @elseif (Str::length(Auth::guard('guru')->user())>0)
                                {{ route('profile.update', Auth::guard('guru')->user()->id) }}
                                @endif" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    @if (Str::length(Auth::guard('siswa')->user()) > 0)
                                        <label class="font-weight-bold">Nama Siswa</label>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                            name="nama" value="{{ old('nama', Auth::guard('siswa')->user()->nama) }}">

                                        <!-- error message untuk nama -->
                                        @error('nama')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    @elseif (Str::length(Auth::guard('guru')->user()) > 0)
                                        <label class="font-weight-bold">Nama Guru</label>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                            name="nama" value="{{ old('nama', Auth::guard('guru')->user()->nama) }}">

                                        <!-- error message untuk nama -->
                                        @error('nama')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    @endif
                                </div>

                                <div class="form-group">
                                    @if (Str::length(Auth::guard('siswa')->user()) > 0)
                                        <label class="font-weight-bold">NISN</label>
                                        <input type="text" class="form-control @error('nomor_induk') is-invalid @enderror"
                                            name="nomor_induk"
                                            value="{{ old('nomor', Auth::guard('siswa')->user()->nisn) }}">

                                        <!-- error message untuk nomor_induk -->
                                        @error('nomor_induk')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    @elseif (Str::length(Auth::guard('guru')->user()) > 0 )
                                        <label class="font-weight-bold">Nomor Induk</label>
                                        <input type="text" class="form-control @error('nomor_induk') is-invalid @enderror"
                                            name="nomor_induk"
                                            value="{{ old('nomor_induk', Auth::guard('guru')->user()->nomor_induk) }}">

                                        <!-- error message untuk Nomor Induk -->
                                        @error('nomor_induk')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    @endif
                                </div>


                                <div class="form-group">
                                    @if (Str::length(Auth::guard('siswa')->user()) > 0)
                                        <label class="font-weight-bold">Kelas</label>
                                        <select name="kelas_id" class="custom-select form-control-border border-width-2"
                                            id="exampleSelectBorderWidth2">
                                            @foreach ($kelastb as $kelas)
                                                @if (old('kelas_id', Auth::guard('siswa')->user()->kelas_id == $kelas->id))
                                                    <option value="{{ $kelas->id }}" selected>{{ $kelas->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $kelas->id }}">{{ $kelas->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('kelas_id')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    @elseif(Str::length(Auth::guard('guru')->user()) > 0)
                                        <label class="font-weight-bold">Jabatan</label>
                                        <select name="role" class="custom-select form-control-border border-width-2"
                                            id="exampleSelectBorderWidth2">
                                            @if (old('kelas_id', Auth::guard('guru')->user()->role == Auth::guard('guru')->user()->role))
                                                <option value="{{ Auth::guard('guru')->user()->role }}" selected>
                                                    {{ Auth::guard('guru')->user()->role }}</option>
                                            @else
                                                <option value="kurikulum">Kurikulum</option>
                                                <option value="bk">BK</option>
                                                <option value="guru">Guru</option>
                                                <option value="walas">Walas</option>
                                                <option value="kesiswaan">Kesiswaan</option>
                                            @endif
                                        </select>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Foto</label>
                                    <br>
                                    <img @if (Str::length(Auth::guard('siswa')->user()) > 0)
                                    src="{{ asset('storage/' . Auth::guard('siswa')->user()->foto) }}"
                                @elseif (Str::length(Auth::guard('guru')->user())>0)
                                    src="{{ asset('storage/' . Auth::guard('guru')->user()->foto) }}"
                                    @endif alt="" width="10%" class="mb-2">
                                    <input type="file" style="padding-bottom:36px;" class="form-control" name="foto">
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        name="email" @if (Str::length(Auth::guard('siswa')->user()) > 0)
                                    value="{{ old('email', Auth::guard('siswa')->user()->email) }}"
                                @elseif (Str::length(Auth::guard('guru')->user())>0)
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

                                    <span><small><i style="color:red;">* kosongkan jika tidak ingin
                                                diubah</i></small></span>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        name="password" placeholder="Masukan Password baru">

                                    <!-- error message untuk password -->
                                    @error('password')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-md btn-primary"><i class="fas fa-edit">
                                        Edit</i></button>
                                <a href="{{ route('siswa.index') }}" class="btn btn-md btn-success"><i
                                        class="fas fa-backspace"> Kembali</i></a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection
