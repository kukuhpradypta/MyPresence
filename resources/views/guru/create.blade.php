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
                                    <label class="font-weight-bold">Nama</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                                        placeholder="Masukan Nama Guru">

                                    @error('nama')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Nomor Induk</label>
                                    <input type="text" class="form-control @error('nomor_induk') is-invalid @enderror"
                                        name="nomor_induk" placeholder="Masukan Nomor Induk Guru">

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
                                        <option value="kurikulum">Kurikulum</option>
                                        <option value="bk">BK</option>
                                        <option value="guru">Guru</option>
                                        <option value="walas">Walas</option>
                                        <option value="kesiswaan">Kesiswaan</option>
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
                                    <label class="font-weight-bold">email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"" name="
                                        email" placeholder="Masukan Email Address">

                                    @error('email')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">password</label>
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
