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
                Чек {{ $chek->id}}
                <br>

                {{ Form::open([ 'method'  => 'delete', 'route' => [ 'chek.destroy', $chek->id] ]) }}
                {{ Form::submit('Видалити', ['class' => 'btn btn-small btn-danger right']) }}
                {{ Form::close() }}
                <a href="{{ URL::to('chek/' . $chek->id. '/edit') }}">
                    <div class="btn btn-small btn-info right" >Редагувати</div></a>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('main') }}">Головна</a></li>
                <li><a href="{{ route('chek.index') }}">Чеки</a></li>
                <li class="active">Інформація про чек {{ $chek->id}}</li>
            </ol>

        </div>
        <div id="page-inner">

            <div class="row">

                <div class="col-md-12">
                    <div class="card">

                        <div class="card-content">
                            <p>
                                <strong>Кількість:</strong> {{ $chek->Count }}<br>
                                <strong>Загальна:</strong> {{ $chek->Total_price }}<br>
                                <strong>Номер картини:</strong> <a href="{{ URL::to('picture/' . $chek->Picture_number)  }}">{{ $chek->Picture_number }}</a><br>
                                <strong>Номер замовлення:</strong> <a href="{{ URL::to('order/' . $chek->Order_number)  }}">{{ $chek->Order_number }}</a><br>
                                <strong>Запис створено:</strong> {{ $chek->created_at}}<br>
                                <strong>Останнє оновлення:</strong> {{ $chek->updated_at }}<br>
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
