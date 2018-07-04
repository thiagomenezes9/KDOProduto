@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Estabelecimentos
@stop

@section('contentheader_title')

@stop

@section('contentheader_description')
    Descrição
@stop


@section('main-content')

    <div class="container-fluid spark-screen">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Estabelecimentos</h3>

                        <div align="right"><a href="{{route('estabelecimentos.index')}}" class="btn btn-info">Voltar</a></div>
                        {{--<div align="right"><a href="{{route('pais.create')}}" class="btn btn-success">Novo</a></div>--}}
                    </div>

                    <div class="box-body">


                        <p><strong><h2>Nome : {{$supermercado->nome}}</h2></strong></p>
                        <br>
                        <p><strong>Email : </strong>{{$supermercado->email}}</p><br>

                        <p><strong>Ativo : </strong>{{$supermercado->ativo ? 'Sim' : 'Não'}}</p><br>

                        <p><strong>CNPJ :</strong> {{$supermercado->CNPJ}}</p><br>
                        <p><strong>Telefone : </strong>{{$supermercado->telefone}}</p><br>
                        <p><strong>Endereço : </strong>{{$supermercado->endereco}}</p><br>
                        <p><strong>Segmento : </strong>{{$supermercado->segmento->descricao}}</p><br>


                        @if($supermercado->cidade)
                            <p><strong>cidade : </strong>{{$supermercado->cidade->nome}}</p><br>

                        @endif


                        @if(isset($supermercado->foto))

                            <p><strong>Foto Perfil : </strong></p><br>
                            <img src="{{$supermercado->foto}}" width="100%" height="100%" id="imagem">
                        @endif



                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection