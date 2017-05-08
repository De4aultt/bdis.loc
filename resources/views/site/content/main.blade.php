<div id="page-wrapper">
    <div class="header">
        <h1 class="page-header">
            АІС "Майстерня картин"
        </h1>
        <ol class="breadcrumb">
            <li><a href="/">Головна сторінка</a></li>
        </ol>
    </div>
    <div id="page-inner">


        <div class="row">

            <a class="a-my" href="{{ route('order.index') }}">
            <div class="col-xs-12 col-sm-6 col-md-3">

                <div class="card horizontal cardIcon waves-effect waves-dark">
                    <div class="card-image orange">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                    </div>
                    <div class="card-stacked">
                        <div class="card-content">
                            <h3>{{ $counts['orders'] }}</h3>
                        </div>
                        <div class="card-action">
                            <strong> Замовлень</strong>
                        </div>
                    </div>
                </div>
            </div>
            </a>
            <a class="a-my" href="{{ route('client.index') }}">
            <div class="col-xs-12 col-sm-6 col-md-3" >

                <div class="card horizontal cardIcon waves-effect waves-dark">
                    <div class="card-image">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="card-stacked">
                        <div class="card-content">
                            <h3>{{ $counts['clients'] }}</h3>
                        </div>
                        <div class="card-action">
                            <strong> Клієнтів</strong>
                        </div>
                    </div>
                </div>

            </div>
            </a>
            <a class="a-my" href="{{ route('picture.index') }}">
            <div class="col-xs-12 col-sm-6 col-md-3">

                <div class="card horizontal cardIcon waves-effect waves-dark">
                    <div class="card-image blue">
                        <i class="fa fa-picture-o fa-5x"></i>
                    </div>
                    <div class="card-stacked">
                        <div class="card-content">
                            <h3>{{ $counts['pictures'] }}</h3>
                        </div>
                        <div class="card-action">
                            <strong> Картин</strong>
                        </div>
                    </div>
                </div>
            </div>
            </a>
            <a class="a-my" href="{{ route('phone.index') }}">
            <div class="col-xs-12 col-sm-6 col-md-3">

                <div class="card horizontal cardIcon waves-effect waves-dark">
                    <div class="card-image pink">
                        <i class="fa fa-phone fa-5x"></i>
                    </div>
                    <div class="card-stacked">
                        <div class="card-content">
                            <h3>{{ $counts['phones'] }}</h3>
                        </div>
                        <div class="card-action">
                            <strong> Телефонів</strong>
                        </div>
                    </div>
                </div>

            </div>
            </a>
            <a class="a-my" href="{{ route('manager.index') }}">
            <div class="col-xs-12 col-sm-6 col-md-3">

                <div class="card horizontal cardIcon waves-effect waves-dark">
                    <div class="card-image red">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="card-stacked">
                        <div class="card-content">
                            <h3>{{ $counts['managers'] }}</h3>
                        </div>
                        <div class="card-action">
                            <strong> Менеджерів</strong>
                        </div>
                    </div>
                </div>
            </div>
            </a>
            <a class="a-my" href="{{ route('designer.index') }}">
            <div class="col-xs-12 col-sm-6 col-md-3">

                <div class="card horizontal cardIcon waves-effect waves-dark">
                    <div class="card-image grey">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="card-stacked">
                        <div class="card-content">
                            <h3>{{ $counts['designers'] }}</h3>
                        </div>
                        <div class="card-action">
                            <strong> Дизайнерів</strong>
                        </div>
                    </div>
                </div>

            </div>
            </a>
            <a class="a-my"   href="{{ route('chek.index') }}">
            <div class="col-xs-12 col-sm-6 col-md-3">

                <div class="card horizontal cardIcon waves-effect waves-dark">
                    <div class="card-image yellow">
                        <i class="fa fa-files-o fa-5x"></i>
                    </div>
                    <div class="card-stacked">
                        <div class="card-content">
                            <h3>{{ $counts['cheks'] }}</h3>
                        </div>
                        <div class="card-action">
                            <strong> Чеків</strong>
                        </div>
                    </div>
                </div>
            </div>

            </a>
        </div>

        <!-- /. ROW  -->

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-action">
                        <b>Оголошення</b>
                    </div>
                    <div class="card-image">
                        <ul class="collection">
                            <li class="collection-item avatar">
                                <i class="material-icons circle green">insert_chart</i>
                                <span class="title">Нове оголошення</span>
                                <p>Тескт <br>
                                    Second Line
                                </p>
                            </li>
                            <li class="collection-item avatar">
                                <i class="material-icons circle green">insert_chart</i>
                                <span class="title">Нове оголошення 2</span>
                                <p> Тескт <br>
                                    Second Line
                                </p>
                            </li>
                            <li class="collection-item avatar">
                                <i class="material-icons circle green">insert_chart</i>
                                <span class="title">Нове оголошення 3</span>
                                <p>Тескт <br>
                                    Second Line
                                </p>

                            </li>
                        </ul>
                    </div>
                </div>



            </div>
        </div>
        <!-- /. ROW  -->


        <footer><p>All right reserved. Template by: <a href="https://webthemez.com/admin-template/">WebThemez.com</a></p>


        </footer>
    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->