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


                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection

        @section('scriptlocal')




            <style>
                #imagem {

                    width: 100%;
                    height: 100%;
                }



            </style>



    {{--<script>--}}
    {{--//Verifica e solicita se o usuario tem permissao para utilizar as notificações do Chrome--}}
    {{--document.addEventListener('DOMContentLoaded', function () {--}}
    {{--if (!Notification) {--}}
    {{--alert('Desktop notifications not available in your browser. Try Chromium.');--}}
    {{--return;--}}
    {{--}--}}

    {{--if (Notification.permission !== "granted")--}}
    {{--Notification.requestPermission();--}}
    {{--});--}}


    {{--</script>--}}


@endsection
