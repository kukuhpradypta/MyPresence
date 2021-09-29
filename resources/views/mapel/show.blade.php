@extends('template.template')

@section('content')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Jadwal Pelajaran</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Mata Pelajaran</th>
                            <th scope="col">Nama Guru</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Hari</th>
                            <th scope="col">Jam Masuk</th>
                            <th scope="col">Jam Keluar</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Mata Pelajaran</th>
                            <th scope="col">Nama Guru</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Hari</th>
                            <th scope="col">Jam Masuk</th>
                            <th scope="col">Jam Keluar</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @forelse ($jadwalmapel as $haha)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $haha->namamapel }}</td>
                                <td>{{ $haha->namaguru_id }}</td>
                                <td>{{ $haha->kelas_id }}</td>
                                <td>{{ $haha->hari }}</td>
                                <td>{{ $haha->jammasuk }}</td>
                                <td>{{ $haha->jamkeluar }}</td>
                            </tr>
                        @empty
                            <div class="alert alert-danger">
                                Jadwal Pelajaran belum Tersedia.
                            </div>
                        @endforelse
                    </tbody>
                </table>
                <a href="{{ route('mapel.index') }}" class="btn btn-success"><i class="fas fa-backspace"> Kembali</i></a>
            </div>
        </div>
    </div>
@endsection
