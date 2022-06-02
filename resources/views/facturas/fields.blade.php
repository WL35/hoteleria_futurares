<?php 
if(isset($factura)){
     $fac_id=$factura->fac_id;
     $cli_id=$factura->cli_id;
 
     $fac_fecha=$factura->fac_fecha;

     $fac_tipo_pago=$factura->fac_tipo_pago;
  

}else{

     $fac_id="";
     $cli_id="";
 
     $fac_fecha=date('Y-m-d');
 

 
     $fac_tipo_pago="EFECTIVO";

}
?>
<form action="{{route('facturas.store')}}" method="POST">
	@csrf
	<div class="row">
		<div class="col-md-3">
			<label for="cli_id">Cliente</label>
			<select class="form-control " id="buscador_clientes" name="cli_id" id="validationCustom04" required>
                                            <option disabled selected value="">Seleccione un Cliente</option>

                                            @foreach($clientes as $cli)
											@if($cli->cli_id==$cli_id)
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
	
		<div class="col-md-3">
			<label for="fac_fecha">Fecha</label>
			<input type="date" id="fac_fecha" value="{{$fac_fecha}}" required name="fac_fecha" class="form-control">
		</div>
	

	
	
		<div class="col-md-3">
			<label for="fac_fecha">Tipo Pago</label>
          <select name="fac_tipo_pago" id="fac_tipo_pago" class="form-control">
          	<option value="EFECTIVO">EFECTIVO</option>
          	<option value="TRANSFERENCIA">TRANSFERENCIA</option>
          	<option value="TARJETA">TARJETA</option>
          </select>
		</div>
	
		
			   <div class="col-md-3" style="margin-top: 2.5%;">
				   <button type="submit" class="btn btn-success">Guardar</button>
			   </div>
	</div>

</form>

<form action="{{route('facturas.detalle')}}" method="POST" style="margin-top: 3%;" >
	@csrf
	<table class="table">
		<tr>
			<th colspan="6" class="bg-dark text-white text-center">DETALLE DE LA FACTURA</th>
		</tr>
		<tr>
			<th>#</th>
			<th>Habitacion </th>
			<th>camas</th>
			
			<th>Valor total</th>
			<th>Acciones</th>
		</tr>
		<tr>
			<td></td>
			<td>
			<select class="form-control " id="buscador_habitaciones" name="hab_id" id="validationCustom04" >
											<option disabled selected value="">Seleccione un Habitacion</option>

											@foreach($habitaciones as $hab)
											<option value="{{$hab->hab_id}}">Habitacion Nro: {{$hab->hab_id}} </option>
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
			</td>
			<td>
				<input type="hidden" id="fac_id" name="fac_id" value="{{$fac_id}}" />
				<input type="number" readonly name="fad_cantidad" id="fad_cantidad" class="form-control">

			</td>
			
			<td>
				<input type="text" id="fad_vt" name="fad_vt" readonly class="form-control">
			</td>
			<td>
				<button class="btn btn-success" name="btn_detalle" value="btn_detalle" >+</button>
			</td>
		</tr>
	   @isset($detalle)
	   <?php 
	      $subt=0;
	   ?>
	         @foreach($detalle as $dt)
	         <?php $subt+=$dt->tip_precio;?>
	            <tr>
	            	<td>{{$loop->iteration}}</td>
	            	<td>Habitacion Nro: {{$dt->hab_id}} - {{$dt->tip_nombre}} </td>
	            	<td>Camas: {{$dt->tip_camas}}</td>
	            
	            	<td class="text-right">{{number_format($dt->tip_precio,2)}}$</td>
	            	<td>
	            		<button class="btn btn-danger btn-sm" name="btn_eliminar" value="{{$dt->fad_id}}" >Del</button>
	            	</td>
	            </tr>
	         @endforeach
	         <?php 
	            $vt=$subt;
	         ?>
	         <tr>
	         	    <td colspan="4" class="text-right">Subt:</td>
	         	    <td class="text-right">{{number_format($subt,2)}}$</td>
	         </tr>
	        
	    
	         <tr>
	         	    <td colspan="4" class="text-right">VT:</td>
	         	    <td class="text-right">{{number_format($vt,2)}}$</td>
	         </tr>
        @else
        <tr><th colspan="5" class="alert alert-warning">No existen datos</th></tr>
        @endisset

	</table>
	<a href="{{route('facturas.index')}}" class="btn btn-dark">Guardar Factura</a>
</form>
<script>
window.onload = function(){
      const obj_cant=document.querySelector("#fad_cantidad");
      const obj_vu=document.querySelector("#fad_vu");
      obj_cant.addEventListener("change",()=>{
      	calculos();
      });
      obj_vu.addEventListener("change",()=>{
      	calculos();
      });

}

const calculos=()=>{
      	const vc=document.querySelector("#fad_cantidad");
      	const vu=document.querySelector("#fad_vu");
      	const vt=vc.value*vu.value;
      	document.querySelector("#fad_vt").value=vt;

}

</script>
