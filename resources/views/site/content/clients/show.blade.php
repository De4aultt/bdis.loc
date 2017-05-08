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
                Клієнт {{ $client->Client_Number}}
                <br>

                {{ Form::open([ 'method'  => 'delete', 'route' => [ 'client.destroy', $client->Client_Number] ]) }}
                {{ Form::submit('Видалити', ['class' => 'btn btn-small btn-danger right']) }}
                {{ Form::close() }}
                <a href="{{ URL::to('client/' . $client->Client_Number. '/edit') }}">
                    <div class="btn btn-small btn-info right" >Редагувати</div></a>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('main') }}">Головна</a></li>
                <li><a href="{{ route('client.index') }}">Клієнти</a></li>
                <li class="active">Інформація про клієнта {{ $client->Client_Number}}</li>
            </ol>

        </div>
        <div id="page-inner">

            <div class="row">

                <div class="col-md-12">
                    <div class="card">

                        <div class="card-content">
                            <p>
                                <strong>Номер паспорта:</strong> {{ $client->Client_Number }}<br>
                                <strong>Прізвище:</strong> {{ $client->Surname }}<br>
                                <strong>Ім'я:</strong> {{ $client->Name }}<br>
                                <strong>По батькові:</strong> {{ $client->Father_name }}<br>
                                <strong>Дата народження:</strong> {{ $client->Birthday }}<br>
                                <strong>Стать:</strong> {{ $client->Gender }}<br>
                                <strong>Номер менеджера:</strong> <a href="{{ URL::to('manager/' . $client->Manager_Pasport_Number)  }}"> {{ $client->Manager_Pasport_Number }}</a><br>
                                <strong>Запис створено:</strong> {{ $client->created_at}}<br>
                                <strong>Останнє оновлення:</strong> {{ $client->updated_at }}<br>
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
