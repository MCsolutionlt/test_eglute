@extends('home')

@section('content')
    <div class="row-full">
        <div class="heading">
            <div class="heading-inside">
                <h1><span class="text-shadow">Įkelti skelbimą</span></h1>
            </div>
        </div>
    </div>
    <div class="row-full">
        <div class="ad-item-single-inside">
            <div class="center col-6 ad-form">
            {!! Form::open(['url' => route('ads_insert')])  !!}
                <div class="form-group">
                    {!! Form::label('title', 'Pavadinimas*') !!}
                    {!! Form::text('title', old('title'), ['required' => 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('text', 'Aprašymas*') !!}
                    {!! Form::textarea('text', old('text'), ['required' => 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'El. paštas*') !!}
                    {!! Form::text('email', old('email'), ['required' => 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('city', 'Miestas*') !!}
                    {!! Form::text('city', old('city'), ['required' => 'required']) !!}
                </div>
                <div class="form-group ">
                    <a href="#" title="Papildomi miestai" id="more-cities">
                        Papildomi miestai
                    </a>
                    <div class="more-cities hidden">
                        @foreach($cities as $city)
                            <div class="select-city">
                                {!! Form::checkbox('cities[]', $city['id'], null, ['id' => 'city' . $city['id']]) !!}&nbsp;
                                {!! Form::label('city' . $city['id'], $city['title']) !!}
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('address', 'Adresas*') !!}
                    {!! Form::text('address', old('address'), ['required' => 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('phone', 'Telefonas*') !!}
                    {!! Form::text('phone', old('phone', '+370'), ['required' => 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('price', 'Kaina &euro;*') !!}
                    {!! Form::text('price', old('price'), ['required' => 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('price_new', 'Kaina su nuolaida &euro;') !!}
                    {!! Form::text('price_new', old('price_new')) !!}

                </div>
                <div class="form-group">
                    {!! Form::label('photo', 'Nuotraukos') !!}
                    {!! Form::file('photo', old('photo'), ['accept' => 'image/jpeg,image/gif,image/png']) !!}
                </div>
                <div class="form-group right">
                    {!! Form::submit('Įkelti') !!}
                </div>
            {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

