@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Cidades
@stop

@section('contentheader_title')

@stop

@section('contentheader_description')
    Nova Cidade
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
                        <h3 class="box-title">Nova Cidade</h3>
                        <div align="right"><a href="{{route('cidades.index')}}" class="btn btn-info">Voltar</a></div>
                    </div>

                    <div class="box-body">

                        <form class="form-horizontal" action="{{action('CidadeController@store')}}" method="post" enctype="multipart/form-data">

                            <!-- 'nome', 'sigla',
                                'bandeira' -->

                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>



                            <div class="form-group">
                                <label for="nome" class="col-sm-2 control-label" >Nome</label>
                                <div class="col-sm-10">
                                    <input name="nome" value="{{ old('nome') }}" type="text" class="form-control input-lg"
                                           id="nome" placeholder="Nome da Cidade" autofocus>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="sigla" class="col-sm-2 control-label" >Sigla</label>
                                <div class="col-sm-10">
                                    <input name="sigla" value="{{ old('sigla') }}" type="text" class="form-control input-lg"
                                           id="sigla" placeholder="Sigla da Cidade" autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="pais" class="col-sm-2 control-label">Estado</label>
                                <div class="col-sm-10">
                                    <select name="estado" id="estado" class="form-control">
                                      @foreach($estado as $e)
                                            <option value="{{$e->id}}">{{$e->nome}}</option>
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