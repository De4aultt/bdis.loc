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
                <li><a href="{{ route('chek.index') }}">Чеки</a></li>
                <li class="active">Додати чек</li>
            </ol>
        </div>

            <div id="page-inner">

        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-content">

                        <!-- if there are creation errors, they will show here -->
                            {{ HTML::ul($errors->all()) }}

                            {{ Form::open(array('url' => 'chek')) }}


                        <div class="input-field col s12">
                            {{ Form::label('Count', 'Кількість') }}
                            {{ Form::number('Count', Input::old('Count'), array('class' => 'form-control')) }}
                        </div>

                        <div class="input-field col s12">
                            {{ Form::label('Total_price', 'Загальна ціна') }}
                            {{ Form::number('Total_price', Input::old('Total_price'), array('class' => 'form-control')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('Picture_number', 'Номер картини') }}
                            {{ Form::select('Picture_number', $pictures , Input::old('Picture_number'), array('class' => 'form-control')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('Order_number', 'Номер замовлення') }}
                            {{ Form::select('Order_number', $orders , Input::old('Order_number'), array('class' => 'form-control')) }}
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

