@extends('template.template')
@section('pagename')
    Dashboard
@endsection
@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                      <div class="row-12 mt-3">
         <div class="card-group justify-content-evenly">   
                         
                          <div class="col-3 md-4 mb-3">
                            <a href="#" style="text-decoration: none; color: black;">
                                <div class="card m-2 shadow-sm" style="width: 200px;height:220px;">
                                    <i class="bg-primary fas fa-bookmark text-center" style="height:150px; width:100%;padding-top:23px; font-size:100px;color:white;" ></i>
                                    <div class="card-body text-center">
                                        <h5 class="card-title fw-bold">Jadwal Pelajaran</h5>                                      
                                    </div>
                                </div>
                            </a>
                            </div>          
                                                                                                       
                          <div class="col-3 md-4 mb-3">
                            <a href="#" style="text-decoration: none; color: black;">
                                <div class="card m-2 shadow-sm" style="width: 200px;height:220px;">
                                    <i class="bg-primary fas fa-calendar-plus text-center" style="height:150px; width:100%;padding-top:23px; font-size:100px; color:white;" ></i>
                                    <div class="card-body text-center">
                                        <h5 class="card-title fw-bold">Presensi Siswa</h5>                                      
                                    </div>
                                </div>
                            </a></div>             
        </div>
        </div>

                </div>
            </div>
        </div>
    </div>
@endsection
