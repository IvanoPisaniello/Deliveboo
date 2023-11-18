@extends('layouts.app')
@section('content')
    <div class="jumbotron p-5 mb-4 bg-light rounded-3">
        <div class="container">
            <div class="row justify-content-center align-items-center g-4">
                <div class="col-sm-12 col-lg-6">
                    <div>
                        <img src="{{ asset('img/logo_deliveboo.png') }}" alt="logo-deliveboo" class="img-fluid w-100">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <h1 class="display-5 fw-bold ">
                        Benvenuto in Deliveboo
                    </h1>

                    <p class="fs-4">Questo è il pannello di controllo dove puoi gestire a 360 gradi il tuo
                        ristorante,
                        controllare gli ordini, inserire i piatti e vedere le statistiche della tua attività.</p>
                    <a href="http://localhost:5174/" target="_blank" class="btn btn-orange-text-white fw-bold"
                        type="button">Vai
                        sull'app di Deliveboo</a>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container ">
            <p>Diventa un partner di Deliveboo e gestisci la tua attività.</p>
        </div>
    </div>
@endsection
