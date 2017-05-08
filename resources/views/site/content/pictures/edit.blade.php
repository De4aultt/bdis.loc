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
                Картина {{ $picture->Picture_id }}


                {{ Form::open([ 'method'  => 'delete', 'route' => [ 'picture.destroy', $picture->Picture_id ] ]) }}
                {{ Form::submit('Видалити', ['class' => 'btn btn-small btn-danger right']) }}
                {{ Form::close() }}

            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('main') }}">Головна</a></li>
                <li><a href="{{ route('picture.index') }}">Картини</a></li>
                <li class="active">Інформація про картину {{ $picture->Picture_id }}</li>
            </ol>

        </div>
        <div id="page-inner">

            <div class="row">

                <div class="col-md-12">
                    <div class="card">

                        <div class="card-content">
                            <!-- if there are creation errors, they will show here -->
                            {{ HTML::ul($errors->all()) }}

                            {{ Form::model($picture, array('route' => array('picture.update', $picture->Picture_id), 'method' => 'PUT')) }}


                            <div class="form-group">
                                {{ Form::label('File', 'Файл') }}
                                {{ Form::text('File', null, array('class' => 'form-control')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('Style', 'Стиль') }}
                                {{ Form::select('Style', [ 'Не визначено' =>'Оберіть стиль', 'Колаж' => 'Колаж', 'Поп-арт' => 'Поп-арт','Портрет' => 'Портрет'], Input::old('Style'), array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('Price', 'Ціна') }}
                                {{ Form::number('Price', null , array('class' => 'form-control')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('Designer_pasport_number', 'Номер дизайнера') }}

                                {{ Form::select('Designer_pasport_number', $designers , Input::old('Designer_pasport_number'), array('class' => 'form-control')) }}
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
