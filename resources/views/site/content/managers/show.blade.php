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
                <br>

                {{ Form::open([ 'method'  => 'delete', 'route' => [ 'manager.destroy', $manager->Manager_pasport_number ] ]) }}
                {{ Form::submit('Видалити', ['class' => 'btn btn-small btn-danger right']) }}
                {{ Form::close() }}
                <a href="{{ URL::to('manager/' . $manager->Manager_pasport_number . '/edit') }}">
                    <div class="btn btn-small btn-info right" >Редагувати</div></a>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('main') }}">Головна</a></li>
                <li><a href="{{ route('manager.index') }}">Менеджери</a></li>
                <li class="active">Інформація про менеджера {{ $manager->Manager_pasport_number }}</li>
            </ol>

        </div>
        <div id="page-inner">

            <div class="row">

                <div class="col-md-12">
                    <div class="card">

                        <div class="card-content">
                            <p>
                                <strong>Номер паспорту:</strong> {{ $manager->Manager_pasport_number }}<br>
                                <strong>Прізвище:</strong> {{ $manager->Surname }}<br>
                                <strong>Ім'я:</strong> {{ $manager->Name }}<br>
                                <strong>По батькові:</strong> {{ $manager->Father_name }}<br>
                                <strong>Дата народження:</strong> {{ $manager->Birthday }}<br>
                                <strong>Зарплата (грн.):</strong> {{ $manager->Salary }}<br>
                                <strong>Запис створено:</strong> {{ $manager->created_at}}<br>
                                <strong>Останнє оновлення:</strong> {{ $manager->updated_at  }}<br>
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
