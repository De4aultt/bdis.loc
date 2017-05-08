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


                {{ Form::open([ 'method'  => 'delete', 'route' => [ 'phone.destroy', $phone->Phone_number_id ] ]) }}
                {{ Form::submit('Видалити', ['class' => 'btn btn-small btn-danger right']) }}
                {{ Form::close() }}

            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('main') }}">Головна</a></li>
                <li><a href="{{ route('phone.index') }}">телефои</a></li>
                <li class="active">Інформація про телефон менеджера {{  $phone->Manager_pasport_number}}</li>
            </ol>

        </div>
        <div id="page-inner">

            <div class="row">

                <div class="col-md-12">
                    <div class="card">

                        <div class="card-content">
                            <!-- if there are creation errors, they will show here -->
                            {{ HTML::ul($errors->all()) }}

                            {{ Form::model($phone, array('route' => array('phone.update', $phone->Phone_number_id), 'method' => 'PUT')) }}


                            <div class="form-group">
                                {{ Form::label('Manager_pasport_number', 'Номер менеджера') }}

                                {{ Form::select('Manager_pasport_number', $managers , Input::old('Manager_pasport_number'), array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('Mobile', 'Мобільний') }}
                                {{ Form::text('Mobile', null, array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('Home', 'Домашній') }}
                                {{ Form::text('Home', null, array('class' => 'form-control')) }}
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
