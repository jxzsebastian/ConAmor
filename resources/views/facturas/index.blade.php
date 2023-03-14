@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Facturas</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            
                            <a class="btn btn-info" href="{{ route('facturas.create') }}">Crear Nueva Factura</a>

                            <table class="table table-stripped mt-2">
                                <thead>
                                    <th>ID</th>
                                    <th>Total</th>
                                    <th>Cliente</th>
                                    <th>Fecha de Creacion</th>
                                    <th class="text-start">Acciones</th>
                                </thead>
                                <tbody>
                                @foreach($facturas as $factura)
                                    <tr>
                                        <td>{{$factura->id_factura}}</td>
                                        <td>{{$factura->total}}</td>
                                        <td>
                                            <span class="badge badge-pill badge-primary">{{$factura->nombre_cliente}} </span></td>
                                        <td>
                                        <span class="badge badge-pill badge-light">{{$factura->created_at}}</span>
                                        </td>

                                        <td>
                                        <a href="{{ route('facturas.pdf',$factura->id_factura) }}" class="btn btn-success" >Detalles Factura</a>
    
                                    </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination justify-content-end">
                                {!! $facturas->links() !!}
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
<link href="{{ asset('assets/css/sweetalert2.min.css') }}" rel="stylesheet" type="text/css"/>

@if(session('creado')== "ok")
<script>
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Creado con Exito!',
        showConfirmButton: false,
        timer: 1000
    })
</script>
@endif
@endsection
