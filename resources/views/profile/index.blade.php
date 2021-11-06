<!DOCTYPE html>
<html lang="en">
<!------ Include the above in your HEAD tag ---------->

<head>
    <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/indexcss.css') }}">

</head>

<body class="profile-page">

    <div class="page-header header-filter" data-parallax="true"
        style="background-image:url('{{ asset('foto/background.png') }}');">
    </div>
    <div class="main main-raised">
        <div class="profile-content">
            <div class="container">
                <div class="row">

                    <div class="col-md-6 ml-auto mr-auto " style="margin-left: auto;margin-right: auto">
                        <div class="profile">
                            <div class="avatar ">
                                <img src="                                               
                                   @if (Str::length(Auth::guard('siswa')->user()) >
                                0)
                                {{ Storage::url('public/siswas/') . Auth::guard('siswa')->user()->foto }}
                            @elseif (Str::length(Auth::guard('guru')->user())>0)
                                {{ Storage::url('public/gurus/') . Auth::guard('guru')->user()->Foto }}
                                @endif"
                                alt="Circle Image" class="img-raised rounded-circle img-fluid">
                            </div>
                            <div class="name">
                                <h3 class="title">
                                    @if (Str::length(Auth::guard('siswa')->user()) > 0)
                                        <div>{{ Auth::guard('siswa')->user()->namasiswa }}</div>
                                    @elseif (Str::length(Auth::guard('guru')->user())>0)
                                        <div>{{ Auth::guard('guru')->user()->namaguru }}</div>
                                    @endif
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pb-5 ">
                    @if (Str::length(Auth::guard('siswa')->user()) > 0)
                        <div class="description text-center ">
                            <h4>Kelas : @if (Str::length(Auth::guard('siswa')->user()) > 0)
                                    {{ Auth::guard('siswa')->user()->kelas->name }}
                                @endif
                            </h4>
                        </div>
                        <div class="description text-center ">
                            <h4>Nisn : @if (Str::length(Auth::guard('siswa')->user()) > 0)
                                    {{ Auth::guard('siswa')->user()->nisn }}
                                @endif
                            </h4>
                        </div>
                    @endif
                    <div class="description text-center ">
                        <h4>Email : @if (Str::length(Auth::guard('siswa')->user()) > 0)
                                {{ Auth::guard('siswa')->user()->email }}
                            @elseif (Str::length(Auth::guard('guru')->user())>0)
                                {{ Auth::guard('guru')->user()->email }}
                            @endif
                        </h4>
                    </div>
                    @if (Str::length(Auth::guard('guru')->user()) > 0)
                        <div class="description text-center ">
                            <h4>Nign :
                                @if (Str::length(Auth::guard('guru')->user()) > 0)
                                    {{ Auth::guard('guru')->user()->nign }}
                                @endif
                            </h4>
                        </div>
                    @endif
                </div>

                <div class="pb-5">
                    <a href="/" class="col-12 mb-2" style="font-size: 17px;text-decoration:none;"><i
                            class="fas fa-arrow-left"></i>
                        Kembali</a>

                </div>

            </div>
        </div>
    </div>

    <footer class="footer text-center ">

    </footer>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
