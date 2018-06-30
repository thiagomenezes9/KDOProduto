@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Segmentos
@stop

@section('contentheader_title')

@stop

@section('contentheader_description')
    Lista dos Segmentos
@stop


@section('main-content')

    <div class="container-fluid spark-screen">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Segmentos</h3>
                        <div align="right"><a href="{{route('segmentos.create')}}" class="btn btn-success">Novo</a></div>
                    </div>

                    <div class="box-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <td class="col-md-6"><strong>Descrição</strong></td>
                                <td align="center"><strong>Ações</strong></td>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($segmentos as $segmento)
                                <tr align="center">
                                    <td align="left">{{ $segmento->descricao }}</td>
                                    <td>
                                        <a class="btn btn-small btn-info" href="{{route('segmentos.show',$segmento)}}" >
                                            <i class="fa fa-search-plus"></i>
                                            Detalhes
                                        </a>

                                        <a class="btn btn-small btn-warning" href="{{route('segmentos.edit',$segmento)}}" >
                                            <i class="fa fa-pencil-square-o"></i>
                                            Editar
                                        </a>

                                        <a class="btn btn-small btn-danger" data-toggle="modal" href="#myModal{{ $segmento->id }}" >
                                            <i class="fa fa-trash-o"></i>
                                            Excluir
                                        </a>

                                        <div class="modal fade modal-danger" id="myModal{{ $segmento->id }}" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Excluir</h4>
                                                    </div>

                                                    <div class="modal-body text-center">
                                                        <p>Realmente Deseja excluir {{$segmento->descricao}} ??</p>
                                                    </div>

                                                    <div class="modal-footer">

                                                        <form id="formDelete{{ $segmento->id }}"
                                                              action="{{action('MarcaController@destroy',$segmento->id)}}" method="POST">

                                                            {{ csrf_field() }}
                                                            {{--{{ method_field('DELETE') }}--}}

                                                            <input type="hidden" name="_method" value="DELETE">

                                                            <button class="btn btn-danger" type="submit">Excluir</button>
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>


                                                        </form>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>



                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="text-center">
                            {!! $segmentos->links() !!}
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection