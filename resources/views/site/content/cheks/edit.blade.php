@extends('layouts.site')

@section('css')
    @include('layouts.asset.css')
@endsection

@section('header')
    @include('site.header')
@endsection

@section('content')
    <div id="page-wrapper">
        <div class="header">
            <h1 class="page-header">
                Чек {{ $chek->id }}


                {{ Form::open([ 'method'  => 'delete', 'route' => [ 'chek.destroy', $chek->id ] ]) }}
                {{ Form::submit('Видалити', ['class' => 'btn btn-small btn-danger right']) }}
                {{ Form::close() }}

            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('main') }}">Головна</a></li>
                <li><a href="{{ route('chek.index') }}">Чеки</a></li>
                <li class="active">Редагувати чек {{ $chek->id }}</li>
            </ol>

        </div>
        <div id="page-inner">

            <div class="row">

                <div class="col-md-12">
                    <div class="card">

                        <div class="card-content">
                            <!-- if there are creation errors, they will show here -->
                            {{ HTML::ul($errors->all()) }}

                            {{ Form::model($chek, array('route' => array('chek.update', $chek->id), 'method' => 'PUT')) }}


                            <div class="form-group">
                                {{ Form::label('Count', 'Кількість') }}
                                {{ Form::number('Count', null, array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('Total_price', 'Загальна ціна') }}
                                {{ Form::number('Total_price', null, array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('Picture_number', 'Номер картини') }}
                                {{ Form::select('Picture_number', $pictures , Input::old('Picture_number'), array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('Order_number', 'Номер замовлення') }}
                                {{ Form::select('Order_number', $orders , Input::old('Order_number'), array('class' => 'form-control')) }}
                            </div>


                            {{ Form::submit('Редагувати', array('class' => 'btn btn-primary')) }}

                            {{ Form::close() }}







                        </div>
                    </div>

                    <footer><p>All right reserved. Template by: <a href="https://webthemez.com/admin-template/">WebThemez.com</a></p></footer>
                </div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>
    </div>
    <!-- /. WRAPPER  -->



@endsection

@section('js')
    @include('layouts.asset.js')
@endsection
