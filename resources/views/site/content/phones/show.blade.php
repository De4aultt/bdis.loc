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
                Телефон менеджера {{  $phone->Manager_pasport_number}}
                <br>

                {{ Form::open([ 'method'  => 'delete', 'route' => [ 'phone.destroy', $phone->Phone_number_id] ]) }}
                {{ Form::submit('Видалити', ['class' => 'btn btn-small btn-danger right']) }}
                {{ Form::close() }}
                <a href="{{ URL::to('phone/' . $phone->Phone_number_id. '/edit') }}">
                    <div class="btn btn-small btn-info right" >Редагувати</div></a>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('main') }}">Головна</a></li>
                <li><a href="{{ route('phone.index') }}">Телефон</a></li>
                <li class="active">Інформація про телефон менеджера {{  $phone->Manager_pasport_number}}</li>
            </ol>

        </div>
        <div id="page-inner">

            <div class="row">

                <div class="col-md-12">
                    <div class="card">

                        <div class="card-content">
                            <p>
                                <strong>Номер манеджера:</strong> <a href="{{ URL::to('manager/' . $phone->Manager_pasport_number)  }}">{{$phone->Manager_pasport_number}}</a><br>
                                <strong>Мобільний:</strong> {{$phone->Mobile}}<br>
                                <strong>Домашній:</strong> {{$phone->Home}}<br>
                                <strong>Запис створено:</strong> {{ $phone->created_at}}<br>
                                <strong>Останнє оновлення:</strong> {{ $phone->updated_at }}<br>
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
