@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Estabelecimentos
@stop

@section('contentheader_title')

@stop

@section('contentheader_description')
    Novo Estabelecimento
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
                        <h3 class="box-title">Novo Estabelecimento</h3>
                        <div align="right"><a href="{{route('estabelecimentos.index')}}" class="btn btn-info">Voltar</a></div>
                    </div>

                    <div class="box-body">

                        <form class="form-horizontal" action="{{action('SupermercadoController@store')}}" method="post" enctype="multipart/form-data">

                            <!-- 'nome', 'sigla',
                                'bandeira' -->

                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
                            <input type="hidden" value="1" name="ativo" id="ativo" >



                            <div class="form-group">
                                <label for="nome" class="col-sm-2 control-label" >Nome</label>
                                <div class="col-sm-10">
                                    <input name="nome" value="{{ old('nome') }}" type="text" class="form-control input-lg"
                                           id="nome" placeholder="Nome..." autofocus>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label" >E-mail</label>
                                <div class="col-sm-10">
                                    <input name="email" value="{{old('email')}}" type="email" class="form-control input-lg"
                                           id="email"  autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="telefone" class="col-sm-2 control-label" >Telefone </label>
                                <div class="col-sm-10">
                                    <input name="telefone" value="{{old('telefone')}}" type="tel" class="form-control input-lg"
                                           id="telefone"  autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="CNPJ" class="col-sm-2 control-label" >CNPJ </label>
                                <div class="col-sm-10">
                                    <input name="CNPJ" value="{{old('CNPJ')}}" type="text" class="form-control input-lg"
                                           id="CNPJ"  autofocus>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="nome" class="col-sm-2 control-label" >Endereco</label>
                                <div class="col-sm-10">
                                    <input name="endereco" value="{{ old('endereco') }}" type="text" class="form-control input-lg"
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
                                <label for="segmento" class="col-sm-2 control-label">Segmento</label>
                                <div class="col-sm-10">
                                    <select name="segmento" id="segmento" class="form-control">

                                        @foreach($segmentos as $segmento)
                                            {{--                                            <option value="{{$c->id}}" {{ $membro['id'] === (isset($coordenacao->responsavel) ? $coordenacao->responsavel: '' ) ? 'selected' : '' }}>{{$membro['name']}}</option>--}}
                                            <option value="{{$segmento->id}}">{{$segmento->descricao}}</option>

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