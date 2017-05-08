<div id="page-wrapper" >
    <div class="header">
        <h1 class="page-header">
            {{$title}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('main')}}">Головна</a></li>
            <li><a href="{{route('picture.index')}}">Картини</a></li>
            <li class="active">{{$title}}</li>
        </ol>

    </div>

    <div id="page-inner">
        <div class="row">
        <!-- /. ROW  -->
        @foreach($pictures as $picture)

            <div class="col-md-4 col-sm-4">
                <div class="card" >
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" style="height: 200px" src="{{ $picture->File }}">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4"><a href="{{  URL::to('picture/'.$picture->Picture_id) }}">Картина № {{$picture->Picture_id}}</a><i class="material-icons right">more_vert</i></span>
                        <p>Автор: <a href="{{  URL::to('designer/'.$picture->Designer_pasport_number) }}"> {{ $picture->Surname.' '.$picture->Name }}</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Стиль: {{$picture->Style}}<i class="material-icons right">close</i></span>
                        <p>Дата виготовлення:<br> {{$picture->Date_made}}
                            <br> Ціна (грн.): {{$picture->Price}}
                            <br> Автор: <a href="{{  URL::to('designer/'.$picture->Designer_pasport_number) }}">  {{ $picture->Surname.' '.$picture->Name }}</a>
                            <br> Файл: <a href="{{ $picture->File }}">Переглянути</a>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- /. ROW  -->

        <!-- /. ROW  -->
        <footer class="col-md-12"><p>All right reserved. Template by: <a href="https://webthemez.com/admin-template/">WebThemez.com</a></p></footer>

      </div>
    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
</div>