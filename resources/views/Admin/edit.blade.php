@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Modifica Profilo') }}</div>

                <div class="card-body">
                    <form enctype="multipart/form-data" action="{{ route('user.update',Auth::user()->id)}}" method="POST" >
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" value='{{old('name',$to_edit['name'])}}' name="name"  {{-- required --}}  autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Cognome') }}</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" value='{{old('surname',$to_edit['surname'])}}' name="surname">
                                @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Città') }}</label>

                            <div class="col-md-6">
                                <input id="city" value='{{old('city',$to_edit['city'])}}' type="text" class="form-control @error('city') is-invalid @enderror" name="city">
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo') }}</label>

                            <div class="col-md-6">
                                <input id="address" value='{{old('address',$to_edit['address'])}}' type="text" class="form-control @error('address') is-invalid @enderror" name="address">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">{{ __('Data di nascita') }}</label>

                            <div class="col-md-6">
                                <input id="date_of_birth" value='{{old('date_of_birth',$to_edit['date_of_birth'])}}' type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth">
                                @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="CF" class="col-md-4 col-form-label text-md-right">{{ __('CF') }}</label>

                            <div class="col-md-6">
                                <input id="CF" value='{{old('CF',$to_edit['CF'])}}' type="text" class="form-control @error('CF') is-invalid @enderror" name="CF">
                                @error('CF')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                        </div>

                        <div class="form-group row">
                            <label for="phone_number"  class="col-md-4 col-form-label text-md-right">{{ __('Cellulare') }}</label>

                            <div class="col-md-6">
                                <input id="phone_number" value='{{old('phone_number',$to_edit['phone_number'])}}' type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number">
                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="url_cv" class="col-md-4 col-form-label text-md-right">{{ __('Link cv') }}</label>

                            <div class="col-md-6">
                                <input id="url_cv" type="text" class="form-control @error('url_cv') is-invalid @enderror" name="url_cv" value='{{old('url_cv',$to_edit['url_cv'])}}'>
                                @error('url_cv')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="url_img" class="col-md-4 col-form-label text-md-right">{{ __('Immagine Profilo') }}</label>

                            <div class="col-md-6">
                                <input id="url_img" type="file" class="form-control @error('url_img') is-invalid @enderror" name="url_img" >
                                @error('url_img')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                            
                            <div class="form-group row">
                                <label for="visit_types" class="col-md-4 col-form-label text-md-right">{{ __('Prestazioni') }}</label>
    
                                <div class="col-md-6">
                                    <input id="visit_types" value='{{old('CF',$to_edit['visit_types'])}}' type="text" class="form-control " name="visit_types">
                                    
                                </div>
    
    
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4 text-md-right">
                                    <label class="label-control " for="specializations">Specializzazione</label>
                                </div>
                                <div id="selects" class="col-md-6">
                                    <select class="form-control mb-2 @error('specializations') is-invalid @enderror"
                                    name="specializations[]" id="specializations">
                                        <option value=""> - selezionare una categoria - </option>
                                        @foreach($specializations as $spec)
                                            <option 
                                            value="{{ $spec->id }}">{{ $spec->name }}</option>
                                        @endforeach
                                    </select>
                                   @error('specializations')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                   @enderror
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button id="click" type="button" class="btn btn-dark">Aggiungi</button>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Conferma Modifiche') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
         let index =1;
        $('#click').click(function(){
            console.log('test');
            $('#selects').append(`<select class="form-control @error('category_id') is-invalid @enderror"
                                     name="specializations[]" id="specializations">
 
                                         <option value=""> - selezionare una categoria - </option>
                                         @foreach($specializations as $spec)
                                             <option @if (old('specializations')== $spec->id)
                                                 selected
                                             @endif
                                             value="{{ $spec->id }}">{{ $spec->name }}</option>
                                         @endforeach
                                     </select>`)
        })
    })
 </script>
@endsection
