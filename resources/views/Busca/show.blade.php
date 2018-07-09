@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Produtos
@stop

@section('contentheader_title')

@stop

@section('contentheader_description')
    Produtos
@stop


@section('main-content')



    @if (Session::get('fail'))
        <div class="box alert alert-danger">
            <div class="box-header with-border">
                <h3 class="box-title text-gray">Atenção</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool"
                            data-widget="remove" data-toggle="tooltip" title="Fechar">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            </div>
        </div>
    @endif



    <div class="container-fluid spark-screen">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Detalhes do Produto</h3><br><br>

                        <div class="row">

                            <div align="left" class="col col-lg-2"><a href="javascript:history.back()" class="btn btn-info">Voltar</a></div>

                        </div>
                    </div>

                    <div class="box-body">


                        <p><strong><h2>Produto : {{$produto->descricao}}</h2></strong></p><br>
                        <p><strong>Código de Barras : </strong> {{$produto->cd_barras}}</p><br>
                        <p><strong>Marca : </strong> {{$produto->marca->descricao}}</p><br>
                        <p><strong>Categoria : </strong> {{$produto->categoria->descricao}}</p><br>



                        <p><strong>Imagem : </strong></p><br>

                        <img src="{{$produto->foto}}" width="100%" height="100%" id="imagem">

                        <p><strong>Preços</strong></p>

                        <table class="table table-bordered table-striped" id="tabEstabelecimentos">
                            <thead>
                            <tr>
                                <td class="col-md-6"><strong>Estabelecimento</strong></td>
                                <td align="center"><strong>Valor</strong></td>
                                <td align="center"><strong>Oferta Termina</strong></td>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($produto->preco as $preco)

                                <p style="display: none">{{$numOferta = 0}}</p>
                                @foreach($produto->oferta as $oferta)
                                    @if($oferta->supermercado == $preco->supermercado)
                                        @if($oferta->dt_fim >= \Carbon\Carbon::now())
                                            <tr style="background-color: #3f729b" align="center">
                                                <td align="left">{{ $oferta->supermercado->nome }}</td>
                                                <td align="right">{{ 'R$'. $oferta->valor}}</td>
                                                <td align="left">{{$oferta->dt_fim}}</td>

                                            </tr>
                                            <p style="display: none">{{$numOferta = $numOferta + 1}}</p>
                                        @endif
                                     @endif
                                    @endforeach
                                @if($numOferta == 0)
                                    @if($preco->ativo == 1)
                                    <tr align="center">
                                        <td align="left">{{ $preco->supermercado->nome }}</td>
                                        <td align="right">{{ 'R$'. $preco->valor}}</td>
                                        <td align="left">{{'Preço Normal'}}</td>


                                    </tr>
                                    @endif
                                @endif
                            @endforeach
                            </tbody>
                        </table>




                    </div>



                </div>
            </div>
        </div>
    </div>


@endsection
