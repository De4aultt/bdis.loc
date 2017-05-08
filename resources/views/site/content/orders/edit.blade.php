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
                Замовлення {{ $order->Order_id }}


                {{ Form::open([ 'method'  => 'delete', 'route' => [ 'order.destroy', $order->Order_id ] ]) }}
                {{ Form::submit('Видалити', ['class' => 'btn btn-small btn-danger right']) }}
                {{ Form::close() }}

            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('main') }}">Головна</a></li>
                <li><a href="{{ route('order.index') }}">Замовлення</a></li>
                <li class="active">Редагувати замовлення {{ $order->Order_id }}</li>
            </ol>

        </div>
        <div id="page-inner">

            <div class="row">

                <div class="col-md-12">
                    <div class="card">

                        <div class="card-content">
                            <!-- if there are creation errors, they will show here -->
                            {{ HTML::ul($errors->all()) }}

                            {{ Form::model($order, array('route' => array('order.update', $order->Order_id), 'method' => 'PUT')) }}


                            <div class="form-group">
                                {{ Form::label('Town', 'Місто') }}
                                {{ Form::text('Town', null, array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('Street', 'Вулиця') }}
                                {{ Form::text('Street', null, array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('House', 'Будинок') }}
                                {{ Form::text('House', null, array('class' => 'form-control')) }}
                            </div>


                            <div class="form-group">
                                {{ Form::label('Manager_pasport_number', 'Номер менеджера') }}

                                {{ Form::select('Manager_pasport_number', $managers , Input::old('Manager_pasport_number'), array('class' => 'form-control')) }}
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
