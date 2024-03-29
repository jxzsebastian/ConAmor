@extends('layouts.app')

@section('content')
    <section class="section">
    <div class="section-header">
            <h1>Crear Producto</h1>
          </div>
        <div class="section-body">
        <h2 class="section-title">Formulario para Crear Producto</h2>
            <p class="section-lead">El siguiente formulario le permitira crear el Producto a desear.</p>            
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
<!--                         Para atrapar errores y mostrarlos
 -->                    @if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4 class="alert-heading">¡Ups! Se encontraron algunos errores:</h4>
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



                        <form action="{{ route('productos.store') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{$user}}" name="user_id">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="name">Nombre del Producto</label>
                                    <input type="text" name="nombre" class="form-control">
                                </div>
                            </div>
                        
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="name">Tipo de Producto</label>
                                    <input type="text" name="tipo" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="name">Precio</label>
                                    <input type="number" name="precio" class="form-control" >
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a href="{{ url('/productos') }}" class="btn btn-secondary">Cancelar</a>

                            </div>
                        </div>
                        </form>
                        

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

