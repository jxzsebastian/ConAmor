@extends('layouts.app')
@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush
@section('content')
@php
use App\Models\Cliente;
$cant_cliente = Cliente::count();  
use App\Models\User;
$cant_usuarios = User::count();    
use App\Models\Proveedor;
$cant_prov = Proveedor::count();   
use App\Models\Producto;
$cant_prod = Producto::count();
use App\Models\Documento;
$cant_docs = Documento::count();                                                
@endphp

    <section class="section">
            <div class="section-header">
                <h1>Menu Principal</h1>
            </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">                          
                                <div class="row">
                                
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-info">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Usuarios</h4>
                            </div>
                            <div class="card-body">
                            {{$cant_usuarios}}
                            </div>
                            <a href="/usuarios" ><i class="fa fa-share mr-2" aria-hidden="true"></i>Ver más</a>
                        </div>
                    </div>
                </div>
                                                                            
                                    
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-truck"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Proveedores</h4>
                            </div>
                            <div class="card-body">
                                {{$cant_prov}}

                            </div>
                            <a href="/proveedores" ><i class="fa fa-share mr-2" aria-hidden="true"></i>Ver más</a>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-archive"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Productos</h4>
                            </div>
                            <div class="card-body">
                            {{$cant_prod}}

                            </div>
                            <a href="/productos" ><i class="fa fa-share mr-2" aria-hidden="true"></i>Ver más</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Clientes</h4>
                            </div>
                            <div class="card-body">
                            {{$cant_cliente}}
                            </div>
                            <a href="/clientes" ><i class="fa fa-share mr-2" aria-hidden="true"></i>Ver más</a>
                        </div>
                    </div>
                </div>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
                  <div class="card-header">
                    <h4>Graficas</h4>
                  </div>
                <div>
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
            
    </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
    datasets: [{
      label: 'Statistics',
      data: [1, 2, 3, 4, 5, 6, 7,8,9,10],
      borderWidth: 2,
      backgroundColor: '#6777ef',
      borderColor: '#6777ef',
      borderWidth: 2.5,
      pointBackgroundColor: '#ffffff',
      pointRadius: 4
    }]
  },
  options: {
    legend: {
      display: false
    },
    scales: {
      yAxes: [{
        gridLines: {
          drawBorder: false,
          color: '#f2f2f2',
        },
        ticks: {
          beginAtZero: true,
          stepSize: 150
        }
      }],
      xAxes: [{
        ticks: {
          display: false
        },
        gridLines: {
          display: false
        }
      }]
    },
  }
});
</script>
@endsection
@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush
