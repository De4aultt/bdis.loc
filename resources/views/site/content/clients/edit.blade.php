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
                Клієнт {{ $client->Client_Number }}


                {{ Form::open([ 'method'  => 'delete', 'route' => [ 'client.destroy', $client->Client_Number ] ]) }}
                {{ Form::submit('Видалити', ['class' => 'btn btn-small btn-danger right']) }}
                {{ Form::close() }}

            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('main') }}">Головна</a></li>
                <li><a href="{{ route('client.index') }}">Клієнти</a></li>
                <li class="active">Редагувати клієнта {{ $client->Client_Number }}</li>
            </ol>

        </div>
        <div id="page-inner">

            <div class="row">

                <div class="col-md-12">
                    <div class="card">

                        <div class="card-content">
                            <!-- if there are creation errors, they will show here -->
                            {{ HTML::ul($errors->all()) }}

                            {{ Form::model($client, array('route' => array('client.update', $client->Client_Number), 'method' => 'PUT')) }}


                            <div class="form-group">
                                {{ Form::label('Surname', 'Прізвище') }}
                                {{ Form::text('Surname', null, array('class' => 'form-control')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('Name', 'Ім\'я') }}
                                {{ Form::text('Name', null, array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('Father_name', 'По-батькові') }}
                                {{ Form::text('Father_name', null, array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('Birthday', 'Дата народження') }}
                                {{ Form::date('Birthday', null, array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('Gender', 'Стать') }}
                                {{ Form::text('Gender', null, array('class' => 'form-control')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('Manager_Pasport_Number', 'Номер менеджера') }}

                                {{ Form::select('Manager_Pasport_Number', $managers , Input::old('Manager_Pasport_Number'), array('class' => 'form-control')) }}
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
