@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col ">
                <form action="{{ route('admin.dishes.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- title --}}
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- description --}}
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror"></textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-labal">Carica Immagine</label>
                        <input type="file" class="form-control @error('thumb') is-invalid @enderror" name="image" accept="image/*">
                        @error('image')
                            <div class="alert text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- price --}}
                    <div class="mb-3">
                        <label for="price" class="form-label">Prezzo</label>
                        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror">
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- discount --}}
                    <div class="mb-3">
                        <label for="discount" class="form-label">Sconto</label>
                        <input type="text" name="discount" class="form-control @error('discount') is-invalid @enderror">
                        @error('discount')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- ingredients --}}
                    <div class="mb-3">
                        <label for="ingredients" class="form-label">Ingredienti</label>
                        <textarea id="ingredients" name="ingredients" class="form-control @error('ingredients') is-invalid @enderror"></textarea>
                        @error('ingredients')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- visible --}}
                    <div class="mb-3">
                        <label class="form-label">Visible</label>
                        <select class="form-select" name="visible">
                            <option value="0" selected>Not Visible</option>
                            <option value="1">Visble</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary mt-5 mb-4 px-5 fw-bold" type="submit">Aggiungi</button>
                        <button class="btn bg-danger mt-5 mb-4 px-5 fw-bold">
                            <a class="text-white" href="{{ route('admin.dishes.index') }}">Annulla</a>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
