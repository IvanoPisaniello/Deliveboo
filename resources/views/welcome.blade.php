@extends('layouts.app')
@section('content')

<div class="jumbotron p-5 mb-4 bg-light rounded-3">
    <div class="container py-5">
        <div style="width: 300px">
            <img src="{{ asset('img/logo_deliveboo.png') }}" alt="logo-deliveboo"
            class="img-fluid">
        </div>
        <h1 class="display-5 fw-bold mt-5">
            Benvenuto in Deliveboo
        </h1>

        <p class="col-md-8 fs-4">Questo è il pannello di controllo dove puoi gestire a 360 gradi il tuo ristorante, controllare gli ordini, inserire i piatti e vedere le statistiche della tua attività.</p>
        <a href="http://localhost:5174/" target="_blank" class="btn btn-success btn-lg" type="button">Vai sull'app di Deliveboo</a>
    </div>
</div>

<div class="content">
    <div class="container">
        <p>Diventa un partner di Deliveboo e gestisci la tua attività.</p>
    </div>
</div>
@endsection