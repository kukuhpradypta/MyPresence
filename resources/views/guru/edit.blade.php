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
                            <form action="{{ route('guru.update', $guru->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label class="font-weight-bold">Nama guru</label>
                                    <input type="text" class="form-control @error('namaguru') is-invalid @enderror"
                                        name="namaguru" value="{{ old('namaguru', $guru->namaguru) }}">

                                    <!-- error message untuk namaguru -->
                                    @error('namaguru')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Nomor Induk</label>
                                    <input type="text" class="form-control @error('nomor_induk') is-invalid @enderror"
                                        name="nomor_induk" value="{{ old('nomor_induk', $guru->nomor_induk) }}">

                                    <!-- error message untuk nign -->
                                    @error('nomor_induk')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
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
                                    @error('role')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Foto</label>
                                    <br>
                                    <img src="{{ asset('storage/' . $guru->foto) }}" alt="" class="mb-2"
                                        width="10%">
                                    <input type="file" style="padding-bottom:36px;" class="form-control" name="foto">
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email', $guru->email) }}">

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
                                <a href="{{ route('guru.index') }}" class="btn btn-md btn-success"><i
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
