@extends('layouts.site')

@section('css')
    @include('layouts.asset.css')
@endsection

@section('header')
    @include('site.header')
@endsection

@section('content')

<div id="page-wrapper" >
    <div class="header">
        <h1 class="page-header">
        {{ $title }}
        </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('main') }}">Головна</a></li>
                <li><a href="{{ route('client.index') }}">Клієнти</a></li>
                <li class="active">Додати клієнта</li>
            </ol>
        </div>

            <div id="page-inner">

        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-content">

                        <!-- if there are creation errors, they will show here -->
                            {{ HTML::ul($errors->all()) }}

                            {{ Form::open(array('url' => 'client')) }}

                            <div class="input-field col s12">
                                {{ Form::label('Surname', 'Прізвище') }}
                                {{ Form::text('Surname', Input::old('Surname'), array('class' => 'form-control')) }}
                            </div>

                        <div class="input-field col s12">
                            {{ Form::label('Name', 'Ім\'я') }}
                            {{ Form::text('Name', Input::old('Name'), array('class' => 'form-control')) }}
                        </div>

                        <div class="input-field col s12">
                            {{ Form::label('Father_name', 'По-батькові') }}
                            {{ Form::text('Father_name', Input::old('Father_name'), array('class' => 'form-control')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('Birthday', 'Дата народження') }}
                            {{ Form::date('Birthday', Input::old('Birthday'), array('class' => 'form-control')) }}
                        </div>

                        <div class="input-field col s12">
                            {{ Form::label('Gender', 'Стать') }}
                            {{ Form::text('Gender', Input::old('Gender'), array('class' => 'form-control')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('Manager_Pasport_Number', 'Номер менеджера') }}

                            {{ Form::select('Manager_Pasport_Number', $managers , Input::old('Manager_Pasport_Number'), array('class' => 'form-control')) }}
                        </div>


                            {{ Form::submit('Додати', array('class' => 'btn btn-primary')) }}

                            {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
    @include('layouts.asset.js')
@endsection

