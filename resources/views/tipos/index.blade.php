@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark" style="background: #4873C1;color:white">
                    <div class="row">


                        <div class="col-md-4 pt-2">
                            Tipos De habitaciones

                        </div>
                        <div class="col-md-8">
                            <div class="row">
<div class="col-md-10">
<form class="row" action="{{route('tipos.todo')}}" method="POST">
                                    @csrf
                                 

                                        <select name="tem_id" class="form-control" style="width:55% ;" id="validationCustom04" required>
                                            <option selected disabled value="">Selecione una Temporada</option>
                                            <!-- <option value="todo">Todas las Habitaciones</option> -->

                                            @foreach($temporada as $tem)
                                            <option value="{{$tem->tem_id}}">{{$tem->tem_nombre}} - Valor:{{$tem->tem_valor}}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a valid state.
                                        </div>

                                        <button type="submit" value="btn_buscar" class="btn " style="border:solid #000 1px; background: #C6EBFD"> Cambiar</button>
                                



                                </form>
</div>

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

                                                    <form method="POST" action="{{route('tipos.store')}}">
                                                        @csrf

                                                        <div class="form-group row">
                                                            <label for="tip_nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="tip_nombre" type="text" class="form-control @error('tip_nombre') is-invalid @enderror" name="tip_nombre" value="{{ old('tip_nombre') }}" required autocomplete="tip_nombre" autofocus>

                                                                @error('tip_nombre')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="tip_camas" class="col-md-4 col-form-label text-md-right">{{ __('NRO de Camas') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="tip_camas" type="number" min="0" class="form-control @error('tip_camas') is-invalid @enderror" name="tip_camas" value="{{ old('tip_camas') }}" required autocomplete="tip_camas" autofocus>

                                                                @error('tip_camas')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="tip_precio" class="col-md-4 col-form-label text-md-right">{{ __('Precio') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="tip_precio" step="0.001" min="0" type="number" class="form-control @error('tip_precio') is-invalid @enderror" name="tip_precio" value="{{ old('tip_precio') }}" required autocomplete="tip_precio" autofocus>

                                                                @error('tip_precio')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="tem_id" class="col-md-4 col-form-label text-md-right">{{ __('Temporada') }}</label>

                                                            <div class="col-md-6">
                                                                <!-- <input id="usu_cli_cedula" type="number" class="form-control @error('cli_cedula') is-invalid @enderror" name="cli_cedula" value="{{ old('cli_cedula') }}" required autocomplete="cli_cedula" autofocus> -->
                                                                <select class="form-control" id="tem_id" name="tem_id" id="validationCustom04" required>
                                                                    <option selected disabled value="">Escoja una Temporada</option>
                                                                    @foreach($temporada as $tem)
                                                                    <option value="{{$tem->tem_id}}">{{$tem->tem_nombre}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('tem_id')
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
                        <th>Nombre</th>
                        <th>Camas</th>
                        <th>Precio</th>
                        <th>Temporada</th>
                        <th>Acciones</th>

                        @foreach($tipos as $tip)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$tip->tip_nombre}}</td>
                            <td>{{$tip->tip_camas}}</td>
                            <td>{{$tip->tip_precio}}</td>
                            <td>{{$tip->tem_nombre}}</td>

                            <td>
                                <div class="row">



                                    <button type="button" class="btn" style="border:solid #000 1px;margin:1%; background: #85ADFF" data-toggle="modal" data-target="#editmodal{{$tip->tip_id}}">
                                        Editar
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="editmodal{{$tip->tip_id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-dark">
                                                    <h5 class="modal-title " style="color:white;" id="staticBackdropLabel">Editar Tipo de habitacion</h5>
                                                    <button type="button" class="close" style="color:white" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="color:#000">

                                                    <form method="POST" action="{{route('tipos.update',$tip->tip_id)}}">
                                                        @csrf

                                                        <div class="form-group row">
                                                            <label for="tip_nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="tip_nombre" type="text" value="{{$tip->tip_nombre}}" class="form-control @error('tip_nombre') is-invalid @enderror" name="tip_nombre" value="{{ old('tip_nombre') }}" required autocomplete="tip_nombre" autofocus>

                                                                @error('tip_nombre')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="tip_camas" class="col-md-4 col-form-label text-md-right">{{ __('NRO de Camas') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="tip_camas" type="number" min="0"  value="{{$tip->tip_camas}}" class="form-control @error('tip_camas') is-invalid @enderror" name="tip_camas" value="{{ old('tip_camas') }}" required autocomplete="tip_camas" autofocus>

                                                                @error('tip_camas')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="tip_precio" class="col-md-4 col-form-label text-md-right">{{ __('Precio') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="tip_precio" step="0.001" min="0" type="number" value="{{$tip->tip_precio}}" class="form-control @error('tip_precio') is-invalid @enderror" name="tip_precio" value="{{ old('tip_precio') }}" required autocomplete="tip_precio" autofocus>

                                                                @error('tip_precio')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="tem_id" class="col-md-4 col-form-label text-md-right">{{ __('Temporada') }}</label>

                                                            <div class="col-md-6">
                                                                <!-- <input id="usu_cli_cedula" type="number" class="form-control @error('cli_cedula') is-invalid @enderror" name="cli_cedula" value="{{ old('cli_cedula') }}" required autocomplete="cli_cedula" autofocus> -->
                                                                <select class="form-control " id="tem_id" name="tem_id" id="validationCustom04" required>
                                                                    <option selected disabled value="">Escoja una Temporada</option>
                                                                    @foreach($temporada as $tem)
                                                                    <option value="{{$tem->tem_id}}">{{$tem->tem_nombre}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('tem_id')
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




                                    <button type="button" class="btn" style="border:solid #000 1px;margin:1%; background: #FFB3AE" data-toggle="modal" data-target="#deletemodal{{$tip->tip_id}}">
                                        Eliminar
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="deletemodal{{$tip->tip_id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-dark">
                                                    <h5 class="modal-title " style="color:white;" id="staticBackdropLabel">Eliminar Cliente</h5>
                                                    <button type="button" class="close" style="color:white" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="color:#000">

                                                    <form method="POST" action="{{route('tipos.destroy',$tip->tip_id)}}">
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