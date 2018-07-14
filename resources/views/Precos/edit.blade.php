@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Preço
@stop

@section('contentheader_title')

@stop

@section('contentheader_description')
    Editar Preço
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
                        <h3 class="box-title">Preço</h3>
                        <div align="right"><a href="{{route('precos.index')}}" class="btn btn-info">Voltar</a></div>
                    </div>

                    <div class="box-body">

                        <form class="form-horizontal" action="{{route('precos.update',$preco->id)}}" method="post" enctype="multipart/form-data" >


                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>

                            <input type="hidden" name="supermercado" value="{{$preco->supermercado_id}}"/>

                            <input type="hidden" name="_method" value="PUT">







                            <div class="form-group">
                                <label for="produto" class="col-sm-2 control-label" >Produto</label>
                                <div class="col-sm-10">
                                    <input name="produto" value="{{ $preco->produto->descricao }}" type="text" class="form-control input-lg"
                                           id="produto" autofocus disabled>
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="valor" class="col-sm-2 control-label" >Valor</label>
                                <div class="col-sm-10">
                                    <input name="valor" value="{{$preco->valor }}" type="text" class="form-control input-lg valor"
                                           id="valor" placeholder="valor" autofocus></input>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function(){

            $('.phone_with_ddd').mask('(00) 0000-0000');
            $('.cpf').mask('000.000.000-00', {reverse: true});
            $('.valor').mask('000000000000000.00', {reverse: true});
        });
    </script>

@endsection