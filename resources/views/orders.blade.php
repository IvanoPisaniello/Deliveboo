@extends('layouts.app')

@section('content')
    <h1 class="text-center mt-3 mb-3">Storico ordini</h1>
    <div class="container">
        <div class="row row-gap-3">
            @foreach ($orders as $order)
                <div class="col-sm-12 col-md-4 col-lg-3">
                    <div class="card bg-secondary-subtle">
                        <div class="card-body">
                            <h5 class="card-title pb-2">Ordine N° {{ $order->id }} </h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">Nome: {{ $order->firstname }} </h6>
                            <h6 class="card-subtitle mb-2 text-body-secondary">Cognome: {{ $order->lastname }} </h6>
                            <div class="pt-1">Indirizzo: {{ $order->address }} </div>
                            <div class="pb-4">Email: {{ $order->email }} </div>
                            <h5 class="card-subtitle text-success pb-2">Totale: €{{ $order->amount }}</h5>
                            <small class="card-text ">Ordine effettuato:
                                <span class="text-primary-emphasis fw-semibold">{{ $order->created_at }}</span>
                            </small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
