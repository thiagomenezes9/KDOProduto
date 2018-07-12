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

            <div class="col-md-10 col-md-offset-1">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Estabelecimentos</h3>
                        <div align="right"><a href="{{route('estabelecimentos.index')}}" class="btn btn-info">Voltar</a></div>
                        {{--<div align="right"><a href="{{route('pais.create')}}" class="btn btn-success">Novo</a></div>--}}
                    </div>

                    <div class="box-body">

                        <form class="form-horizontal" action="{{route('estabelecimentos.update',$supermercado)}}" method="post" enctype="multipart/form-data">

                         <input type="hidden" name="_method" value="PUT">

                            {{csrf_field()}}



                            <div class="form-group">
                                <label for="nome" class="col-sm-2 control-label" >Nome</label>
                                <div class="col-sm-10">
                                    <input name="nome" value="{{ $supermercado->nome }}" type="text" class="form-control input-lg"
                                           id="nome" placeholder="Nome do Usuário" autofocus>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label" >E-mail</label>
                                <div class="col-sm-10">
                                    <input name="email" value="{{$supermercado->email}}" type="email" class="form-control input-lg"
                                           id="email"  autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="telefone" class="col-sm-2 control-label" >Telefone </label>
                                <div class="col-sm-10">
                                    <input name="telefone" value="{{$supermercado->telefone}}" type="tel" class="form-control input-lg"
                                           id="telefone"  autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="CNPJ" class="col-sm-2 control-label" >CNPJ </label>
                                <div class="col-sm-10">
                                    <input name="CNPJ" value="{{$supermercado->CNPJ}}" type="text" class="form-control input-lg"
                                           id="CNPJ"  autofocus>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="endereco" class="col-sm-2 control-label" >Endereco</label>
                                <div class="col-sm-10">
                                    <input name="endereco" value="{{ $supermercado->endereco }}" type="text" class="form-control input-lg"
                                           id="endereco" placeholder="Endereço..." autofocus>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="foto" class="col-sm-2 control-label">Foto</label>
                                <input name="foto" type="file" class="form-control-file"
                                       id="foto" autofocus>
                            </div>



                            <div class="form-group">
                                <label for="pais" class="col-sm-2 control-label" >Pais : </label>
                                <div class="col-sm-10">
                                    <select name="pais" id="pais" class="form-control">
                                        <option id="paisOp">Selecione o pais</option>
                                        @foreach($pais as $p)
                                            <option value="{{$p->id}}">{{$p->nome}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="estados" class="col-sm-2 control-label" >Estados : </label>
                                <div class="col-sm-10">
                                    <select name="estados" id="estados" class="form-control" disabled>

                                        <option>Selecione o pais</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="cidades" class="col-sm-2 control-label" >Cidades : </label>
                                <div class="col-sm-10">
                                    <select name="cidades" id="cidades" class="form-control" disabled>

                                        <option >Selecione o Estado</option>

                                    </select>
                                </div>
                            </div>




                            <div class="form-group">
                                <label for="status" class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-10">
                                    <select name="ativo" id="ativo" class="form-control">
                                        <option value="1" {{$supermercado->ativo == '1' ? "selected" : ""}}>Ativado</option>
                                        <option value="0" {{$supermercado->ativo == '0' ? "selected" : ""}}>Desativado</option>

                                    </select>

                                </div>
                            </div>



                            <div class="form-group">
                                <label for="segmento" class="col-sm-2 control-label">Segmento</label>
                                <div class="col-sm-10">
                                    <select name="segmento" id="segmento" class="form-control">

                                        @foreach($segmentos as $segmento)
                                            {{--                                            <option value="{{$c->id}}" {{ $membro['id'] === (isset($coordenacao->responsavel) ? $coordenacao->responsavel: '' ) ? 'selected' : '' }}>{{$membro['name']}}</option>--}}
                                            <option value="{{$segmento->id}}"{{$supermercado->segmento->id == $segmento->id ? "selected" : ""}}>{{$segmento->descricao}}</option>

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