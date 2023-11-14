@extends('layouts.app')

@section('content')
    <h1 class="text-center mt-3 mb-3">Storico ordini</h1>
    <div class="container">
        <div class="row">
            @foreach ($orders as $order)
                <div class="col-4">
                    <div class="card bg-success-subtle">
                        <div class="card-body">
                            <h5 class="card-title">Id ordine: {{ $order->id }} </h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">Nome: {{ $order->firstname }} </h6>
                            <h6 class="card-subtitle mb-2 text-body-secondary">Cognome: {{ $order->lastname }} </h6>
                            <p class="card-text">Indirizzo di consegna: {{ $order->address }} </p>
                            <p class="card-text">Email: {{ $order->email }} </p>
                            <h5 class="card-subtitle text-success">Totale: €{{ $order->amount }}</h5>
                            <p class="card-text mt-3">Ordine effettuato:
                                <span class="text-primary-emphasis fw-semibold">{{ $order->created_at }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
