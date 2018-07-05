@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Estabelecimentos
@stop

@section('contentheader_title')

@stop

@section('contentheader_description')
    Lista dos Estabelecimentos
@stop


@section('main-content')

    <div class="container-fluid spark-screen">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Estabelecimentos</h3>
                        <div align="right"><a href="{{route('estabelecimentos.create')}}" class="btn btn-success">Novo</a></div>
                    </div>

                    <div class="box-body">

                        <table class="table table-bordered table-striped" id="tabEstabelecimentos">
                            <thead>
                            <tr>
                                <td class="col-md-6"><strong>Descrição</strong></td>
                                <td align="center"><strong>Ações</strong></td>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($supermercados as $supermercado)
                                <tr align="center">
                                    <td align="left">{{ $supermercado->nome }}</td>
                                    <td>
                                        <a class="btn btn-small btn-info" href="{{route('estabelecimentos.show',$supermercado->id)}}" >
                                            <i class="fa fa-search-plus"></i>
                                            Detalhes
                                        </a>

                                        <a class="btn btn-small btn-warning" href="{{route('estabelecimentos.edit',$supermercado->id)}}" >
                                            <i class="fa fa-pencil-square-o"></i>
                                            Editar
                                        </a>



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
            $('#tabEstabelecimentos').DataTable( {
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