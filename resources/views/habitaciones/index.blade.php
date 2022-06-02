@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header bg-dark" style="background: #4873C1;color:white">
                    <div class="row">




                        <div class="col-md-3 pt-3 ">
                            HABITACIONES

                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-2 pt-2">
                                    <label for="">Tipo De Habitacion</label>

                                </div>
                                <form class="col-md-8 pt-2" action="{{route('habitaciones.search')}}" method="POST">
                                    @csrf
                                    <div class="row">

                                        <select name="tip_id" class="form-control" style="width:50% ;" id="validationCustom04" required>
                                            <option selected disabled value="">Selecione un Tipo</option>
                                            <option value="todo">Todas las Habitaciones</option>

                                            @foreach($tipos as $tip)
                                            <option value="{{$tip->tip_id}}">{{$tip->tip_nombre}} Camas:{{$tip->tip_camas}}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a valid state.
                                        </div>

                                        <button type="submit" value="btn_buscar" class="btn " style="border:solid #000 1px; background: #C6EBFD"> Buscar</button>
                                    </div>



                                </form>
                                <div class="col-md-2 pt-2">
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
                                                    <h5 class="modal-title " style="color:white;" id="staticBackdropLabel">Nueva Habitación</h5>
                                                    <button type="button" class="close" style="color:white" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="color:#000">

                                                    <form method="POST" action="{{route('habitaciones.store')}}">
                                                        @csrf



                                                        <div class="form-group row">
                                                            <label for="hab_detalle" class="col-md-4 col-form-label text-md-right">{{ __('Detalle') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="hab_detalle" type="text" class="form-control @error('hab_detalle') is-invalid @enderror" name="hab_detalle" value="{{ old('hab_detalle') }}" required autocomplete="hab_detalle" autofocus>

                                                                @error('hab_detalle')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="hab_estado" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>

                                                            <div class="col-md-6">
                                                                <!-- <input id="usu_cli_cedula" type="number" class="form-control @error('cli_cedula') is-invalid @enderror" name="cli_cedula" value="{{ old('cli_cedula') }}" required autocomplete="cli_cedula" autofocus> -->
                                                                <select name="hab_estado" id="hab_estado" class="form-control">
                                                                    <option selected value="1">Disponible</option>

                                                                </select>
                                                                @error('hab_estado')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="tip_id" class="col-md-4 col-form-label text-md-right">{{ __('Tipo') }}</label>

                                                            <div class="col-md-6">

                                                                <!-- <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> -->





                                                                <select name="tip_id" class="form-control" id="validationCustom04" required>
                                                                    <option selected disabled value="">Selecione un Tipo</option>
                                                                    @foreach($tipos as $tip)
                                                                    <option value="{{$tip->tip_id}}">{{$tip->tip_nombre}} - Camas {{$tip->tip_camas}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Please select a valid state.
                                                                </div>






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
            </div>
            <div class="card-body">


                <div class="">
                    <div class="row">




                        @foreach($habitaciones as $hab)
                        @if($hab->hab_estado==1)
                        <div class="card border-success mb-3" style="width: 23%;margin:1%;">

                            <div class="card-body text-success">
                                <h5 class="card-title text-dark">Habitación NRO {{$hab->hab_id}}</h5>

                                <p style="margin-bottom:-1%;">
                                    {{$hab->tip_nombre}}
                                </p>
                                <p style="margin-bottom:-1%;">
                                    - {{$hab->hab_detalle}}
                                </p>
                                <p style="margin-bottom:-5%;">
                                    - Camas:{{$hab->tip_camas}}
                                </p>
                                
<a href="{{route('habitaciones.edit',$hab->hab_id)}}" type="button">

    <svg    xmlns="http://www.w3.org/2000/svg" width="20" height="20" style="position: absolute; right: 6%;top: 9%;" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
        <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
    </svg>
</a>
                           
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" style="position: absolute; right: 20%;top: 30%;" fill="currentColor" class="bi bi-box2-fill" viewBox="0 0 16 16">
  <path d="M3.75 0a1 1 0 0 0-.8.4L.1 4.2a.5.5 0 0 0-.1.3V15a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V4.5a.5.5 0 0 0-.1-.3L13.05.4a1 1 0 0 0-.8-.4h-8.5ZM15 4.667V5H1v-.333L1.5 4h6V1h1v3h6l.5.667Z"/>
</svg> -->

                            </div>



                            <a href="{{route('reservaciones.create',$hab->hab_id)}}" class="card-footer bg-success  text-light" style="text-decoration:none; ">
                                Reservar
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
  <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
</svg>


                            </a>

                        </div>

                        @endif


                        @if($hab->hab_estado==2)
                        <div class="card border-danger mb-3" style="width: 23%;margin:1%;">

                            <div class="card-body text-danger">
                                <h5 class="card-title text-dark">Habitación NRO {{$hab->hab_id}}</h5>


                                <p style="margin-bottom:-1%;">
                                    {{$hab->tip_nombre}}
                                </p>
                                <p style="margin-bottom:-1%;">
                                    - {{$hab->hab_detalle}}
                                </p>
                                <p style="margin-bottom:-5%;">
                                    - Camas:{{$hab->tip_camas}}
                                </p>

                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" style="position: absolute; right: 6%;top: 9%;" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
  <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
</svg>
                            </div>
                            <div class="row card-footer bg-danger" style="width: 100%;margin:0%; ">
                                <div class="col-md-6" style="border-right: solid 1px white;">
                                    <a href="{{route('habitaciones.liberar',$hab->hab_id)}}" class="  text-light" style="text-decoration:none; " >
                                        Liberar
                                        <i class="bi bi-caret-right-fill"></i>

                                    </a>
                                   
                                </div>
                                <div class="col-md-6">

                                    <a href="{{route('reservaciones.edit',$hab->hab_id)}}" class="   text-light" style="text-decoration:none;">
                                        Editar
                                        <i class="bi bi-caret-right-fill"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                        @endif



                        @if($hab->hab_estado==3)
                        <div class="card border-dark mb-3" style="width: 23%;margin:1%;">

                            <div class="card-body text-dark">
                                <h5 class="card-title text-dark">Habitación NRO {{$hab->hab_id}}</h5>


                                <p style="margin-bottom:-1%;">
                                    {{$hab->tip_nombre}}
                                </p>
                                <p style="margin-bottom:-1%;">
                                    - {{$hab->hab_detalle}}
                                </p>
                                <p style="margin-bottom:-5%;">
                                    - Camas:{{$hab->tip_camas}}
                                </p>

                                <a href="{{route('habitaciones.edit',$hab->hab_id)}}" type="button">

<svg    xmlns="http://www.w3.org/2000/svg" width="20" height="20" style="position: absolute; right: 6%;top: 9%;" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
    <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
</svg>
</a>
                            </div>
                            <div href="" class="card-footer bg-dark  text-light" style="text-decoration:none; ">
                                No Disponible 
                                <i class="bi bi-caret-right-fill"></i>
                            </div>

                        </div>
                        @endif


                        @endforeach






                    </div>

                </div>
            </div>
        </div>
    </div>



</div>
</div>
@endsection