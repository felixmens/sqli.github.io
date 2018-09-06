@extends('main.layout')
    @section('content')
    <div id="main-content">
        <div class="container bg-white mt-5">
            <h3 class="text-center text-primary">
                    {{strtoUpper(config('app.name', 'Service App '))}}
            </h3>
            {!! Form::open(['action' => 'ServiceController@store'],'method', 'POST') !!}
                <div class="form-group">
                    {{ Form::label('Send data to a service', null) }}            
                </div>
                <div class="form-group">
                    {{ Form::text('text', null, ['class' => 'form-control', 'placeholder' => 'data'])}}
                </div>    
                <div class="form-group">
                    {{ Form::submit('Send', ['class' => 'btn btn-primary'])}}
                </div>
            {!! Form::close() !!}
            @include('inc.messages')

            <service-component></service-component>
        </div>
    </div>
    @endsection