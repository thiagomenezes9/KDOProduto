@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Usuário
@stop

@section('contentheader_title')

@stop

@section('contentheader_description')
    Detalhes do Usuário
@stop


@section('main-content')

    <div class="container-fluid spark-screen">
        <div class="row">

            <div class="col-md-10 col-md-offset-1">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Detalhes do Usuário</h3>

                        <div align="right"><a href="{{route('usuarios.index')}}" class="btn btn-info">Voltar</a></div>
                        {{--<div align="right"><a href="{{route('pais.create')}}" class="btn btn-success">Novo</a></div>--}}
                    </div>

                    <div class="box-body">


                        <p><strong><h2>Nome : {{$usuario->name}}</h2></strong></p>
                        <br>
                        <p><strong>Email : </strong>{{$usuario->email}}</p><br>
                        <p><strong>Data Nascimento : </strong>{{\Carbon\Carbon::parse($usuario->dt_nasc)->format('d/m/Y')}}</p><br>
                        <p><strong>Sexo : </strong>{{$usuario->sexo}}</p>
                        <p><strong>Ativo : </strong>{{$usuario->ativo ? 'Sim' : 'Não'}}</p><br>

                        <p><strong>CPF :</strong> {{$usuario->cpf}}</p><br>
                        <p><strong>Telefone : </strong>{{$usuario->telefone}}</p><br>
                        <p><strong>Tipo : </strong>{{$usuario->tipo}}</p><br>


                        @if($usuario->cidade)
                        <p><strong>cidade : </strong>{{$usuario->cidade->nome}}</p><br>

                        @endif

                        @if($usuario->tipo === 'LOJA')
                            <p><strong>Estabelecimento : </strong>{{$usuario->supermercado->nome}}</p><br>
                        @endif




                        @if(isset($usuario->foto))

                            <p><strong>Foto Perfil : </strong></p><br>
                            <img src="{{$usuario->foto}}" width="100%" height="100%" id="imagem">
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection