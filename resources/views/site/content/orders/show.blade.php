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
                Замовлення {{ $order->Order_id}}
                <br>

                {{ Form::open([ 'method'  => 'delete', 'route' => [ 'order.destroy', $order->Order_id] ]) }}
                {{ Form::submit('Видалити', ['class' => 'btn btn-small btn-danger right']) }}
                {{ Form::close() }}
                <a href="{{ URL::to('order/' . $order->Order_id. '/edit') }}">
                    <div class="btn btn-small btn-info right" >Редагувати</div></a>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('main') }}">Головна</a></li>
                <li><a href="{{ route('order.index') }}">Замовлення</a></li>
                <li class="active">Інформація про замовлення {{ $order->Order_id}}</li>
            </ol>

        </div>
        <div id="page-inner">

            <div class="row">

                <div class="col-md-12">
                    <div class="card">

                        <div class="card-content">
                            <p>
                                <strong>ID:</strong> {{ $order->Order_id }}<br>
                                <strong>Дата:</strong> {{ $order->Order_Date }}<br>
                                <strong>Місто:</strong> {{ $order->Town }}<br>
                                <strong>Вулиця:</strong> {{ $order->Street }}<br>
                                <strong>Будинок:</strong> {{ $order->House }}<br>
                                <strong>Номер менеджера:</strong> <a href="{{ URL::to('manager/' . $order->Manager_pasport_number)  }}"> {{ $order->Manager_pasport_number }}</a><br>
                                <strong>Запис створено:</strong> {{ $order->created_at}}<br>
                                <strong>Останнє оновлення:</strong> {{ $order->updated_at }}<br>
                            </p>
                            <div class="clearBoth"><br/></div>

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
