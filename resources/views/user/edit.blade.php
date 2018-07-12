@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Usuário
@stop

@section('contentheader_title')

@stop

@section('contentheader_description')
    Editando Usuário
@stop


@section('main-content')

    {{--@if(\Illuminate\Support\Facades\Session::has('mensagem'))--}}
        {{--<div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get('mensagem')}}</div>--}}
    {{--@endif--}}


    @if (Session::has('mensagem'))
        <div class="alert alert-info">{{ Session::get('mensagem') }}</div>
    @endif

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
                        <h3 class="box-title">Edição do Usuário</h3>
                        <div align="right"><a href="{{route('usuarios.index')}}" class="btn btn-info">Voltar</a></div>
                        {{--<div align="right"><a href="{{route('pais.create')}}" class="btn btn-success">Novo</a></div>--}}
                    </div>

                    <div class="box-body">

                        <form class="form-horizontal" action="{{route('usuarios.update',$usuario->id)}}" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="_method" value="PUT">


                            {{csrf_field()}}



                            <div class="form-group">
                                <label for="nome" class="col-sm-2 control-label" >Nome</label>
                                <div class="col-sm-10">
                                    <input name="name" value="{{ $usuario->name }}" type="text" class="form-control input-lg"
                                           id="name" placeholder="Nome do Usuário" autofocus>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label" >E-mail</label>
                                <div class="col-sm-10">
                                    <input name="email" value="{{$usuario->email}}" type="email" class="form-control input-lg"
                                           id="email"  autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="telefone" class="col-sm-2 control-label" >Telefone </label>
                                <div class="col-sm-10">
                                    <input name="telefone" value="{{$usuario->telefone}}" type="tel" class="form-control input-lg"
                                           id="telefone"  autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="cpf" class="col-sm-2 control-label" >CPF </label>
                                <div class="col-sm-10">
                                    <input name="cpf" value="{{$usuario->cpf}}" type="text" class="form-control input-lg"
                                           id="cpf"  autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="dt_nasc" class="col-sm-2 control-label" >Data Nascimento</label>
                                <div class="col-sm-10">



                                    <input placeholder="00/00/0000" name="dt_nasc" value="{{ $usuario->dt_nasc }}" type="date" class="form-control input-lg"
                                           id="dt_nasc">
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="sexo" class="col-sm-2 control-label">Sexo</label>
                                <div class="col-sm-10">
                                    <select name="sexo" id="sexo" class="form-control">

                                        <option value="Masculino">Masculino</option>
                                        <option value="Feminino">Feminino</option>

                                    </select>



                                </div>
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
                                <label for="foto" class="col-sm-2 control-label">Foto</label>
                                <input name="foto" type="file" class="form-control-file"
                                       id="foto" autofocus>
                            </div>



                            <div class="form-group">
                                <label for="status" class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-10">
                                    <select name="ativo" id="ativo" class="form-control">
                                        <option value="1" {{$usuario->ativo == '1' ? "selected" : ""}}>Ativado</option>
                                        <option value="0" {{$usuario->ativo == '0' ? "selected" : ""}}>Desativado</option>

                                    </select>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="supermercado" class="col-sm-2 control-label">Estabelecimento</label>
                                <div class="col-sm-10">
                                    <select name="supermercado" id="supermercado" class="form-control">
                                        @foreach($supermercados as $supermercado)
                                            <option value="{{$supermercado->id}}">{{$supermercado->nome}}</option>
                                        @endforeach

                                    </select>

                                </div>
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
    <script type="text/javascript">
        $(document).ready(function () {
            $('#pais').click(function () {
                $.ajax({
                    url:'../../listEstados/'+$('#pais').val(),
                    type:'GET',
                    dataType:'json',
                    success: function (json) {
                        $('#estados').find('option').remove();
                        $('#cidades').find('option').remove();
                        $('#estados').removeAttr('disabled');
                        $('#pais').find('#paisOp').remove();
                        $.each(JSON.parse(json), function (i, obj) {
                            $('#estados').append($('<option>').text(obj.nome).attr('value', obj.id));
                        })
                    }
                })
            })

            $('#estados').click(function () {
                $.ajax({
                    url:'../../listCidades/'+$('#estados').val(),
                    type:'GET',
                    dataType:'json',
                    success: function (json) {
                        $('#cidades').find('option').remove();
                        $('#cidades').removeAttr('disabled');
                        $.each(JSON.parse(json), function (i, obj) {
                            $('#cidades').append($('<option>').text(obj.nome).attr('value', obj.id));
                        })
                    }
                })
            })
        })
    </script>
@endsection