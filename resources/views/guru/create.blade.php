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
                                    <label class="font-weight-bold">NUPTK</label>
                                    <input type="text" class="form-control @error('nuptk') is-invalid @enderror"
                                        name="nuptk" placeholder="Masukan NUPTK">

                                    @error('nuptk')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Nama</label>
                                    <input type="text" class="form-control @error('namaguru') is-invalid @enderror"
                                        name="namaguru" placeholder="Masukan nama guru">

                                    @error('namaguru')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Jabatan</label>
                                    <select name="role" class="custom-select form-control-border border-width-2"
                                        id="exampleSelectBorderWidth2">
                                        <option value="">~ ~ Pilih Jabatan ~ ~</option>
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
                                    <input type="file" style="padding-bottom:36px;"
                                        class="form-control @error('foto') is-invalid @enderror" name="foto">

                                    @error('foto')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Username</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror"" name="
                                        username" placeholder="Masukan Username">

                                    @error('username')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"" name="
                                        email" placeholder="Masukan Email">

                                    @error('email')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        name="password" placeholder="Masukan Password">

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
