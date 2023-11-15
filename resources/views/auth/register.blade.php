@extends('layouts.app')

@section('content')


    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}"  id="onFormSubmit" enctype="multipart/form-data">
                            @csrf

                            {{-- Name --}}
                            <div class="mb-4 row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nome e Cognome *') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" 
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                              
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                           
                                        </span>
                                    @enderror
                                  
                                </div>
                            </div>

                            {{-- Email --}}
                            <div class="mb-4 row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo E-mail *') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    {{-- @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror --}}
                                   
                                </div>
                            </div>

                            {{-- Password --}}
                            <div class="mb-4 row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password *') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">
                                        
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password *') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>


                            {{-- restaurant name --}}
                            <div class="mb-4 row">
                                <label for="restaurant_name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nome Ristorante *') }}</label>

                                <div class="col-md-6">
                                    <input id="restaurant_name" type="text"
                                        class="form-control @error('restaurant_name') is-invalid @enderror"
                                        name="restaurant_name" value="{{ old('restaurant_name') }}" required
                                        autocomplete="restaurant_name">

                                    @error('restaurant_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  
                                </div>
                            </div>

                            {{-- vat name --}}
                            <div class="mb-4 row">
                                <label for="vat"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Partita Iva *') }}</label>

                                <div class="col-md-6">
                                    <input id="vat" type="text"
                                        class="form-control @error('vat') is-invalid @enderror" name="vat"
                                        value="{{ old('vat') }}" required autocomplete="vat">

                                    @error('vat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  
                                </div>
                            </div>


                            {{-- user address  --}}
                            <div class="mb-4 row">
                                <label for="user_address"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo del ristoratore *') }}</label>

                                <div class="col-md-6">
                                    <input id="user_address" type="text"
                                        class="form-control @error('user_address') is-invalid @enderror" name="user_address"
                                        value="{{ old('user_address') }}" required autocomplete="user_address">

                                    @error('user_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                 
                                </div>
                            </div>

                            {{-- image --}}
                    <div class="mb-3">
                        <label class="form-labal">Carica Immagine</label>
                        <input type="file" class="form-control @error('thumb') is-invalid @enderror" name="image"
                            accept="image/*">
                        @error('image')
                            <div class="alert text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Telephone Number --}}

                    <div class="mb-4 row">
                        <label for="telephone_number" class="col-md-4 col-form-label text-md-right">{{ __('Numero di Telefono *') }}</label>
                    
                        <div class="col-md-6">
                            <input id="telephone_number" type="tel" class="form-control @error('telephone_number') is-invalid @enderror"
                                name="telephone_number" value="{{ old('telephone_number') }}" autocomplete="telephone_number">
                    
                            @error('telephone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                            {{-- type_id --}}
                            <div class="mb-4 row">
                                <label for="type_id"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Tipologia del Ristorante *') }}</label>

                                <div class="col-md-6">

                                    {{-- checkboxes for the type --}}
                                    <div class="mb-3">
                                        @foreach ($types as $type)
                                            <div class="form-check form-check-inline">
                                                <input id="types" name="types[]"
                                                    class="form-check-input @error('types') is-invalid @enderror"
                                                    type="checkbox" value="{{ $type->id }}">
                                                <label class="form-check-label"
                                                    for="{{ $type->name }}">{{ $type->name }}</label>
                                                @error('types')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                              
                                            </div>
                                        @endforeach
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <div class="col-md-6 offset-md-4">
                                    <div id="errorDiv" class="text-danger"></div>
                                    <p class="">I campi obbligatori sono contrassegnati con l'asterisco</p>
                                </div>
                            </div>
                            <div class="mb-4 row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" id="onRegisterBtn">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
