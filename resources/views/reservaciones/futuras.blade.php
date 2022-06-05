@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark" style="background: #4873C1;color:white">
                <div class="row">


<div class="col-md-6 pt-2">
    Futuras Reservaciones

</div>
<form class="col-md-6" action="{{route('reservaciones.search')}}" method="POST">
                                    @csrf
                                    <div class="row">

                                        <input class="form-control" id="cli_cedula" name="cli_cedula" style="width:175px ;" type="number">
                                        <button type="submit" value="btn_buscar" class="btn " style="border:solid #000 1px; background: #C6EBFD"> Buscar</button>
                                    </div>



                                </form>
<div class="col-md-2">
    
</div>
</div>
            </div>
<div class="card-body">
    

<table class="table table-striped">
<th>H Nro</th>
                    <th>Nombre</th>
                    <th>Detalle</th>
                    <th>Camas</th>
                    
           
                     <th>Personas</th><!-- niños adultos                   -->
<th>Llegada</th>
<th>Salida</th>
<th>cliente</th>
<th>recepcionista</th>
<th>total</th>
<th>Acciones</th>


@foreach($reservaciones as $res)
                 
                        <tr>
                        <td>{{$res->hab_id}}</td>
    <td>{{$res->tip_nombre}}</td>
    <td>{{$res->hab_detalle}}</td>
    <td>{{$res->tip_camas}}</td>
    <td>Adultos:{{$res->res_adultos}} Niños:{{$res->res_niños}}</td>
    <td>{{$res->res_f_llegada}}</td>
    <td>{{$res->res_f_salida}}</td>
    <td>{{$res->cli_nombre}} {{$res->cli_apellido}} - {{$res->cli_cedula}}</td>
    <td>{{$res->usu_nombre}} {{$res->usu_apellido}}</td>
    <td style="text-align: right;">${{number_format($res->res_total,2)}}</td>
                           
                            <td>
                                <div class="row">

<a href="{{route('futreservaciones_edit',$res->res_id)}}"class="btn"  style="border:solid #000 1px;margin:1%; background: #85ADFF">editar</a>
<form action="{{route('futreservaciones.activar')}}" method="POST">
    @csrf
<input type="text" hidden name="res_id" value="{{$res->res_id}}">
<input type="text" hidden name="res_f_llegada" value="{{$res->res_f_llegada}}">

<!-- <input type="text"  class="actual" id="actual" value=""> -->
    <button   class="btn" style="border:solid #000 1px; background: #ABFAB5" >
        Activar
    </button>

  
</form>


                                    <button type="button" class="btn" style="border:solid #000 1px;margin:1%; background: #FFB3AE" data-toggle="modal" data-target="#deletemodal{{$res->res_id}}">
                                        Eliminar
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="deletemodal{{$res->res_id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-dark">
                                                    <h5 class="modal-title " style="color:white;" id="staticBackdropLabel">Eliminar Temporada</h5>
                                                    <button type="button" class="close" style="color:white" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="color:#000">

                                                    <form method="POST" action="{{route('reservaciones.anular',$res->res_id)}}">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <p>Todos Los Datos De Esta reservacion Se Eliminaran!!!</p>
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
