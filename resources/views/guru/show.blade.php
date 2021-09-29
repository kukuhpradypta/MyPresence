@extends('template.template')

@section('content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-dark">Detail Guru</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{ route('guru.show', $guru->id) }}" method="POST" enctype="multipart/form-data">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                            <tbody>
                                <tr>
                                    <td>Nama guru</td>
                                    <td>{{ old('namaguru', $guru->namaguru) }}</td>
                                </tr>
                                <tr>
                                    <td>NIGN</td>
                                    <td>{{ old('nign', $guru->nign) }}</td>
                                </tr>
                                <tr>
                                    <td>Role</td>
                                    <td>{{ old('role', $guru->role) }}</td>
                                </tr>
                                <tr>
                                    <td>Foto</td>
                                    <td><img src="{{ asset('foto/gurus', $guru->Foto) }}" class="rounded"
                                            style="max-width: 350px;height:200px;"></td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td>{!! $guru->username !!}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{!! $guru->email !!}</td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                    <a href="{{ route('guru.index') }}" class="btn btn-success"><i class="fas fa-backspace"> Kembali</i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
