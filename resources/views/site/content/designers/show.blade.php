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
                Дизайнер {{ $designer->Designer_pasport_number}}
                <br>

                {{ Form::open([ 'method'  => 'delete', 'route' => [ 'designer.destroy', $designer->Designer_pasport_number] ]) }}
                {{ Form::submit('Видалити', ['class' => 'btn btn-small btn-danger right']) }}
                {{ Form::close() }}
                <a href="{{ URL::to('designer/' . $designer->Designer_pasport_number. '/edit') }}">
                    <div class="btn btn-small btn-info right" >Редагувати</div></a>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('main') }}">Головна</a></li>
                <li><a href="{{ route('designer.index') }}">Дизайнери</a></li>
                <li class="active">Інформація про дизайнера {{ $designer->Designer_pasport_number}}</li>
            </ol>

        </div>
        <div id="page-inner">

            <div class="row">

                <div class="col-md-12">
                    <div class="card">

                        <div class="card-content">
                            <p>
                                <strong>Номер паспорта:</strong> {{ $designer->Designer_pasport_number }}<br>
                                <strong>Прізвище:</strong> {{ $designer->Surname }}<br>
                                <strong>Ім'я:</strong> {{ $designer->Name }}<br>
                                <strong>По батькові:</strong> {{ $designer->Father_name }}<br>
                                <strong>Зарплат (грн.):</strong> {{ $designer->Salary }}<br>
                                <strong>Стать:</strong> {{ $designer->Gender }}<br>
                                <strong>Email:</strong> {{ $designer->Email }}<br>
                                <strong>Запис створено:</strong> {{ $designer->created_at}}<br>
                                <strong>Останнє оновлення:</strong> {{ $designer->updated_at }}<br>
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
