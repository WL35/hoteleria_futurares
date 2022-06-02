
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
                <h2>REPORTE 
                </h2>
                
          

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
    <td colspan="6">

        Total :{{number_format($total,2)}}
    </td>
</tr>

@endisset



                </table>

            </div>
        </div>
    </div>
</div>
</div>

