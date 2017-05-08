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
                Менеджер {{ $manager->Manager_pasport_number }}


                {{ Form::open([ 'method'  => 'delete', 'route' => [ 'manager.destroy', $manager->Manager_pasport_number ] ]) }}
                {{ Form::submit('Видалити', ['class' => 'btn btn-small btn-danger right']) }}
                {{ Form::close() }}

            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('main') }}">Головна</a></li>
                <li><a href="{{ route('manager.index') }}">Менеджери</a></li>
                <li class="active">Редагувати менеджера {{ $manager->Manager_pasport_number }}</li>
            </ol>

        </div>
        <div id="page-inner">

            <div class="row">

                <div class="col-md-12">
                    <div class="card">

                        <div class="card-content">
                            <!-- if there are creation errors, they will show here -->
                            {{ HTML::ul($errors->all()) }}

                            {{ Form::model($manager, array('route' => array('manager.update', $manager->Manager_pasport_number), 'method' => 'PUT')) }}


                            <div class="form-group">
                                {{ Form::label('Manager_pasport_number', 'Номер паспорта') }}
                                {{ Form::text('Manager_pasport_number', null, array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('Surname', 'Прізвище') }}
                                {{ Form::text('Surname', null, array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('Name', 'Ім\'я') }}
                                {{ Form::text('Name', null, array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('Father_name', 'По батькові') }}
                                {{ Form::text('Father_name', null, array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('Birthday', 'Дата народження') }}
                                {{ Form::date('Birthday', null, array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('Salary', 'Зарплата (грн.)') }}
                                {{ Form::text('Salary', null, array('class' => 'form-control')) }}
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
