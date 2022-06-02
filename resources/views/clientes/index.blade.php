@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-dark" style="background: #4873C1;color:white">
                    <div class="row">


                        <div class="col-md-3 pt-2">
                            CLIENTES

                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-4 pt-2">
                                    <label for="">Número de Cedula</label>

                                </div>
                                <form class="col-md-6" action="{{route('clientes.search')}}" method="POST">
                                    @csrf
                                    <div class="row">

                                        <input class="form-control" id="cli_cedula" name="cli_cedula" style="width:175px ;" type="number">
                                        <button type="submit" value="btn_buscar" class="btn " style="border:solid #000 1px; background: #C6EBFD"> Buscar</button>
                                    </div>



                                </form>
                                <div class="col-md-2">
                                    <!-- <a href="{{route('clientes.create')}}" class="btn "  style="border:solid #000 1px; background: #ABFAB5">Nuevo</a> -->

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn" style="border:solid #000 1px; background: #ABFAB5" data-toggle="modal" data-target="#newmodal">
                                        Nuevo
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="newmodal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-dark">
                                                    <h5 class="modal-title " style="color:white;" id="staticBackdropLabel">Nuevo Cliente</h5>
                                                    <button type="button" class="close" style="color:white" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="color:#000">

                                                    <form method="POST" action="{{route('clientes.store')}}">
                                                        @csrf

                                                        <div class="form-group row">
                                                            <label for="cli_nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="cli_nombre" type="text" class="form-control @error('cli_nombre') is-invalid @enderror" name="cli_nombre" value="{{ old('cli_nombre') }}" required autocomplete="cli_nombre" autofocus>

                                                                @error('cli_nombre')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="cli_apellido" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="cli_apellido" type="text" class="form-control @error('cli_apellido') is-invalid @enderror" name="cli_apellido" value="{{ old('cli_apellido') }}" required autocomplete="cli_apellido" autofocus>

                                                                @error('cli_apellido')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="cli_cedula" class="col-md-4 col-form-label text-md-right">{{ __('Cedula') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="usu_cli_cedula" type="number" class="form-control @error('cli_cedula') is-invalid @enderror" name="cli_cedula" value="{{ old('cli_cedula') }}" required autocomplete="cli_cedula" autofocus>

                                                                @error('cli_cedula')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                                @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>


                                                        <div class="form-group row">
                                                            <label for="cli_telefono" class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="cli_telefono" type="number" class="form-control @error('cli_telefono') is-invalid @enderror" name="cli_telefono" value="{{ old('cli_telefono') }}" required autocomplete="cli_telefono" autofocus>

                                                                @error('cli_telefono')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="cli_direccion" class="col-md-4 col-form-label text-md-right">{{ __('Direccion') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="cli_direccion" type="text" class="form-control @error('cli_direccion') is-invalid @enderror" name="cli_direccion" value="{{ old('cli_direccion') }}" required autocomplete="cli_direccion" autofocus>

                                                                @error('cli_direccion')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>





                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                            <button type="" class="btn btn-primary">Guardar</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">



                    <table class="table table-striped">
                        <th>#</th>
                        <th>Cedula</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Direccion</th>
                        <th>Acciones</th>
                        @foreach($clientes as $cli)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$cli->cli_cedula}}</td>
                            <td>{{$cli->cli_nombre}}</td>
                            <td>{{$cli->cli_apellido}}</td>
                            <td>{{$cli->email}}</td>
                            <td>{{$cli->cli_direccion}}</td>
                            <td>
                                <div class="row">



                                    <button type="button" class="btn" style="border:solid #000 1px;margin:1%; background: #85ADFF" data-toggle="modal" data-target="#editmodal{{$cli->cli_id}}">
                                        Editar
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="editmodal{{$cli->cli_id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-dark">
                                                    <h5 class="modal-title " style="color:white;" id="staticBackdropLabel">Editar Cliente</h5>
                                                    <button type="button" class="close" style="color:white" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="color:#000">

                                                    <form method="POST" action="{{route('clientes.update',$cli->cli_id)}}">
                                                        @csrf

                                                        <div class="form-group row">
                                                            <label for="cli_nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="cli_nombre" type="text" value="{{$cli->cli_nombre}}" class="form-control @error('cli_nombre') is-invalid @enderror" name="cli_nombre" value="{{ old('cli_nombre') }}" required autocomplete="cli_nombre" autofocus>

                                                                @error('cli_nombre')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="cli_apellido" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="cli_apellido" type="text" value="{{$cli->cli_apellido}}" class="form-control @error('cli_apellido') is-invalid @enderror" name="cli_apellido" value="{{ old('cli_apellido') }}" required autocomplete="cli_apellido" autofocus>

                                                                @error('cli_apellido')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="cli_cedula" class="col-md-4 col-form-label text-md-right">{{ __('Cedula') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="usu_cli_cedula" type="number" value="{{$cli->cli_cedula}}" class="form-control @error('cli_cedula') is-invalid @enderror" name="cli_cedula" value="{{ old('cli_cedula') }}" required autocomplete="cli_cedula" autofocus>

                                                                @error('cli_cedula')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="email" type="email" value="{{$cli->email}}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                                @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>


                                                        <div class="form-group row">
                                                            <label for="cli_telefono" class="col-md-4 col-form-label text-md-right">{{ __('telefono') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="cli_telefono" type="number" value="{{$cli->cli_telefono}}" class="form-control @error('cli_telefono') is-invalid @enderror" name="cli_telefono" value="{{ old('cli_telefono') }}" required autocomplete="cli_telefono" autofocus>

                                                                @error('cli_telefono')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="cli_direccion" class="col-md-4 col-form-label text-md-right">{{ __('Direccion') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="cli_direccion" type="text" value="{{$cli->cli_direccion}}" class="form-control @error('cli_direccion') is-invalid @enderror" name="cli_direccion" value="{{ old('cli_direccion') }}" required autocomplete="cli_direccion" autofocus>

                                                                @error('cli_direccion')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>





                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                            <button type="" class="btn btn-primary">Guardar</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>




                                    <button type="button" class="btn" style="border:solid #000 1px;margin:1%; background: #FFB3AE" data-toggle="modal" data-target="#deletemodal{{$cli->cli_id}}">
                                        Eliminar
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="deletemodal{{$cli->cli_id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-dark">
                                                    <h5 class="modal-title " style="color:white;" id="staticBackdropLabel">Eliminar Cliente</h5>
                                                    <button type="button" class="close" style="color:white" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="color:#000">

                                                    <form method="POST" action="{{route('clientes.destroy',$cli->cli_id)}}">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <p>Todos Los Datos De Este Cliente Se Eliminaran!!!</p>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                            <button type="" class="btn btn-danger">Eliminar</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>





                                </div>
                            </td>
                        </tr>
                        @endforeach

                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection