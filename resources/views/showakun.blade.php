@extends('template.template')

@section('content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-dark">Detail Akun</h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow rounded">
                        <div class="card-body" id="editakun">
                            <div class="text-center mt-5">
                                <img class="rounded-circle" width="150px" height="150px" @if (Str::length(Auth::guard('siswa')->user()) > 0)
                                src="{{ asset('foto/' . Auth::guard('siswa')->user()->foto) }}"
                            @elseif(Str::length(Auth::guard('guru')->user())>0)
                                src="{{ asset('foto/' . Auth::guard('guru')->user()->Foto) }}"
                                @endif alt="">
                            </div>
                            <div class="container mt-3">
                                <h5>Nama :
                                    @if (Str::length(Auth::guard('siswa')->user()) > 0)
                                        {{ Auth::guard('siswa')->user()->namasiswa }}
                                    @elseif(Str::length(Auth::guard('guru')->user())>0)
                                        {{ Auth::guard('guru')->user()->namaguru }}
                                    @endif
                                </h5>
                                <h5>Email :
                                    @if (Str::length(Auth::guard('siswa')->user()) > 0)
                                        {{ old('email', Auth::guard('siswa')->user()->email) }}
                                    @elseif(Str::length(Auth::guard('guru')->user())>0)
                                        {{ old('email', Auth::guard('guru')->user()->email) }}
                                    @endif
                                </h5>
                                <a href=" @if (Str::length(Auth::guard('siswa')->user()) >
                                    0)
                                    {{ route('akun.edit', Auth::guard('siswa')->user()->id) }}
                                @elseif(Str::length(Auth::guard('guru')->user())>0)
                                    {{ route('akun.edit', Auth::guard('guru')->user()->id) }}
                                    @endif" class="btn btn-primary mt-5">Edit</a>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection
