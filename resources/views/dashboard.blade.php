@extends('layouts.app')

@section('content')
<div class="container-fluid h-100">
    <h2 class="fs-4 text-secondary my-4">
        Benvenuto nella tua DASHBOARD: {{ Auth::user()->name }}
    </h2>

    <div class="row h-100 position-relative">
        <div class="col-md-6 rounded-4 overflow-hidden position-relative bg-warning text-white" >
            {{-- Lato sinistro con le informazioni del ristorante --}}
            <div class="p-4">
                <h1>{{ Auth::user()->restaurant->name }}</h1>
                <h2>{{ Auth::user()->restaurant->address }}</h2>
            </div>
        </div>
        <div class="col-md-6 overflow-hidden  text-center" style="background-color: #FFFFFF;">
            {{-- Lato destro con l'immagine --}}
            <img src="{{ asset('storage/' . Auth::user()->restaurant->image) }}" alt="Restaurant Image" class="img-fluid rounded-4" style="height: 100%; object-fit: cover;">
        </div>
    </div>
    <div class="p-4 mt-3">
        <h3><a href="{{ route('dashboard.orders') }}" class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
            Vedi statistiche ordini
        </a></h3>
    </div>
</div>
@endsection