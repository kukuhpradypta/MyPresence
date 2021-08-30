@extends('template.template')

@section('content')
    <div class="container">
   <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold text-dark">Detail Siswa</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="{{ route('siswa.show', $siswa->id) }}" method="POST" enctype="multipart/form-data">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    
                                    <tbody>
                                    <tr>
                                        <td>Nama Siswa</td>
                                        <td>{{ old('namasiswa', $siswa->namasiswa) }}</td>
                                    </tr>
                                    <tr>
                                        <td>NISN</td>
                                        <td>{{ old('nisn', $siswa->nisn) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kelas</td>
                                        <td>{{ old('kelas', $siswa->kelas) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Foto</td>
                                        <td><img src="{{ Storage::url('public/siswas/').$siswa->foto }}" class="rounded" style="max-width: 350px;height:200px;"></td>
                                    </tr>

                                    <tr>
                                        <td>Email</td>
                                        <td>{!! $siswa->email !!}</td>
                                    </tr>
                                    </tbody>
                                        </table>
                                </form>
                                        <a href="{{ route('siswa.index') }}" class="btn btn-success"><i class="fas fa-backspace"> Kembali</i></a>
                            </div>
                        </div>
                    </div>
    </div>
@endsection