@extends('layouts.app')

@section('content')
    <div class="bg-light-gray">
        <div class="container">

            <div class="row">

                <div>
                    <a href="{{ route('admin.dishes.create') }}" class="btn btn-outline-primary my-4 ">Aggiungi Piatto</a>
                </div>

                @foreach ($dishes as $singleDish)
                    <div class="col-sm-12 col-md-4 col-lg-3 mb-4">
                        <div class="card">

                            {{-- Dish's Image --}}
                            <img src=" 
                        @if (str_contains($singleDish->image, 'http')) {{ $singleDish->image }}
                        @else
                            {{ asset('/storage/' . $singleDish->image) }} @endif "
                                alt="Dish Photo" style="height: 200px; object-fit:cover;">

                            <div class="card-body">
                                {{-- Title --}}
                                <h3 class="text-center">{{ $singleDish->title }}</h3>

                                <div class="text-center">

                                    {{-- categoria piatto --}}
                                    <div class="py-2">Categoria: {{ $singleDish->category?->title }}</div>

                                    <a href="{{ route('admin.dishes.show', $singleDish->id) }}"
                                        class="btn btn-primary small py-2" type="button">Dettagli
                                    </a>


                                    {{-- Visible or Invisible for the client --}}
                                    @if ($singleDish->visible === 1)
                                        <div class="btn btn-info"><i class="fa-solid fa-eye"></i></div>
                                    @else
                                        <div class="btn btn-info"><i class="fa-solid fa-eye-slash"></i></div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
