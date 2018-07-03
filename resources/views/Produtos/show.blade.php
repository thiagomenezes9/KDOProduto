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

                            <div align="left" class="col col-lg-2"><a href="{{route('produtos.index')}}" class="btn btn-info">Voltar</a></div>

                        </div>
                    </div>

                    <div class="box-body">


                        <p><strong><h2>Produto : {{$produto->descricao}}</h2></strong></p><br>
                        <p><strong>Código de Barras : </strong> {{$produto->cd_barras}}</p><br>
                        <p><strong>Marca : </strong> {{$produto->marca->descricao}}</p><br>
                        <p><strong>Categoria : </strong> {{$produto->categoria->descricao}}</p><br>



                            <p><strong>Imagem : </strong></p><br>

                            <img src="{{$produto->foto}}" width="100%" height="100%" id="imagem">




                    </div>



                </div>
            </div>
        </div>
    </div>


@endsection

@section('scriptlocal')

    <script type="text/javascript">
        $(document).ready(function () {

            $("#imagem").bind('mouseover', function () {

                $(this).animate({height: "140%", width: "140%"});

            })
            $("#imagem").bind('mouseout', function () {

                $(this).animate({height: "100%", width: "100%"});

            })
        })
    </script>

    <style>
        textarea {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>

@endsection