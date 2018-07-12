@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Preços
@stop

@section('contentheader_title')

@stop

@section('contentheader_description')
    Lista dos Preços
@stop


@section('main-content')

    <div class="container-fluid spark-screen">
        <div class="row">

            <div class="col-md-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Preços</h3>
                        <div align="right"><a href="{{route('precos.create')}}" class="btn btn-success">Novo</a></div>
                    </div>

                    <div class="box-body">

                        <table class="table table-bordered table-striped" id="tabPreco">
                            <thead>
                            <tr>
                                <td class="col-md-4"><strong>Descrição</strong></td>
                                <td class="col-md-4"><strong>Marca</strong></td>
                                <td class="col-md-4"><strong>Estabelecimento</strong></td>
                                <td class="col-md-4"><strong>Valor</strong></td>
                                <td align="center"><strong>Ações</strong></td>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($precos as $preco)
                                <tr align="center">
                                    <td align="left">{{ $preco->produto->descricao }}</td>
                                    <td align="left">{{ $preco->produto->marca->descricao }}</td>
                                    <td align="left">{{ $preco->supermercado->nome }}</td>
                                    <td align="left">{{ $preco->valor }}</td>
                                    <td>


                                        <a class="btn btn-small btn-warning" href="{{route('precos.edit',$preco->id)}}" >
                                            <i class="fa fa-pencil-square-o"></i>
                                            Editar
                                        </a>

                                        <a class="btn btn-small btn-danger" data-toggle="modal" href="#myModal{{ $preco->id }}" >
                                            <i class="fa fa-trash-o"></i>
                                            Excluir
                                        </a>

                                        <div class="modal fade modal-danger" id="myModal{{ $preco->id }}" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Excluir</h4>
                                                    </div>

                                                    <div class="modal-body text-center">
                                                        <p>Realmente Deseja excluir {{$preco->produto->descricao}} ??</p>
                                                    </div>

                                                    <div class="modal-footer">

                                                        <form id="formDelete{{ $preco->id }}"
                                                              action="{{action('PrecoController@destroy',$preco->id)}}" method="POST">

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
            $('#tabPreco').DataTable( {
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