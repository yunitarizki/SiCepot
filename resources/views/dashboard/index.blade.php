@extends('dashboard.layouts.main')

@section('container')
<div class="main-content khusus">
        <div class="konten khusus2">
            <div class="konten_dalem khusus3">
                <h2 class="heade mt-5" style="color: #4b4f58;">Dashboard</h2>
                <hr style="margin-top: -2px;">
                <div class="container" id="container" style="border: none;">
                    <div class="row tampilCardview" id="row">
                        
                        <div class="col-md-4 jarak">
                            <a href="/dashboard/mitra/daftar" style="text-decoration: none;">
                                <div class="card card-stats card-warning bg-primary">
                                    <div class="card-body ">
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="icon-big text-center">
                                                    <i class="fa fa-user-group ikon"></i>
                                                </div>
                                            </div>
                                            <div class="col-7 d-flex align-items-center tulisan">
                                                <div class="numbers">
                                                    <p class="card-category ket head">Jumlah Mitra</p>
                                                
                                                    <h4 class="card-title ket total display-4"><b>{{$mitras->total()}}</b> </h4>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 jarak">
                            <a href="/dashboard/kegiatan/daftar" style="text-decoration: none;">
                                <div class="card card-stats card-warning bg-success">
                                    <div class="card-body ">
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="icon-big text-center">
                                                    <i class="fa fa-briefcase ikon"></i>
                                                </div>
                                            </div>
                                            <div class="col-7 d-flex align-items-center tulisan">
                                                <div class="numbers">
                                                    <p class="card-category ket head">Jumlah Kegiatan</p>
                                                
                                                    <h4 class="card-title ket total display-4"><b>{{$kegiatans->total()}}</b> </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-12 jarak mt-4">
                            <a href="/dashboard/master_kegiatan/daftar" style="text-decoration: none;">
                                <div class="card card-stats card-warning bg-light">
                                    <div class="card-body">
                                    <canvas id="myChart" height="100px"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div> 
                                
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
<script type="text/javascript">
  
    var labels =  {{ Js::from($labels) }};
    var master =  {{ Js::from($data) }};
  
    const data = {
        labels: labels,
        datasets: [{
            label: 'JUMLAH KEGIATAN ',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: master,
        }]
    };
  
    const config = {
        type: 'line',
        data: data,
        options: {}
    };
  
    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
  
</script>

@endsection