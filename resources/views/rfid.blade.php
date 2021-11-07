<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Dashboard RFID</title>

    {{-- Fonts Poppins --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link  href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

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
  </head>
  <body>
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
                            <img class="foto" src="https://i.pinimg.com/originals/3e/65/90/3e6590f98389bf588e57bfd7e2634f95.jpg" alt="">
                            <p class="nama">Jovanka Lovata</p>
                            <p class="nisn">004509361427</p>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>