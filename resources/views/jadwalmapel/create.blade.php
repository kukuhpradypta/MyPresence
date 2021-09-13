@extends('template.template')

@section('content')
    

<div class="container mt-4">
    <div class="card shadow mb-4">
                <div class="card-header py-3">                   
                            <h3 class="m-0 font-weight-bold text-dark">Tambah Data Mapel</h3>
                        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('jadwalmapel.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf
                              <div class="form-group">
                                <label class="font-weight-bold">Nama Pelajaran</label>
                                <select name="namamapel" class="custom-select form-control-border border-width-2" id="exampleSelectBorderWidth2">
                                    <option value="fisika">fisika</option>
                                    <option value="kimia">kimia</option>
                                    <option value="sejarah">sejarah</option>
                                    <option value="mtk">mtk</option>
                                    <option value="pai">pai</option>
                                    <option value="pjok">pjok</option>
                                    <option value="seni budaya">seni budaya</option>
                                    <option value="bahasa indonesia">bahasa indonesia</option>
                                    <option value="bahasa inggris">bahasa inggris</option>
                                </select>

                                @error('namamapel')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                              <div class="form-group">
                                <label class="font-weight-bold">Nama Guru</label>
                                <select name="namaguru_id" class="custom-select form-control-border border-width-2" id="exampleSelectBorderWidth2">
                                @foreach ($gurutb as $kelas) 
                                    <option value="{{$kelas->namaguru }}">{{ $kelas->namaguru }}</option>
                                @endforeach
                                </select>

                                 @error('namaguru_id')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                            <label class="font-weight-bold">kelas</label>
                            <select name="kelas_id" class="custom-select form-control-border border-width-2" id="exampleSelectBorderWidth2">
                                @foreach ($kelastb as $kelas) 
                                    <option value="{{$kelas->name }}">{{ $kelas->name }}</option>
                                @endforeach
                            </select>
                                 @error('kelas_id')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> 

                            <div class="form-group">
                                <label class="font-weight-bold">Hari</label>
                                <select name="hari" class="custom-select form-control-border border-width-2" id="exampleSelectBorderWidth2">
                                    <option value="senin">senin</option>
                                    <option value="selasa">selasa</option>
                                    <option value="rabu">rabu</option>
                                    <option value="kamis">kamis</option>
                                    <option value="jumat">jumat</option>
                                    <option value="sabtu">sabtu</option>
                                </select>

                                @error('hari')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Jam Masuk</label>
                                <input type="time" class="form-control @error('jammasuk') is-invalid @enderror" name="jammasuk">

                                @error('jammasuk')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Jam Keluar</label>
                                <input type="time" class="form-control @error('jamkeluar') is-invalid @enderror" name="jamkeluar">

                                @error('jamkeluar')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                              <button type="submit" name="submit" class="btn btn-md btn-primary">Simpan</button>
                              <a href="/mapel" class="btn btn-success">Kembali</a>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    @endsection
