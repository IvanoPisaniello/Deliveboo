@extends('layouts.app')

@section('content')
    <h1 class="text-center mt-3">Storico ordini</h1>
    @dump($orders)
@endsection