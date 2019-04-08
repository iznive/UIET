@extends('uiPlantilla')


@section('customTitle')
    Principal
@stop


@section('customHead')

@stop


@section('customBread')
    <div class="breadcrumb-wrapper">
        <h4 class="mainTitle no-margin">Principal</h4>
        <ul class="pull-right breadcrumb">
            <li>
                <a href="{{ url('/Principal') }}">
                    <i class="fa fa-home margin-right-5 text-large text-dark"></i>
                    Principal
                </a>
            </li>
        </ul>
    </div>
@stop


@section('customContent')

@stop


@section('customScript')

@stop


@section('customScript2')
    <script>
        jQuery(document).ready(function() {
            Main.init();
        });
    </script>
@stop