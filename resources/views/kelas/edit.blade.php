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
                        <form action="{{ route('guru.update', $kela->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Kelas</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $kela->name) }}">
                            
                                <!-- error message untuk namaguru -->
                                @error('name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                                <div class="form-group">
                                <label class="font-weight-bold">Nama Walas</label>
                                <input type="text" class="form-control @error('walas') is-invalid @enderror" name="walas" value="{{ old('walas', $kela->walas) }}">
                            
                                <!-- error message untuk walas -->
                                @error('walas')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary"><i class="fas fa-edit"> Edit</i></button>
                             <a href="{{ route('guru.index') }}" class="btn btn-md btn-success"><i class="fas fa-backspace"> Kembali</i></a>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
         </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection