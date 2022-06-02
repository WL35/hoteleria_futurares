@extends('layouts.app')

@section('content')
<?php 
if(isset($desde)){
$desde=$desde;
$hasta=$hasta;
}else{

    $desde="";
    $hasta="";
}
if(isset($hab_id)){
    $hab_id=$hab_id;
  
    }else{
    $hab_id="";
       
    }
    if(isset($cli_id)){
        $cli_id=$cli_id;
      
        }else{
        $cli_id="";
           
        }

 ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark" style="background: #4873C1;color:white">
                    <div class="row">
                    <form class="col-md-6" action="{{route('reporte.reporte')}}" method="POST">
                                    @csrf
                                   
                                    <div class="col-md-12 pt-2">
                            <h3>
                                Reportes

                            </h3>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <h6>Desde</h6>
                        </div>
                        <div class="col-md-2">
                            <h6>hasta:</h6>
                        </div>
                        <div class="col-md-3">
                            <h6>Tipo de Habitacion:</h6>
                        </div>
                        <div class="col-md-3">
                            <h6>Cliente:</h6>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-2">
                            <input type="date" value="{{$desde}}" class="form-control" name="desde" id="desde" id="validationCustom04" required>
                            <div class="invalid-feedback">
                                            Please select a valid state.
                                        </div>
                        </div>
                        <div class="col-md-2">
                            <input type="date" value="{{$hasta}}" class="form-control" name="hasta" id="hasta" id="validationCustom04" required>
                            <div class="invalid-feedback">
                                            Please select a valid state.
                                        </div>
                        </div>
                        <div class="col-md-3">

                        <select class="form-control " id="buscador_habitaciones" name="hab_id" id="validationCustom04" >
                        <!-- <option value="todo">Todas las Habitaciones</option> -->
                        <option disabled selected value="">Seleccione una Habitacion</option>

@foreach($tipos as $tip)
@if($hab_id==$tip->tip_id)
<option selected value="{{$tip->tip_id}}">{{$tip->tip_nombre}} Camas:{{$tip->tip_camas}}</option>
@else
<option  value="{{$tip->tip_id}}">{{$tip->tip_nombre}} Camas:{{$tip->tip_camas}}</option>
@endif
@endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a valid state.
                                        </div>
                                        <script>
                                            $("#buscador_habitaciones").select2({

                                                tags: true
                                            });
                                        </script>


                           

                        </div>
                        <div class="col-md-3">
                        <select class="form-control " id="buscador_clientes" name="cli_id" id="validationCustom04" >
                                            <option disabled selected value="">Seleccione un Cliente</option>

                                            @foreach($clientes as $cli)
                                            @if($cli_id==$cli->cli_id)
                                            <option selected value="{{$cli->cli_id}}">{{$cli->cli_cedula}} - {{$cli->cli_nombre}} {{$cli->cli_apellido}}</option>
                                            @else
                                            <option  value="{{$cli->cli_id}}">{{$cli->cli_cedula}} - {{$cli->cli_nombre}} {{$cli->cli_apellido}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a valid state.
                                        </div>
                                        <script>
                                            $("#buscador_clientes").select2({

                                                tags: true
                                            });
                                        </script>
                        </div>
                   
                        <div class="col-md-1">
                        <button type="submit"  class="btn"  style="border:solid #000 1px; background: #ABFAB5" >
                                        Buscar
                                    </button>
                        </div>
                        <div class="col-md-1">
                        <button type="submit" class="btn" name="btn_pdf" value="1" style="border:solid #000 1px; background: #FFB3AE" >
                                        PDF
                                    </button>
                        </div>


                                </form>

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
<?php
$total=0;
?>
@isset($reporte)

@foreach($reporte as $re)

<?php
$total+=$re->res_total;
?>
<tr>
    <td>{{$re->hab_id}}</td>
    <td>{{$re->tip_nombre}}</td>
    <td>{{$re->hab_detalle}}</td>
    <td>{{$re->tip_camas}}</td>
    <td>Adultos:{{$re->res_adultos}} Niños:{{$re->res_niños}}</td>
    <td>{{$re->res_f_llegada}}</td>
    <td>{{$re->res_f_salida}}</td>
    <td>{{$re->cli_nombre}} {{$re->cli_apellido}}</td>
    <td>{{$re->usu_nombre}} {{$re->usu_apellido}}</td>
    <td style="text-align: right;">${{number_format($re->res_total,2)}}</td>
</tr>
@endforeach
<tr>
    <th colspan="5">

        Total :{{number_format($total,2)}}
    </th>
</tr>

@endisset



                </table>

            </div>
        </div>
    </div>
</div>
</div>

@endsection