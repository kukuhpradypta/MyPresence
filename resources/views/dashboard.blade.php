@extends('template.template')
@section('pagename')
   <h2 style="color: black; font-weight: 800">DASHBOARD</h2>
@endsection
@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6  border-b border-gray-200">
                      <div class="row-12 mt-3">
         <div class="card-group justify-content-evenly ">   
                         
                          <div class="col-3 md-4 mb-3">
                            <a href="#" style="text-decoration: none; color: black;">
                                <div class="card m-2 shadow-sm oioi" style="width: 200px;height:220px;">
                                    <img src="../../foto/Calendar_Flatline.png" class="text-center" style="height:100%; width:100%; font-size:100px;color:white; margin-top: -15%;" >
                                    <div class="card-body text-center" style="margin-top: -15%;">
                                        <h5 class="card-title fw-bold"><b>Jadwal Pelajaran</b></h5>                                      
                                    </div>
                                </div>
                            </a>
                            </div>          
                          <div class="col-3 md-4 mb-3">
                            <a href="#" style="text-decoration: none; color: black;">
                                <div class="card m-2 shadow-sm oioi" style="width: 200px;height:220px;">
                                    <img src="../../foto/Calendar_Outline.png" class="text-center" style="height:100%; width:100%; font-size:100px;color:white; margin-top: -15%;" >
                                    <div class="card-body text-center" style="margin-top: -15%;">
                                        <h5 class="card-title fw-bold"><b>Presensi Siswa</b></h5>                                      
                                    </div>
                                </div>
                            </a>
                            </div>          
        </div>

                </div>
            </div>
        </div>
    </div>
@endsection
