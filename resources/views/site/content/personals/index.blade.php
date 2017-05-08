
<div id="page-wrapper" >
    <div class="header">
        <h1 class="page-header">
            {{ $title }}
        </h1>
@if($position == 'Менеджер')

            <div class="breadcrumb">
                <li><a  href="{{ URL::to('client/create') }}">Додати клієнта</a>
            </div>


    </div>

    <div id="page-inner" >

        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="card">

                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Прізвище</th>
                                    <th>Ім'я</th>
                                    <th>По-батькові</th>
                                    <th>Дата народження</th>
                                    <th>Стать</th>
                                    <th>Управління</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($personals as $client)
                                    <tr class="gradeA">
                                        <td>{{$client->Client_Number}}</td>
                                        <td>{{$client->Surname}}</td>
                                        <td>{{$client->Name}}</td>
                                        <td>{{$client->Father_name}}</td>
                                        <td>{{$client->Birthday}}</td>
                                        <td>{{$client->Gender}}</td>
                                        <td>
                                            <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                                            <!-- we will add this later since its a little more complicated than the other two buttons -->
                                            <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                                            <a class="btn btn-small btn-success" href="{{ URL::to('client/' . $client->Client_Number)  }}"><i class="fa fa-eye"></i></a>
                                            <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                                            <a class="btn btn-small btn-info" href="{{ URL::to('client/' . $client->Client_Number . '/edit') }}"><i class="fa fa-edit"></i></a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
@elseif($position == 'Дизайнер')
        <div class="breadcrumb">
            <li><a  href="{{ URL::to('picture/create') }}">Додати картину</a>
        </div>


    </div>

    <div id="page-inner">

        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="card">

                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-table">

                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Дата виготовлення</th>
                                    <th>Зображення</th>
                                    <th>Стиль</th>
                                    <th>Ціна (грн.)</th>
                                    <th>Номер дизайнера</th>
                                    <th>Управління</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($personals as $personal)
                                <tr class="gradeA">
                                    <td>{{$personal->Picture_id}}</td>
                                    <td>{{$personal->Date_made}}</td>
                                    <td><a href="{{$personal->File}}">відкрити</a></td>
                                    <td>{{$personal->Style}}</td>
                                    <td>{{$personal->Price}}</td>
                                    <td><a href="{{ URL::to('designer/' . $personal->Designer_pasport_number)  }}">{{$personal->Designer_pasport_number}}</a></td>
                                    <td>
                                        <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                                        <!-- we will add this later since its a little more complicated than the other two buttons -->
                                        <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                                        <a class="btn btn-small btn-success" href="{{ URL::to('picture/' . $personal->Picture_id)  }}"><i class="fa fa-eye"></i></a>
                                        <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                                        <a class="btn btn-small btn-info" href="{{ URL::to('picture/' . $personal->Picture_id . '/edit') }}"><i class="fa fa-edit"></i></a>

                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>

@endif

        <footer><p>All right reserved. Template by: <a href="https://webthemez.com/admin-template/">WebThemez.com</a></p></footer>
    </div>
    <!-- /. PAGE INNER  -->
</div>
