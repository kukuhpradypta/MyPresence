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
                                    <label class="font-weight-bold">Nama</label>
                                    <input type="text" class="form-control @error('namasiswa') is-invalid @enderror"
                                        name="namasiswa" placeholder="Masukan Nama Siswa">

                                    @error('namasiswa')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">NISN</label>
                                    <input type="text" class="form-control @error('nisn') is-invalid @enderror" name="nisn"
                                        placeholder="Masukan NISN Siswa">

                                    @error('nisn')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Kelas</label>
                                    <select name="kelas" class="custom-select form-control-border border-width-2"
                                        id="exampleSelectBorderWidth2">
                                        @foreach ($kelastb as $kelas)
                                            <option value="{{ $kelas->id }}">{{ $kelas->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('kelas')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">NIPD</label>
                                    <input type="text" class="form-control @error('nipd') is-invalid @enderror"" name="
                                        nipd" placeholder="Masukan NIPD">

                                    @error('nipd')
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

                                <div class="form-group">
                                    <label class="font-weight-bold">No Kartu</label>
                                    <input type="text" class="form-control @error('no_kartu') is-invalid @enderror"
                                        name="no_kartu" placeholder="Masukan no_kartu">

                                    @error('no_kartu')
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
