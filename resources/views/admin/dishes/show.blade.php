@extends('layouts.app')

@section('content')
    <div class="container" style="max-width: 720px">
        <div class="row">
            <div>
                <a href={{ route('admin.dishes.index') }} class="btn btn-outline-primary my-4 ">Indietro</a>
                <a href={{ route('admin.dishes.edit', $dish->id) }} class="btn btn-outline-warning my-4">Modifica
                </a>

                <form action="{{ route('admin.dishes.destroy', $dish->id) }}" method="POST" class="d-inline-block">
                    @csrf

                    {{-- Passo il vero metodo che voglio usare --}}
                    @method('DELETE')
                    <input type="submit" value="Elimina" class="btn btn-outline-danger">
                </form>
            </div>

            <div class="card my-3 p-0">
                <img src=" 
            @if (str_contains(asset('/storage/' . $dish->image), 'dishes')) {{ asset('/storage/' . $dish->image) }}
            @else
                {{ $dish->image }} @endif "
                    alt="Dish Photo" style="height: 400px; object-fit:cover;">

                {{-- <img src="{{ asset('/storage/' . $project->image) }}" class="card-img-top w-100"
                alt="{{ $project->title }}">
            <div class="card-body"> --}}
                <h5 class="card-title px-2 pt-3">{{ $dish->title }}</h5>

                <p class="card-text px-2">Descrizione: {{ $dish->description }}</p>
                <p class="card-text px-2">Ingredienti: {{ $dish->ingredients }}</p>


                <div>
                    <p class="card-text">
                        <small class="text-body-secondary">
                            <div class="card-text px-2">Prezzo: {{ $dish->price }}€</div>
                        </small>
                    </p>

                </div>
            </div>

        </div>
    </div>
@endsection
