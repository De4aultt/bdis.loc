    <nav class="navbar navbar-default top-navbar" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle waves-effect waves-dark" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand waves-effect waves-dark" href="{{ route('main') }}"><i class="large material-icons">insert_chart</i> <strong>BDIS</strong></a>

            <div id="sideNav" href=""><i class="material-icons dp48">toc</i></div>
        </div>

        <ul class="nav navbar-top-links navbar-right">
                <li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown1"><i class="fa fa-user fa-fw"></i> <b>{{ Illuminate\Support\Facades\Auth::user()->surname}} {{ Illuminate\Support\Facades\Auth::user()->name}}</b> <i class="material-icons right">arrow_drop_down</i></a></li>
        </ul>
    </nav>
    <!-- Dropdown Structure -->
    <ul id="dropdown1" class="dropdown-content">
        @if( Illuminate\Support\Facades\Auth::user()->position == 'Менеджер')
        <li><a href="{{  URL::to('manager/' . Illuminate\Support\Facades\Auth::user()->passport_number) }}"><i class="fa fa-file-text fa-fw"></i> Мій профіль</a>
        </li>
            <li><a href="{{  URL::to('personal/') }}"><i class="fa fa-users fa-fw"></i> Мії клієнти</a>
            </li>
        @elseif( Illuminate\Support\Facades\Auth::user()->position == 'Дизайнер')
        <li><a href="{{ URL::to('designer/' . Illuminate\Support\Facades\Auth::user()->passport_number)  }}"><i class="fa fa-file-text fa-fw"></i> Мій профіль</a>
        </li>

            <li><a href="{{  URL::to('personal/') }}"><i class="fa fa-picture-o fa-fw"></i> Мії картини</a>
            </li>
        @endif
            <li><a href="{{ route('password') }}"><i class="fa fa-key fa-fw"></i> Змінити пароль</a>
            </li>
        <li>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out fa-fw"></i> Вийти
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    </ul>

    <!--/. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
        <ul class="sidebar-collapse">
            <ul class="nav" id="main-menu">

                <li>
                    <a class="waves-effect waves-dark" href="{{ route('main') }}"><i class="fa fa-home"></i> Головна</a>
                </li>
                {{--<li>--}}
                    {{--<a href="{{ route('summs') }}" class="waves-effect waves-dark"><i class="fa fa-file"></i> Звіти</a>--}}
                {{--</li>--}}
                <li>
                    <a href="{{ route('card') }}" class="waves-effect waves-dark"><i class="fa fa-picture-o"></i> Галерея</a>
                </li>
                <li>
                    <a href="{{ route('statistic') }}" class="waves-effect waves-dark"><i class="fa fa-bar-chart-o"></i> Статистика </a>
                </li>
                <li>
                    <a href="#" class="waves-effect waves-dark"><i class="fa fa-table"></i>Категорії<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('designer.index') }}">Дизайнери</a>
                        </li>
                        <li>
                            <a href="{{ route('picture.index') }}">Картини</a>
                        </li>
                        @if( Illuminate\Support\Facades\Auth::user()->position == 'Менеджер')
                        <li>
                            <a href="{{ route('order.index') }}">Замовлення</a>
                        </li>
                        <li>
                            <a href="{{ route('chek.index') }}">Чеки</a>
                        </li>
                            <li>
                                <a href="{{ route('client.index') }}">Клієнти</a>
                            </li>
                        <li>
                            <a href="{{ route('manager.index') }}">Менеджери</a>
                        </li>
                        <li>
                            <a href="{{ route('phone.index') }}">Номери телефонів</a>
                        </li>

                    </ul>

                </li>
                <li>
                    <a href="#" class="waves-effect waves-dark"><i class="fa fa-users"></i>Реєстація юзерів<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('designer.create') }}">Додати дизайнера</a>
                        </li>
                        <li>
                            <a href="{{ route('manager.create') }}">Додати менеджера</a>
                        </li>
                    </ul>
                </li>
            </ul>
    @else
        </ul>
                </li>
            </ul>
            @endif

        </div>

    </nav>
    <!-- /. NAV SIDE  -->
