@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">



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

    {{--<style>--}}
        {{--#imagem {--}}
            {{--width: 1200px;--}}
            {{--height: 400px;--}}
            {{--/*width: 100%;*/--}}
            {{--/*height: 100%;*/--}}
        {{--}--}}

        {{--#texto {--}}
            {{--position: absolute;--}}
            {{--margin-top: -350px;--}}
            {{--left: 50px;--}}
            {{--z-index: 9999;--}}
            {{--color: black;--}}
            {{--max-width: 800px;--}}
            {{--font-size: 25px;--}}
            {{--font-weight: bold;--}}
        {{--}--}}

        {{--#titulo {--}}
            {{--position: absolute;--}}
            {{--margin-top: -410px;--}}
            {{--left: 200px;--}}
            {{--z-index: 9999;--}}
            {{--color: white;--}}
            {{--max-width: 800px;--}}
            {{--font-size: 42px;--}}
            {{--font-weight: bold;--}}
        {{--}--}}

    {{--</style>--}}



    <style>
        #imagem {

            width: 100%;
            height: 100%;
        }


        #texto {
            position: absolute;
            margin-top: -42%;
            left: 50px;
            z-index:9999;
            color: black;
            max-width: 800px;
            font-size: 25px;
            font-weight: bold;
        }


        #titulo{
            position: absolute;
            margin-top: -51%;
            left: 150px;
            z-index:9999;
            color: white;
            max-width: 800px;
            font-size: 42px;
            font-weight: bold;
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
