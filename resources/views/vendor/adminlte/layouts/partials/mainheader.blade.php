<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{ route('dashboard') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>KD</b>P</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>KD O</b> Produto</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">




        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">{{ trans('adminlte_lang::message.togglenav') }}</span>
        </a>


        <div class="navbar-form col-md-8">
            <form action="{{route('busca.store')}}" method="post" enctype="multipart/form-data" class="navbar-form">
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>

                <div class="input-group">
                    <input type="text" name="termo" id="termo" class="form-horizontal" placeholder="Produto ..."/>
                    <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>


                </div>

            </form>
        </div>



    <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">


            <ul class="nav navbar-nav">




                @if (Auth::guest())
                    <li><a href="{{ url('/auth/register') }}">{{ trans('adminlte_lang::message.register') }}</a></li>
                    <li><a href="{{ url('/auth/login') }}">{{ trans('adminlte_lang::message.login') }}</a></li>
                @else
                <!-- User Account Menu -->
                    <li class="dropdown user user-menu" id="user_menu" style="max-width: 280px;white-space: nowrap;">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="max-width: 280px;white-space: nowrap;overflow: hidden;overflow-text: ellipsis">
                            <!-- The user image in the navbar-->
                            <img src="{{ Auth::user()->foto ? Auth::user()->foto : Gravatar::get($user->email)  }}" class="user-image" alt="User Image"/>
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs"  title="{{ Auth::user()->name }}">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="{{ Auth::user()->foto ? Auth::user()->foto : Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                                <p>
                                    {{Auth::user()->name}}
                                    <small>{{ trans('adminlte_lang::message.login') }} {{Auth::user()->email}}</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                        {{--<li class="user-body">
                            <div class="col-xs-4 text-center">
                                <a href="#">{{ trans('adminlte_lang::message.followers') }}</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">{{ trans('adminlte_lang::message.sales') }}</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">{{ trans('adminlte_lang::message.friends') }}</a>
                            </div>
                        </li>--}}
                        <!-- Menu Footer-->
                            <li class="user-footer">
                                {{--<div class="pull-left">
                                    <a href="{{ url('/user/profile') }}" class="btn btn-default btn-flat">{{ trans('adminlte_lang::message.profile') }}</a>
                                </div>--}}
                                <div class="pull-right">

                                    <a href="{{route('perfil')}}" class="btn btn-default btn-flat">Perfil</a>

                                    <a href="{{ route('auth.logout') }}" class="btn btn-default btn-flat" id="logout"
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        {{ trans('adminlte_lang::message.signout') }}
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                        <input type="submit" value="logout" style="display: none;">
                                    </form>

                                </div>
                            </li>
                        </ul>
                    </li>
                @endif

            <!-- Control Sidebar Toggle Button -->
                {{--<li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>--}}
            </ul>
        </div>
    </nav>
</header>
