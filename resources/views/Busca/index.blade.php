@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Produtos
@stop

@section('contentheader_title')

@stop

@section('contentheader_description')
    Lista dos Produtos
@stop


@section('main-content')

    <div class="container-fluid spark-screen">
        <div class="row">

            <div class="col-md-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Pesquisa</h3>


                        {{--<form action="#" method="post" enctype="multipart/form-data"
                              class="form form-inline">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>





                                    <select class="form-control" name="marca" id="marca">
                                        <option>-- Selecione a Marca --</option>
                                        @foreach($marcas as $marca)
                                            <option value="{{$marca->id}}">{{$marca->descricao}}</option>
                                            @endforeach
                                    </select>



                            <select class="form-control" name="categoria" id="categoria">
                                <option>-- Selecione a Categoria --</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{$categoria->id}}">{{$categoria->descricao}}</option>
                                @endforeach
                            </select>


                            <select class="form-control" name="categoria" id="categoria">
                                <option>-- Selecione a Segmento --</option>
                            </select>

                            <select class="form-control" name="categoria" id="categoria">
                                <option>-- Selecione a Cidade --</option>
                            </select>

                                --}}{{--<span class="input-group-btn">--}}{{--
                                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i
                                      class="fa fa-search"></i></button>
                                --}}{{--</span>--}}{{--




                        </form>--}}


                    </div>

                    <div class="box-body" id="pagination">


                        @forelse($produtos as $produto)



                            {{--@if(isset($produto->preco))--}}




                            <p style="display: none">{{$numSuper = '0'}}</p>
                            <p style="display: none">{{$menorValor = '0'}}</p>




                            @foreach($produto->preco as $preco)


                                <p style="display: none">{{$numOferta = 0}}</p>

                                @if($loop->first)
                                    <p style="display: none"> {{$menorValor = $preco->valor}}</p>
                                @endif


                                @foreach($produto->oferta as $oferta)
                                    @if($oferta->supermercado == $preco->supermercado)
                                        @if($oferta->dt_fim >= \Carbon\Carbon::now() && $oferta->dt_ini <= \Carbon\Carbon::now())
                                            @if($menorValor > $oferta->valor)

                                                <p style="display: none">{{$menorValor = $oferta->valor}}</p>
                                                <p style="display: none">{{$numOferta = $numOferta + 1}}</p>
                                                <p style="display: none">{{$numSuper = $numSuper + 1}}</p>

                                            @endif

                                        @endif
                                    @endif
                                @endforeach


                                @if($numOferta == 0)

                                    @if($menorValor > $preco->valor)


                                        <p style="display: none">{{$menorValor = $preco->valor}}</p>


                                    @endif



                                    <p style="display: none">{{$numSuper = $numSuper + 1}}</p>


                                @endif






                            @endforeach







                                <ul class="products-list product-list-in-box">


                                    <li class="item">
                                        <div class="product-img">
                                            <img src="{{$produto->foto}}" alt="Product Image">
                                        </div>
                                        <div class="product-info">
                                            <a href="{{route('busca.show',$produto->id)}}"
                                               class="product-title">{{$produto->descricao}}


                                                <span class="label label-success pull-right">Menor valor R$ {{$menorValor}}</span></a>
                                            <span class="product-description">
                                              {{$produto->marca->descricao}}
                                             </span>

                                            <strong><span class="product-description">
                                              Produto em {{$numSuper}} Estabelecimentos
                                             </span></strong>


                                        </div>
                                    </li>


                                </ul>





                            {{--@endif--}}



                        @empty

                            <h3>Nenhum produto encontrado</h3>

                        @endforelse




                    </div>


                </div>
            </div>
        </div>
    </div>


@endsection

@section('scriptlocal')




@endsection