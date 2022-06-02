@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card" >
                <div class="card-header bg-dark" style="color:white">
				<div class="row">

<div class="col-md-3 pt-3 ">
	Nueva Reservacion

</div>
</div>
                </div>
                <div class="card-body">
				@include('facturas.fields')

                </div>
            </div>
        </div>
    </div>
</div>

 
@endsection