@extends('template.template')

@section('content')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Detail Kelas</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                              <form action="{{ route('kelas.show', $kela->id) }}" method="POST" enctype="multipart/form-data">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th scope="col">NO</th>
                                            <th scope="col">Nama Siswa</th>
                                            <th scope="col">NISN</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th scope="col">NO</th>
                                            <th scope="col">Nama Siswa</th>
                                            <th scope="col">NISN</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @forelse ($siswa as $kelas)
                                          <tr>
                                              <td>{{$loop->iteration}}</td>
                                              <td>{{ $kelas->namasiswa}}</td>
                                              <td>{{ $kelas->nisn }}</td>
                                          </tr>
                                        @empty
                                            <div class="alert alert-danger">
                                                Data kelas belum Tersedia.
                                            </div>
                                        @endforelse
                                    </tbody>
                                </table>
                              </form>
                              <a href="{{ route('kelas.index') }}" class="btn btn-success"><i class="fas fa-backspace"> Kembali</i></a>
                            </div>
                        </div>
                    </div>
@endsection