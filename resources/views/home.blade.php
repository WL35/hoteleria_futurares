@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark" style="color:white">Habitaciones</div>
                <div class="card-body">

                <div class="row">
                    <div class="col-md-4">
                    <div class="card border-success mb-3" style="margin:1%;">

<div class="card-body text-success">
    <h5 class="card-title text-dark">{{$habitaciones1->total}} Habitaciónes</h5>

    <p style="margin-bottom:-1%;">
        Sin Reservar
    </p>
    <p style="margin-bottom:-1%;">
        
    </p>
    <p style="margin-bottom:-5%;">
        
    </p>



   <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" style="position: absolute; right: 13%;top: 30%;" fill="currentColor" class="bi bi-box2-fill" viewBox="0 0 16 16">
    <path d="M3.75 0a1 1 0 0 0-.8.4L.1 4.2a.5.5 0 0 0-.1.3V15a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V4.5a.5.5 0 0 0-.1-.3L13.05.4a1 1 0 0 0-.8-.4h-8.5ZM15 4.667V5H1v-.333L1.5 4h6V1h1v3h6l.5.667Z" />
    </svg>

</div>

</div>
                    </div>
                    <div class="col-md-4">

                    <div class="card border-danger mb-3" style="margin:1%;">

<div class="card-body text-danger">
    <h5 class="card-title text-dark">{{$habitaciones2->total}} Habitaciónes</h5>

    <p style="margin-bottom:-1%;">
        Ya Reservadas
    </p>
    <p style="margin-bottom:-1%;">
        
    </p>
    <p style="margin-bottom:-5%;">
        
    </p>



   <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" style="position: absolute; right: 13%;top: 30%;" fill="currentColor" class="bi bi-box2-fill" viewBox="0 0 16 16">
    <path d="M3.75 0a1 1 0 0 0-.8.4L.1 4.2a.5.5 0 0 0-.1.3V15a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V4.5a.5.5 0 0 0-.1-.3L13.05.4a1 1 0 0 0-.8-.4h-8.5ZM15 4.667V5H1v-.333L1.5 4h6V1h1v3h6l.5.667Z" />
    </svg>

</div>

</div>
                    </div>
                    <div class="col-md-4">
                       
<div class="card border-dark mb-3" style="margin:1%;">

<div class="card-body text-dark">
    <h5 class="card-title text-dark">{{$habitaciones3->total}} Habitaciónes</h5>

    <p style="margin-bottom:-1%;">
En Mantenimiento
    </p>
    <p style="margin-bottom:-1%;">
        
    </p>
    <p style="margin-bottom:-5%;">
        
    </p>



   <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" style="position: absolute; right: 13%;top: 30%;" fill="currentColor" class="bi bi-box2-fill" viewBox="0 0 16 16">
    <path d="M3.75 0a1 1 0 0 0-.8.4L.1 4.2a.5.5 0 0 0-.1.3V15a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V4.5a.5.5 0 0 0-.1-.3L13.05.4a1 1 0 0 0-.8-.4h-8.5ZM15 4.667V5H1v-.333L1.5 4h6V1h1v3h6l.5.667Z" />
    </svg>

</div>

</div> 
                    </div>
                </div>

                 




                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection