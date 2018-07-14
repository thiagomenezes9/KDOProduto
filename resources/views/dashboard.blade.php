@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-12">


                <div class="row">

                    <div class="panel panel-default">
                        <div class="panel-body">

                            @if(isset($ofertas))



                                @foreach($ofertas as $oferta)


                                    <div class="col-sm-6 col-xs-12">
                                        <div class="info-box">
                                            <a href="{{route('busca.show',$oferta->produto->id)}}">
                                                <span class="info-box-icon"><img src="{{$oferta->produto->foto}}"
                                                                                 alt="Product Image"
                                                                                 class="imagem"></span>
                                            </a>
                                            <div class="info-box-content">
                                                <span class="info-box-text">{{$oferta->produto->descricao}}</span>
                                                <span class="info-box-number">R$ {{$oferta->valor}}</span>
                                                <span class="info-box-text"><small>{{$oferta->supermercado->nome}}</small></span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                    </div>



                                @endforeach





                            @else
                                <h1>Sem Ofertas</h1>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection

        @section('scriptlocal')

            <style>
                .imagem {

                    width: 100px;
                    height: 100px;
                }


            </style>



@endsection
