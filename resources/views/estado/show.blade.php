@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Estado
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
                        <h3 class="box-title">Estado</h3>

                        <div align="right"><a href="{{route('estados.index')}}" class="btn btn-info">Voltar</a></div>
                        {{--<div align="right"><a href="{{route('pais.create')}}" class="btn btn-success">Novo</a></div>--}}
                    </div>

                    <div class="box-body">


                        <p><strong><h2>Nome : {{$estado->nome}}</h2></strong></p><br>
                        <p><strong>Sigla : {{$estado->sigla}}</strong></p><br>
                        <p><strong>Pais : {{$estado->pais->nome}}</strong></p><br>



                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection