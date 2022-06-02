@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark" style="background: #4873C1;color:white">
                <div class="row">


<div class="col-md-10 pt-2">
    Tipos De habitaciones

</div>
<div class="col-md-2">
    <div class="row">
       

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
                            <h5 class="modal-title " style="color:white;" id="staticBackdropLabel">Nueva Temporada</h5>
                            <button type="button" class="close" style="color:white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" style="color:#000">

                            <form method="POST" action="{{route('temporada.store')}}">
                                @csrf

                                <div class="form-group row">
                                    <label for="tem_nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                                    <div class="col-md-6">
                                        <input id="tem_nombre" type="text" class="form-control @error('tem_nombre') is-invalid @enderror" name="tem_nombre" value="{{ old('tem_nombre') }}" required autocomplete="tem_nombre" autofocus>

                                        @error('tem_nombre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="tem_valor" class="col-md-4 col-form-label text-md-right">{{ __('Valor') }}</label>

                                    <div class="col-md-6">
                                        <input id="tem_valor" type="number" min="0" step="0.001" class="form-control @error('tip_camas') is-invalid @enderror" name="tem_valor" value="{{ old('tem_valor') }}" required autocomplete="tem_valor" autofocus>

                                        @error('tem_valor')
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
             
                        <th>valor</th>
                
                        <th>Acciones</th>
                   
                        @foreach($temporada as $tem)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$tem->tem_nombre}}</td>
                            <td>{{$tem->tem_valor}}</td>
                           
                            <td>
                                <div class="row">



                                    <button type="button" class="btn" style="border:solid #000 1px;margin:1%; background: #85ADFF" data-toggle="modal" data-target="#editmodal{{$tem->tem_id}}">
                                        Editar
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="editmodal{{$tem->tem_id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-dark">
                                                    <h5 class="modal-title " style="color:white;" id="staticBackdropLabel">Editar Temporada</h5>
                                                    <button type="button" class="close" style="color:white" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="color:#000">

                                                    <form method="POST" action="{{route('temporada.update',$tem->tem_id)}}">
                                                        @csrf

                                                        <div class="form-group row">
                                                            <label for="tip_nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="tem_nombre" type="text" value="{{$tem->tem_nombre}}" class="form-control @error('tem_nombre') is-invalid @enderror" name="tem_nombre" value="{{ old('tem_nombre') }}" required autocomplete="tem_nombre" autofocus>

                                                                @error('tem_nombre')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>

            

                                                        <div class="form-group row">
                                                            <label for="tip_precio" class="col-md-4 col-form-label text-md-right">{{ __('Precio') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="tem_valor"  step="0.001" min="0"  type="number" value="{{$tem->tem_valor}}" class="form-control @error('tem_valor') is-invalid @enderror" name="tem_valor" value="{{ old('tem_valor') }}" required autocomplete="tem_valor" autofocus>

                                                                @error('tem_valor')
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




                                    <button type="button" class="btn" style="border:solid #000 1px;margin:1%; background: #FFB3AE" data-toggle="modal" data-target="#deletemodal{{$tem->tem_id}}">
                                        Eliminar
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="deletemodal{{$tem->tem_id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-dark">
                                                    <h5 class="modal-title " style="color:white;" id="staticBackdropLabel">Eliminar Temporada</h5>
                                                    <button type="button" class="close" style="color:white" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="color:#000">

                                                    <form method="POST" action="{{route('temporada.destroy',$tem->tem_id)}}">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <p>Todos Los Datos De Esta Temporada Se Eliminaran!!!</p>
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
