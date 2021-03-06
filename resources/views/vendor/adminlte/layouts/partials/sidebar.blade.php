<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Auth::user()->foto ? Auth::user()->foto : Gravatar::get($user->email)}}"
                         class="img-circle" alt="User Image"/>
                </div>
                <div class="pull-left info">
                    <p>{{Auth::user()->name}}</p>
                </div>
            </div>
    @endif

    <!-- search form (Optional) -->
        <form action="{{route('busca.store')}}" method="post" enctype="multipart/form-data" class="sidebar-form">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>

            <div class="input-group">
                <input type="text" name="termo" id="termo" class="form-control" placeholder="Produto ..."/>
                <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i
                            class="fa fa-search"></i></button>
              </span>


            </div>

        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Menu</li>

            <li>
                <!-- Optionally, you can add icons to the links -->
                @if(Auth::user()->tipo == 'ADMIN')

                    <a href="{{route('produtos.index')}}">
                        <i class="fa fa-barcode"></i>
                        <span>Produtos</span>
                        {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    </a>


                    <a href="{{route('usuarios.index')}}">
                        <i class="fa fa-users"></i>
                        <span>Usuarios</span>
                        {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    </a>

                    <a href="{{route('cidades.index')}}">
                        <i class="fa fa-map"></i>
                        <span>Cidades</span>
                        {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    </a>

                    <a href="{{route('estados.index')}}">
                        <i class="fa fa-flag"></i>
                        <span>Estados</span>
                        {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    </a>


                    <a href="{{route('pais.index')}}">
                        <i class="fa fa-globe"></i>
                        <span>Paises</span>
                        {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    </a>



                    <a href="{{route('estabelecimentos.index')}}">
                        <i class="fa fa-strikethrough"></i>
                        <span>Estabelecimentos</span>
                        {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    </a>

                    <a href="{{route('precos.index')}}">
                        <i class="fa fa-barcode"></i>
                        <span>Preços</span>
                        {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    </a>


                    <a href="{{route('ofertas.index')}}">
                        <i class="fa fa-balance-scale"></i>
                        <span>Ofertas</span>
                        {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    </a>


                    <a href="{{route('marcas.index')}}">
                        <i class="fa fa-tag"></i>
                        <span>Marca</span>
                        {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    </a>

                    <a href="{{route('segmentos.index')}}">
                        <i class="fa fa-folder-open"></i>
                        <span>Segmento</span>
                        {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    </a>


                    <a href="{{route('categorias.index')}}">
                        <i class="fa fa-shopping-bag"></i>
                        <span>Categoria</span>
                        {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    </a>


                    <a href="{{route('relatorios')}}">
                        <i class="fa fa-file-pdf-o"></i>
                        <span>Relatorios</span>
                        {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    </a>





                @endif
                @if(Auth::user()->tipo == 'LOJA')

                    <a href="{{route('precos.index')}}">
                        <i class="fa fa-barcode"></i>
                        <span>Meus Produto</span>
                        {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    </a>


                    <a href="{{route('ofertas.index')}}">
                        <i class="fa fa-balance-scale"></i>
                        <span>Minhas Ofertas</span>
                        {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    </a>



                    <a href="{{route('estabelecimentos.edit',Auth::user()->supermercado->id)}}">
                        <i class="fa fa-users"></i>
                        <span>Meu Cadastro</span>
                        {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    </a>




                    <a href="{{route('relatorios')}}">
                        <i class="fa fa-file-pdf-o"></i>
                        <span>Relatorios</span>
                        {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    </a>


                @endif

                @if(Auth::user()->tipo == 'USER')


                    <a href="{{route('interesse.index')}}">
                        <i class="fa fa-heart"></i>
                        <span>Meus Interreses</span>
                        {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    </a>

                    <a href="{{route('dashboard')}}">
                        <i class="fa fa-heart"></i>
                        <span>Ofertas</span>
                        {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    </a>

                    <a href="{{route('perfil')}}">
                        <i class="fa fa-users"></i>
                        <span>Meus Dados</span>
                        {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    </a>




                @endif

                <a href="{{route('sugestao.index')}}">
                    <i class="fa fa-cart-plus"></i>
                    <span>Sugestoes</span>
                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                </a>


            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
