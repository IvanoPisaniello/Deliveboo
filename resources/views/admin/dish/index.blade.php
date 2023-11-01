@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div>
                <a href="{{ route('admin.dishes.create') }}" class="btn btn-outline-primary my-4 ">Aggiungi Piatto</a>
            </div>

            @foreach ($dishes as $singleDish)
                <div class="col-4 mb-4">
                    <div class="card">

                        <img src="{{ $singleDish->image }}">
                        {{-- <img src="{{ asset('/storage/' . $singleDish['image']) }}" alt="{{ $singleDish->title }}"
                    style="height: 200px"> --}}

                        <div class="card-body">
                            <h3 class="text-center">{{ $singleDish->title }}</h3>

                            {{-- <div class="">{{ $singleDish->type?->title }}</div> --}}

                            <div class="text-center">
                                <a href="{{ route('admin.dishes.show', $singleDish->id) }}" class="btn btn-primary small"
                                    type="button">Dettagli
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
