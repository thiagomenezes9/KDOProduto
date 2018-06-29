<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Auth::user()->foto ? Auth::user()->foto : Gravatar::get($user->email)}}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{Auth::user()->name}}</p>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        {{--<form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>--}}
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Menu</li>
            <!-- Optionally, you can add icons to the links -->
            @if(Auth::user()->tipo == 'ADMIN')

                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Cadastrar Produtos</span>
                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                </a>


                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Usuarios</span>
                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                </a>




                @endif
            @if(Auth::user()->tipo == 'LOJA')

                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Meus Produto</span>
                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                </a>


                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Minhas Ofertas</span>
                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                </a>



                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Meu Cadastro</span>
                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                </a>

                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Sugestoes</span>
                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                </a>


                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Relatorios</span>
                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                </a>


                @endif

            @if(Auth::user()->tipo == 'USER')


                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Meus Interreses</span>
                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                </a>

                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Meus Dados</span>
                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                </a>



                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Sugerir Produto</span>
                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                </a>
                @endif


        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
