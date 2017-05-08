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
                <li><a href="{{ route('order.index') }}">Замовлення</a></li>
                <li class="active">Додати замовлення</li>
            </ol>
        </div>

            <div id="page-inner">

        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-content">

                        <!-- if there are creation errors, they will show here -->
                            {{ HTML::ul($errors->all()) }}

                            {{ Form::open(array('url' => 'order')) }}

                        <div class="form-group">
                            {{ Form::label('Order_Date', 'Дата') }}
                            {{ Form::date('Order_Date', Input::old('Order_Date'), array('class' => 'form-control')) }}
                        </div>

                            <div class="input-field col s12">
                                {{ Form::label('Town', 'Місто') }}
                                {{ Form::text('Town', Input::old('Town'), array('class' => 'form-control')) }}
                            </div>

                        <div class="input-field col s12">
                            {{ Form::label('Street', 'Вулиця') }}
                            {{ Form::text('Street', Input::old('Street'), array('class' => 'form-control')) }}
                        </div>

                        <div class="input-field col s12">
                            {{ Form::label('House', 'Будинок') }}
                            {{ Form::text('House', Input::old('House'), array('class' => 'form-control')) }}
                        </div>


                        <div class="form-group">
                            {{ Form::label('Manager_pasport_number', 'Номер менеджера') }}

                            {{ Form::select('Manager_pasport_number', $managers , Input::old('Manager_pasport_number'), array('class' => 'form-control')) }}
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

