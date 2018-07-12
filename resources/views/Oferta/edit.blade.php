@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Ofertas
@stop

@section('contentheader_title')

@stop

@section('contentheader_description')
    Editar Oferta
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
                        <h3 class="box-title">Oferta</h3>
                        <div align="right"><a href="{{route('ofertas.index')}}" class="btn btn-info">Voltar</a></div>
                    </div>

                    <div class="box-body">

                        <form class="form-horizontal" action="{{route('ofertas.update',$oferta->id)}}" method="post" enctype="multipart/form-data" >


                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>

                            <input type="hidden" name="supermercado" value="{{$oferta->supermercado_id}}"/>

                            <input type="hidden" name="_method" value="PUT">







                            <div class="form-group">
                                <label for="produto" class="col-sm-2 control-label" >Produto</label>
                                <div class="col-sm-10">
                                    <input name="produto" value="{{ $oferta->produto->descricao }}" type="text" class="form-control input-lg"
                                           id="produto" autofocus disabled>
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="valor" class="col-sm-2 control-label" >Valor</label>
                                <div class="col-sm-10">
                                    <input name="valor" value="{{$oferta->valor }}" type="number" class="form-control input-lg"
                                           id="valor" placeholder="valor" autofocus></input>
                                </div>
                            </div>



                            <div class="form-group">
                            <label for="dt_ini" class="col-sm-2 control-label" >Data Inicial</label>
                            <div class="col-sm-10">



                                <input placeholder="00/00/0000" name="dt_ini" value="{{ $oferta->dt_ini }}" type="date" class="form-control input-lg" min="{{\Carbon\Carbon::now()}}"
                                       id="dt_ini">
                            </div>
                    </div>

                    <div class="form-group">
                        <label for="dt_fim" class="col-sm-2 control-label" >Data Final</label>
                        <div class="col-sm-10">



                            <input placeholder="00/00/0000" name="dt_fim" value="{{ $oferta->dt_fim }}" type="date" class="form-control input-lg" min="{{\Carbon\Carbon::now()}}"
                                   id="dt_fim">
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



@endsection