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
                <br>

                {{ Form::open([ 'method'  => 'delete', 'route' => [ 'picture.destroy', $picture->Picture_id ] ]) }}
                {{ Form::submit('Видалити', ['class' => 'btn btn-small btn-danger right']) }}
                {{ Form::close() }}
                <a href="{{ URL::to('picture/' . $picture->Picture_id . '/edit') }}">
                    <div class="btn btn-small btn-info right" >Редагувати</div></a>
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
                            <p>
                                <strong>Дата виготовлення:</strong> {{ $picture->Date_made }}<br>
                                <strong>Файл:</strong> <a href="{{ $picture->File }}">Відкрити</a><br>
                                <strong>Стиль:</strong> {{ $picture->Style }}<br>
                                <strong>Ціна (грн.):</strong> {{ $picture->Price }}<br>
                                <strong>Номер дизайнера:</strong> <a href="{{ URL::to('designer/' . $picture->Designer_pasport_number)  }}">{{ $picture->Designer_pasport_number }}</a><br>
                                <strong>Запис створено:</strong> {{ $picture->created_at  }}<br>
                                <strong>Останнє оновлення:</strong> {{ $picture->updated_at}}<br>
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
