@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card" >
                <div class="card-header bg-dark text-white">
				<div class="row">
	<div class="col-md-10">

		<h2 class=" text-white">Facturas</h2>
	</div>
	<div class="col-md-2">

	<a href="{{route('facturas.create')}}" style="border:solid #000 1px; background: #ABFAB5" class="btn">Nueva</a>

	</div>
</div>
                </div>
                <div class="card-body">
				<table class="table table-striped">
		<tr>
		
			<th>Factura Nro</th>
			<th>Fecha</th>
			<th>Cliente</th>
			<th>Acciones</th>
		</tr>
		@foreach($facturas as $f)
		<tr>
			
			<td>{{$f->fac_id}}</td>
			<td>{{$f->fac_fecha}}</td>
			<td>{{$f->cli_nombre}} {{$f->cli_apellido}}</td>
			<td>
				<a class="btn" style="border:solid #000 1px;margin:1%; background: #85ADFF" href="{{route('facturas.edit',$f->fac_id)}}">Editar</a>
				<a href="{{route('facturas.pdf',$f->fac_id)}}"class="btn" style="border:solid #000 1px;margin:1%; background: #FFB3AE">PDF</a>
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