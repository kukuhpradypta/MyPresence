@extends('template.template')

@section('content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-dark">Edit Jadwal Pelajaran</h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow rounded">
                        <div class="card-body">
                            <form action="{{ route('mapel.update', $mapel->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label class="font-weight-bold">Nama Kelas</label>
                                    <select name="kelas_id" class="custom-select form-control-border border-width-2"
                                        id="exampleSelectBorderWidth2">
                                        @foreach ($kelastb as $kelas)
                                            @if (old('kelas_id', $mapel->kelas_id == $kelas->name))
                                                <option value="{{ $kelas->name }}" selected>{{ $kelas->name }}</option>
                                            @else

                                                <option value="{{ $kelas->name }}">{{ $kelas->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('kelas_id')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-md btn-primary"><i class="fas fa-edit">
                                        Edit</i></button>
                                <a href="{{ route('mapel.index') }}" class="btn btn-md btn-success"><i
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
