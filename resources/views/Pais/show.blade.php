@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Paises
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
                        <h3 class="box-title">Paises</h3>

                        <div align="right"><a href="{{route('pais.index')}}" class="btn btn-info">Voltar</a></div>
                        {{--<div align="right"><a href="{{route('pais.create')}}" class="btn btn-success">Novo</a></div>--}}
                    </div>

                    <div class="box-body">


                        <p><strong><h2>Pais : {{$pais->nome}}</h2></strong></p><br>
                        <p><strong>Sigla : {{$pais->sigla}}</strong></p><br>
                        <h5>Bandeira : </h5> <br>

                        <img src="{{$pais->bandeira}}">


                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection