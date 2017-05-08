
<div id="page-wrapper" >
    <div class="header">
        <h1 class="page-header">
            {{ $title }}
        </h1>

        <div class="breadcrumb">
            <li><a  href="{{ URL::to('designer/create') }}">Додати дизайнера</a>
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
                                    <th>Номер паспорта</th>
                                    <th>Прізвище</th>
                                    <th>Ім'я</th>
                                    <th>По-батькові</th>
                                    <th>Зарплата (грн.)</th>
                                    <th>Стать</th>
                                    <th>Email</th>
                                    <th>Управління</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($designers as $designer)
                                <tr class="gradeA">
                                    <td>{{$designer->Designer_pasport_number}}</td>
                                    <td>{{$designer->Surname}}</td>
                                    <td>{{$designer->Name}}</td>
                                    <td>{{$designer->Father_name}}</td>
                                    <td>{{$designer->Salary}}</td>
                                    <td>{{$designer->Gender}}</td>
                                    <td>{{$designer->Email}}</td>
                                    <td>
                                        <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                                        <!-- we will add this later since its a little more complicated than the other two buttons -->
                                        <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                                        <a class="btn btn-small btn-success" href="{{ URL::to('designer/' . $designer->Designer_pasport_number)  }}"><i class="fa fa-eye"></i></a>
                                        <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                                        <a class="btn btn-small btn-info" href="{{ URL::to('designer/' . $designer->Designer_pasport_number . '/edit') }}"><i class="fa fa-edit"></i></a>

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



        <footer><p>All right reserved. Template by: <a href="https://webthemez.com/admin-template/">WebThemez.com</a></p></footer>
    </div>
    <!-- /. PAGE INNER  -->
</div>
