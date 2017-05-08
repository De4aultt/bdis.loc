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
                <li><a href="{{ route('picture.index') }}">Картини</a></li>
                <li class="active">Додати картину</li>
            </ol>
        </div>

            <div id="page-inner">

        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-content">

                        <!-- if there are creation errors, they will show here -->
                            {{ HTML::ul($errors->all()) }}

                            {{ Form::open(array('url' => 'picture')) }}

                            <div class="form-group">
                                {{ Form::label('Date_made', 'Дата виготовлення') }}
                                {{ Form::date('Date_made', Input::old('Date_made'), array('class' => 'form-control')) }}
                            </div>


                            <div class="input-field col s12">
                                {{ Form::label('File', 'Файл') }}
                                {{ Form::text('File', Input::old('File'), array('class' => 'form-control')) }}
                            </div>
                        <div class="form-group">
                            {{ Form::label('Style', 'Стиль') }}
                            {{ Form::select('Style', [ 'Не визначено' =>'Оберіть стиль', 'Колаж' => 'Колаж', 'Поп-арт' => 'Поп-арт','Портрет' => 'Портрет'], Input::old('Style'), array('class' => 'form-control')) }}
                        </div>

                        <div class="input-field col s12">
                            {{ Form::label('Price', 'Ціна') }}
                            {{ Form::number('Price', Input::old('Price'), array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('Designer_pasport_number', 'Номер дизайнера') }}

                            {{ Form::select('Designer_pasport_number', $designers , Input::old('Designer_pasport_number'), array('class' => 'form-control')) }}
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

