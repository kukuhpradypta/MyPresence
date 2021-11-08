    @extends('template.template')
    @section('content')
        <style>
            body {
                overflow-x: hidden;
            }

            @media (max-width: 992px) {
                .kiri {
                    display: none
                }
            }

            .limiter {
                width: 100%;
                margin: 0 auto;
            }

            .kiri-form-title {
                color: #ffffff;
                line-height: 1.2;
                width: 100%;
                display: block;
                margin-top: 40px;
            }

            .container-kiri {
                width: 100%;
                min-height: 100vh;
                display: -webkit-box;
                display: -webkit-flex;
                display: -moz-box;
                display: -ms-flexbox;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                padding: 15px;
                background-repeat: no-repeat;
                background-size: cover;
                background-attachment: fixed;
                background-position: 10% 45%;
                background-position-x: -230px;
                background-image: url({{ asset('foto/rfid.png') }});
            }

            .nama-apl-kiri {
                font-size: 42px;
            }

            .container-kanan {
                width: 100%;
                min-height: 100vh;
                display: -webkit-box;
                display: -webkit-flex;
                display: -moz-box;
                display: -ms-flexbox;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                padding: 15px;
            }

            .foto {
                width: 250px;
                margin-bottom: 10px;
                border-radius: 50%;
            }

            .nama {
                font-size: 40px;
                font-weight: bold;
            }

            .nisn {
                font-size: 20px;
                margin-bottom: 30px;
                padding-bottom: 10px;
            }

        </style>
        <div class="row">

            <div class="col-lg-6">
                <div class="limiter kiri">
                    <div class="container-kiri">
                        <div class="kiri-form-title text-white">
                            <div class="pt-60 px-24">
                                <h1 class="text-white">Selamat Datang Di</h1>
                                <h1 class="text-white nama-apl-kiri">Aplikasi MyPersence</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="limiter">
                    <div class="container-kanan bg-white">
                        <div class="container">
                            <center>
                                <img class="foto"
                                    src="https://i.pinimg.com/originals/3e/65/90/3e6590f98389bf588e57bfd7e2634f95.jpg"
                                    alt="">
                                <p class="nama">Jovanka Lovata</p>
                                <p class="nisn">004509361427</p>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>


        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow rounded">
                        <div class="card-body">
                            <!-- <a href="" class="btn btn-md btn-success mb-3">TAMBAH BLOG</a> -->
                            <form action="{{ route('absen.store') }}" method="POST" enctype="multipart/form-data">

                                @csrf

                                @if (session()->has('absen'))
                                    <div class="alert alert-danger mt-2">
                                        {{ session('absen') }}
                                    </div>
                                @endif
                                @if (session()->has('gagal'))
                                    <div class="alert alert-danger mt-2">
                                        {{ session('gagal') }}
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label class="font-weight-bold">JUDUL</label>
                                    <input type="text"
                                        class="form-control border-transparent @error('no_kartu') is-invalid @enderror"
                                        style="border: none; opacity: 0;" name="no_kartu" value="{{ old('no_kartu') }}"
                                        placeholder="" autocomplete="off" autofocus>
                                    <button type="submit" id="myBtn" class="btn btn-md btn-primary"
                                        style="opacity: 0;">SIMPAN</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <script>
            //message with toastr
            @if (session()->has('success'))
            
                toastr.success('{{ session('success') }}', 'BERHASIL!');
            
            @elseif(session()->has('error'))
            
                toastr.error('{{ session('error') }}', 'GAGAL!');
            
            @endif
        </script>
    @endsection
