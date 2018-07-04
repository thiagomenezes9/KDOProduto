@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Sugestao
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
                        <h3 class="box-title">Sugestao</h3>

                        <div align="right"><a href="{{route('sugestao.index')}}" class="btn btn-info">Voltar</a></div>
                        {{--<div align="right"><a href="{{route('pais.create')}}" class="btn btn-success">Novo</a></div>--}}
                    </div>

                    <div class="box-body">


                        <p><strong><h2>Produto : {{$sugestao->descricao}}</h2></strong></p><br>
                        <p><strong><h2>Marca : {{$sugestao->marca}}</h2></strong></p><br>

                        @if(isset($sugestao->foto))

                            <p><strong>Foto : </strong></p><br>
                            <img src="{{$sugestao->foto}}" width="100%" height="100%" id="imagem">
                        @endif



                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection