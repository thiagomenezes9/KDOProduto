@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Cidade
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
                        <h3 class="box-title">Cidade</h3>

                        <div align="right"><a href="{{route('cidades.index')}}" class="btn btn-info">Voltar</a></div>
                        {{--<div align="right"><a href="{{route('pais.create')}}" class="btn btn-success">Novo</a></div>--}}
                    </div>

                    <div class="box-body">


                        <p><strong><h2>Nome : {{$cidade->nome}}</h2></strong></p><br>
                        <p><strong>Sigla : {{$cidade->sigla}}</strong></p><br>
                        <p><strong>Estado : {{$cidade->estado->nome}}</strong></p><br>



                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection