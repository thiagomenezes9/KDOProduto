@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Produto
@stop

@section('contentheader_title')

@stop

@section('contentheader_description')
    Novo Produto
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

            <div class="col-md-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Novo Produto</h3>
                        <div align="right"><a href="{{route('produtos.index')}}" class="btn btn-info">Voltar</a></div>
                    </div>

                    <div class="box-body">

                        <form class="form-horizontal" action="{{route('produtos.store')}}" method="post" enctype="multipart/form-data" >


                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>





                            <div class="form-group">
                                <label for="descricao" class="col-sm-2 control-label" >Descrição</label>
                                <div class="col-sm-10">
                                    <input name="descricao" value="{{ old('descricao') }}" type="text" class="form-control input-lg"
                                           id="descricao" placeholder="Descrição do Produto" autofocus>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="cd_barras" class="col-sm-2 control-label" >Código de Barras</label>
                                <div class="col-sm-10">
                                    <input name="cd_barras" value="{{ old('cd_barras') }}" type="number" class="form-control input-lg"
                                              id="cd_barras" placeholder="Código de Barras" autofocus></input>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="marca" class="col-sm-2 control-label">Marca</label>
                                <div class="col-sm-10">
                                    <input list="marca" name="marca" class="form-control">
                                    <datalist id="marca">

                                        @foreach($marcas as $marca)
                                            {{--                                            <option value="{{$c->id}}" {{ $membro['id'] === (isset($coordenacao->responsavel) ? $coordenacao->responsavel: '' ) ? 'selected' : '' }}>{{$membro['name']}}</option>--}}
                                            <option value="{{$marca->descricao}}">{{$marca->descricao}}</option>

                                        @endforeach
                                    </datalist>


                                </div>
                            </div>


                            <div class="form-group">
                                <label for="marca" class="col-sm-2 control-label">Categoria</label>
                                <div class="col-sm-10">
                                    <input list="categoria" name="categoria" class="form-control">
                                    <datalist id="categoria">

                                        @foreach($categorias as $categoria)
                                            {{--                                            <option value="{{$c->id}}" {{ $membro['id'] === (isset($coordenacao->responsavel) ? $coordenacao->responsavel: '' ) ? 'selected' : '' }}>{{$membro['name']}}</option>--}}
                                            <option value="{{$categoria->descricao}}">{{$categoria->descricao}}</option>

                                        @endforeach
                                    </datalist>

                                </div>
                            </div>


                            <div class="form-group">
                                <label for="foto" class="col-sm-2 control-label">Foto</label>
                                <input name="foto" type="file" class="form-control-file"
                                       id="foto" autofocus>
                            </div>



                            <div class="box-footer">
                                <button type="submit" class="btn btn-info pull-right btn-lg">
                                    Salvar</button>

                            </div>



                        </form>

                    </div>

                </div>

            </div>

        </div>
    </div>

@endsection


@section('scriptlocal')



@endsection