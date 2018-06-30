@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Estados
@stop

@section('contentheader_title')

@stop

@section('contentheader_description')
    Descrição
@stop


@section('main-content')


    @if($errors->any())
        <div class="box alert alert-danger">
            <div class="box-header with-border">
                <h3 class="box-title text-gray">Opss! Alguma coisa errada</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool"
                            data-widget="remove" data-toggle="tooltip" title="Fechar">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

        </div>
    @endif



    <div class="container-fluid spark-screen">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edição do Estado de {{$estado->nome}}</h3>
                        <div align="right"><a href="{{route('estados.index')}}" class="btn btn-info">Voltar</a></div>
                        {{--<div align="right"><a href="{{route('pais.create')}}" class="btn btn-success">Novo</a></div>--}}
                    </div>

                    <div class="box-body">

                        <form class="form-horizontal" action="{{route('estados.update',$estado->id)}}" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="_method" value="PUT">

                            {{csrf_field()}}



                            <div class="form-group">
                                <label for="nome" class="col-sm-2 control-label" >Nome</label>
                                <div class="col-sm-10">
                                    <input name="nome" value="{{ $estado->nome }}" type="text" class="form-control input-lg"
                                           id="nome" placeholder="Nome do Estado" autofocus>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="sigla" class="col-sm-2 control-label" >Sigla</label>
                                <div class="col-sm-10">
                                    <input name="sigla" value="{{$estado->sigla}}" type="text" class="form-control input-lg"
                                           id="sigla" placeholder="Sigla do Estado" autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="pais" class="col-sm-2 control-label">Pais</label>
                                <div class="col-sm-10">
                                    <select name="pais" id="pais" class="form-control">
                                        @foreach($pais as $p)
                                            <option value="{{$p->id}}" {{ $p->id === (isset($estado->pais_id) ? $estado->pais_id : '' ) ? 'selected' : '' }}>{{$p->nome}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>



                            <div class="box-footer">
                                <button type="submit" class="btn btn-info pull-right btn-lg">
                                    Save</button>

                            </div>



                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection