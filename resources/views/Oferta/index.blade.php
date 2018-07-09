@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Ofertas
@stop

@section('contentheader_title')

@stop

@section('contentheader_description')
    Lista das Ofertas
@stop


@section('main-content')

    <div class="container-fluid spark-screen">
        <div class="row">

            <div class="col-md-10 col-md-offset-1">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Ofertas</h3>
                        <div align="right"><a href="{{route('ofertas.create')}}" class="btn btn-success">Novo</a></div>
                    </div>

                    <div class="box-body">

                        <table class="table table-bordered table-striped" id="tabOferta">
                            <thead>
                            <tr>
                                <td class="col-md-4"><strong>Descrição</strong></td>
                                <td class="col-md-4"><strong>Marca</strong></td>
                                <td class="col-md-4"><strong>Estabelecimento</strong></td>
                                <td class="col-md-4"><strong>Inicio</strong></td>
                                <td class="col-md-4"><strong>Fim</strong></td>
                                <td class="col-md-4"><strong>Valor</strong></td>
                                <td align="center"><strong>Ações</strong></td>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($ofertas as $oferta)
                                <tr align="center">
                                    <td align="left">{{ $oferta->produto->descricao }}</td>
                                    <td align="left">{{ $oferta->produto->marca->descricao }}</td>
                                    <td align="left">{{ $oferta->supermercado->nome }}</td>
                                    <td align="left">{{ \Carbon\Carbon::parse($oferta->dt_ini)->format('d/m/Y') }}</td>
                                    <td align="left">{{ \Carbon\Carbon::parse($oferta->dt_fim)->format('d/m/Y') }}</td>
                                    <td align="left">{{ $oferta->valor }}</td>
                                    <td>


                                        <a class="btn btn-small btn-warning" href="{{route('ofertas.edit',$oferta->id)}}" >
                                            <i class="fa fa-pencil-square-o"></i>
                                            Editar
                                        </a>

                                        <a class="btn btn-small btn-danger" data-toggle="modal" href="#myModal{{ $oferta->id }}" >
                                            <i class="fa fa-trash-o"></i>
                                            Excluir
                                        </a>

                                        <div class="modal fade modal-danger" id="myModal{{ $oferta->id }}" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Excluir</h4>
                                                    </div>

                                                    <div class="modal-body text-center">
                                                        <p>Realmente Deseja excluir {{$oferta->produto->descricao}} ??</p>
                                                    </div>

                                                    <div class="modal-footer">

                                                        <form id="formDelete{{ $oferta->id }}"
                                                              action="{{action('OfertaController@destroy',$oferta->id)}}" method="POST">

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

                        {{--<div class="text-center">
                            {!! $marcas->links() !!}
                        </div>--}}


                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scriptlocal')


    <script type="text/javascript">
        $(document).ready(function () {
            $('#tabOferta').DataTable( {
                "language": {
                    "paginate": {
                        "previous": "Anterior",
                        "next": "Próxima"
                    },
                    "sSearch": "<span>Pesquisar</span> _INPUT_", //search
                    "lengthMenu": "Exibir _MENU_ registros por página",
                    "zeroRecords": "Não há resultados para esta busca",
                    "info": "Exibindo página _PAGE_ de _PAGES_",
                    "infoEmpty": "Nenhum registro disponível",
                    "infoFiltered": "(Filtrado de _MAX_ registros)"

                }
            } );

        })
    </script>

@endsection