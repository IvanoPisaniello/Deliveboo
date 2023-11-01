@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col ">
                <form action="{{ route('admin.dishes.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf()

                    {{-- titolo --}}

                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" name="title"
                            class="form-control @error('title') is-invalid                            
                    @enderror"
                            value="{{ old('title') }}">
                        @error('title')
                            <div class="invalid-feedback">Campo Obbligatorio</div>
                        @enderror
                    </div>


                    {{-- descrizione --}}
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea id="description" name="description"
                            class="form-control @error('description') is-invalid                            
                    @enderror">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">Campo Obbligatorio</div>
                        @enderror
                    </div>



                    {{-- immagine --}}
                    {{-- <div class="mb-3">
                    <label for="image" class="form-label">Immagine</label>
                    <input type="file" accept="image/*" name="image"
                        class="form-control @error('image') is-invalid                            
                    @enderror">
                    @error('image')
                        <div class="invalid-feedback">Campo Obbligatorio</div>
                    @enderror
                </div> --}}


                    {{-- prezzo --}}
                    <div class="mb-3">
                        <label for="price" class="form-label">Prezzo</label>
                        <input type="text" name="price" class="form-control @error('price') is-invalid                            
                        @enderror"
                            value="{{ old('price') }}">
                        @error('price')
                            <div class="invalid-feedback">Campo Obbligatorio</div>
                        @enderror
                    </div>



                    {{-- sconto --}}
                    <div class="mb-3">
                        <label for="discount" class="form-label">Sconto</label>
                        <input type="text" name="discount" class="form-control @error('discount') is-invalid                            
                        @enderror"
                            value="{{ old('discount') }}">
                        @error('discount')
                            <div class="invalid-feedback">Campo Obbligatorio</div>
                        @enderror
                    </div>



                    {{-- ingredienti --}}
                    <div class="mb-3">
                        <label for="ingredients" class="form-label">Ingredienti</label>
                        <textarea id="ingredients" name="ingredients" class="form-control @error('ingredients') is-invalid @enderror">{{ old('ingredients') }}</textarea>
                        @error('ingredients')
                            <div class="invalid-feedback">Campo Obbligatorio</div>
                        @enderror
                    </div>



                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary mt-5 mb-4 px-5 fw-bold">Aggiungi</button>
                        <button class="btn bg-danger mt-5 mb-4 px-5 fw-bold">
                            <a class="text-white" href="{{ route('admin.dishes.index') }}">Annulla</a>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
