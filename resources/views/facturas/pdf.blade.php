<style>
	*{
		font-family:sans-serif ;
		font-size:12px;
	}
</style>
<h3>Factura No:{{$factura->fac_id}}</h3>
<h3>Cliente:{{$factura->cli_nombre}}</h3>
<h3>Ruc:{{$factura->cli_cedula}}</h3>
<h3>Direccion:Quito</h3>
<div style="background:#2BA0CC; text-align:center ;" >Detalle Factura</div>
<table style="width:85%">
	<tr>
	<th>#</th>
			<th style="text-align: left;">Habitacion </th>
			<th style="text-align: left;">camas</th>
			
			<th style="text-align: left;">Valor total</th>
		
	</tr>
	<?php 
	      $subt=0;
	   ?>
	@foreach($detalle as $d)
	<?php $subt+=$d->tip_precio;?>

	<tr>
		<td>{{$loop->iteration}}</td>
	            	<td>Habitacion Nro: {{$d->hab_id}} - {{$d->tip_nombre}} </td>
	            	<td>Camas: {{$d->tip_camas}}</td>
	            
	            	<td class="text-right">{{number_format($d->tip_precio,2)}}$</td>
	</tr>
	@endforeach	
	<?php
	$vt=$subt;
	?>
	<tr>
		<td colspan="3" style="text-align:right;">Subt:{{$vt}}</td>
	</tr>
	
	
	<tr>
		<td colspan="3" style="text-align:right;">Total:{{$vt}}</td>
	</tr>
</table>
