@extends('base')
@section('big-title')
    <h1 class="mt-4">Live Monitoring</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pantau secara realtime kondisi kandang</li>
    </ol>
@endsection
@section('title')
    <i class="fas fa-table me-1"></i>
    Live Monitoring
@endsection

@section('body')
    <div id="layoutSidenav">
        <div class="container-fluid px-4 mt-4">
            <!-- <div class="row justify-content-md-center">
                <div class="col-xl-6 mb-5 d-flex justify-content-center">
                    <div class="card bg-secondary w-50">
                        <div class="card-header text-white bg-primary pt-2 text-center">
                            <h4>Live View</h4>
                        </div>
                        <div class="card">
                            {{-- <img class="rounded" src="https://i.ibb.co/qgsZbCN/kandang.jpg" alt="kandang"> --}}
                            <img id="liveView" class="rounded" src="{{ asset('kamera.png') }}" alt="kandang">
                            <script></script>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="row justify-content-md-center">
                <div class="col-md-3 col-md-6 mb-3">
                    <div class="jumbotron jumbotron-fluid">
                        <div class="container">
                            <h1 class="display-6">Suhu</h1>
                            <hr class="my-2">
                            <div class="row text-center text-white font-weight-bold">
                              <div class="col bg-{{ $colortemp_1 }}"><h5>A</h5></div>
                              <div class="col bg-{{ $colortemp_1 }}"><h4>{{ $data->temperature_1 }} °C</h4></div>
                              <div class="w-100"></div>
                              <div class="col bg-{{ $colortemp_2 }}"><h5>B</h5></div>
                              <div class="col bg-{{ $colortemp_2 }}"><h4>{{ $data->temperature_2 }} °C</h4></div>
                              <div class="w-100"></div>
                              <div class="col bg-{{ $colortemp_3 }}"><h5>C</h5></div>
                              <div class="col bg-{{ $colortemp_3 }}"><h4>{{ $data->temperature_3 }} °C</h4></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-md-6 mb-3">
                    <div class="jumbotron jumbotron-fluid">
                        <div class="container">
                            <h1 class="display-6">Kelembaban</h1>
                            <hr class="my-2">
                            <div class="row text-center text-white font-weight-bold">
                              <div class="col bg-{{ $colorhumid_1 }}"><h5>A</h5></div>
                              <div class="col bg-{{ $colorhumid_1 }}"><h4>{{ $data->humid_1 }} %</h4></div>
                              <div class="w-100"></div>
                              <div class="col bg-{{ $colorhumid_2 }}"><h5>B</h5></div>
                              <div class="col bg-{{ $colorhumid_2 }}"><h4>{{ $data->humid_2 }} %</h4></div>
                              <div class="w-100"></div>
                              <div class="col bg-{{ $colorhumid_3 }}"><h5>C</h5></div>
                              <div class="col bg-{{ $colorhumid_3 }}"><h4>{{ $data->humid_3 }} %</h4></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-md-6 mb-3">
                    <div class="jumbotron jumbotron-fluid">
                        <div class="container">
                            <h1 class="display-6">Gas</h1>
                            <hr class="my-2">
                            <div class="row text-center text-white font-weight-bold">
                              <div class="col bg-{{ $colorgas_1 }}"><h5>A</h5></div>
                              <div class="col bg-{{ $colorgas_1 }}"><h4>{{ $data->gas_1 }} ppm</h4></div>
                              <div class="w-100"></div>
                              <div class="col bg-{{ $colorgas_2 }}"><h5>B</h5></div>
                              <div class="col bg-{{ $colorgas_2 }}"><h4>{{ $data->gas_2 }} ppm</h4></div>
                              <div class="w-100"></div>
                              <div class="col bg-{{ $colorgas_3 }}"><h5>C</h5></div>
                              <div class="col bg-{{ $colorgas_3 }}"><h4>{{ $data->gas_3 }} ppm</h4></div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <hr />
        </div>
        </main>




    </div>
    </div>
@endsection
