@extends('uiPlantilla')


@section('customTitle')
  {{ $vNomModulo }}
@stop


@section('customHead')

    <meta name="csrf-token" content="{{ csrf_token() }}">

@stop


@section('customBread')

    <div class="breadcrumb-wrapper">
        <h4 class="mainTitle no-margin">{{ $vNomModulo }}</h4>
        <ul class="pull-right breadcrumb">
            <li>
                <a href="{{ url('/Principal') }}">
                    <i class="fa fa-home margin-right-5 text-large text-dark"></i>
                    Principal
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-user margin-right-5 text-large text-dark"></i>
                    Estadísticas
                </a>
            </li>
            <li>
                <a href="{{ url('/Esta_RH_General') }}">
                    <i class="fa fa-home margin-right-5 text-large text-dark"></i>
                    {{ $vNomModulo }}
                </a>
            </li>
        </ul>
    </div>

@stop


@section('customContent')
    <div class="container-fluid container-fullw">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-white">
                    <div class="panel-body">
                        <div class="container-fluid container-fullw padding-bottom-10">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-white no-radius" id="panelsocial">
                                        <div class="panel-heading border-light">
                                            <h4 class="panel-title">Personal por Sede</h4>
                                            <div class="panel-tools">
                                                <a data-original-title="Minimizar" data-toggle="tooltip" data-placement="top" data-trigger="hover" class="btn btn-transparent btn-sm panel-collapse" href="#"><i class="ti-minus collapse-off"></i><i class="ti-plus collapse-on"></i></a>
                                                <a data-original-title="Cerrar" data-toggle="tooltip" data-placement="top" data-trigger="hover" class="btn btn-transparent btn-sm panel-close" href="#"><i class="ti-close"></i></a>
                                            </div>
                                        </div>
                                        <div class="panel-wrapper">
                                            <div class="panel-body no-padding">
                                                <div class="col-sm-12">
                                                    <table class="table table-stylish" id="sample-table-2">
                                                        <thead>
                                                            <tr>
                                                                <th class="center no-border">#</th>
                                                                <th class="no-border">Sede</th>
                                                                <th class="no-border">
                                                                    Hombre 
                                                                    <a href="javascript:void(0)" data-toggle="popover" data-trigger="focus" data-placement="top" data-content=".">
                                                                        <i class="fa fa-question-circle text-dark-transparent margin-left-5"></i>
                                                                    </a>
                                                                </th>
                                                                <th class="no-border">
                                                                    Mujer 
                                                                    <a href="javascript:void(0)" data-toggle="popover" data-trigger="focus" data-placement="top" data-content=".">
                                                                        <i class="fa fa-question-circle text-dark-transparent margin-left-5"></i>
                                                                    </a>
                                                                </th>
                                                                <th class="no-border">
                                                                    Total 
                                                                    <a href="javascript:void(0)" data-toggle="popover" data-trigger="focus" data-placement="top" data-content=".">
                                                                        <i class="fa fa-question-circle text-dark-transparent margin-left-5"></i>
                                                                    </a>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $xD = 1;
                                                                $vTCantMD = 0;
                                                                $vTCantFD = 0;
                                                            @endphp 
                                                            @foreach($vRH_PersSede as $vT)
                                                                <tr>
                                                                    <td class="text-bold center">
                                                                        {{ $xD++ }}
                                                                    </td>
                                                                    <td class="text-bold">
                                                                        {{ $vT->Sed_Nombre }}
                                                                    </td>
                                                                    <td>
                                                                        {{ $vT->CantM }}
                                                                    </td>
                                                                    <td>
                                                                        {{ $vT->CantF }}
                                                                    </td>
                                                                    <td class="text-bold">
                                                                        {{ $vT->CantM + $vT->CantF }}
                                                                    </td>
                                                                    @php
                                                                        $vTCantMD = $vTCantMD + $vT->CantM;
                                                                        $vTCantFD = $vTCantFD + $vT->CantF;
                                                                    @endphp 
                                                                </tr>
                                                            @endforeach

                                                            <tr class="text-bold" >
                                                                <td></td>
                                                                <td>
                                                                    <span class="block">Total</span> 
                                                                </td>
                                                                <td>
                                                                    <span class="text-bold">{{ $vTCantMD }}</span>
                                                                </td>
                                                                <td>
                                                                    <span class="text-bold">{{ $vTCantFD }}</span>
                                                                </td>
                                                                <td>
                                                                    <span class="text-bold">{{ $vTCantMD + $vTCantFD }}</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    @php
                                                        $vPorMD = ($vTCantMD * 100) / ($vTCantMD + $vTCantFD);
                                                        $vPorFD = ($vTCantFD * 100) / ($vTCantMD + $vTCantFD);
                                                    @endphp
                                                </div>
                                                <div class="col-xs-6 no-padding border-right">
                                                    <div class="padding-10 text-center">
                                                        <i class="fa fa-male text-azure large-letters"></i>
                                                        <span class="text-extra-large block margin-top-15">{{ number_format($vPorMD, 2) }}%</span>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 no-padding">
                                                    <div class="padding-10 text-center">
                                                        <i class="fa fa-female text-pink large-letters"></i>
                                                        <span class="text-extra-large block margin-top-15">{{ number_format($vPorFD, 2) }}%</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <canvas id="barChart" class="full-width"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-white no-radius" id="panelsocial">
                                        <div class="panel-heading border-light">
                                            <h4 class="panel-title">Personal por Superior Jerárquico</h4>
                                            <div class="panel-tools">
                                                <a data-original-title="Minimizar" data-toggle="tooltip" data-placement="top" data-trigger="hover" class="btn btn-transparent btn-sm panel-collapse" href="#"><i class="ti-minus collapse-off"></i><i class="ti-plus collapse-on"></i></a>
                                                <a data-original-title="Cerrar" data-toggle="tooltip" data-placement="top" data-trigger="hover" class="btn btn-transparent btn-sm panel-close" href="#"><i class="ti-close"></i></a>
                                            </div>
                                        </div>
                                        <div class="panel-wrapper">
                                            <div class="panel-body no-padding">
                                                <div class="col-sm-12">
                                                    <table class="table table-stylish" id="sample-table-2">
                                                        <thead>
                                                            <tr>
                                                                <th class="center no-border">#</th>
                                                                <th class="no-border">Superior Jerárquico</th>
                                                                <th class="no-border">Abreviatura</th>
                                                                <th class="no-border">
                                                                    Hombre 
                                                                    <a href="javascript:void(0)" data-toggle="popover" data-trigger="focus" data-placement="top" data-content=".">
                                                                        <i class="fa fa-question-circle text-dark-transparent margin-left-5"></i>
                                                                    </a>
                                                                </th>
                                                                <th class="no-border">
                                                                    Mujer 
                                                                    <a href="javascript:void(0)" data-toggle="popover" data-trigger="focus" data-placement="top" data-content=".">
                                                                        <i class="fa fa-question-circle text-dark-transparent margin-left-5"></i>
                                                                    </a>
                                                                </th>
                                                                <th class="no-border">
                                                                    Total 
                                                                    <a href="javascript:void(0)" data-toggle="popover" data-trigger="focus" data-placement="top" data-content=".">
                                                                        <i class="fa fa-question-circle text-dark-transparent margin-left-5"></i>
                                                                    </a>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $xD = 1;
                                                                $vTCantMD = 0;
                                                                $vTCantFD = 0;
                                                            @endphp 
                                                            @foreach($vRH_PersSuJe as $vT)
                                                                <tr>
                                                                    <td class="text-bold center">
                                                                        {{ $xD++ }}
                                                                    </td>
                                                                    <td class="text-bold">
                                                                        {{ $vT->SJe_Nombre }}
                                                                    </td>
                                                                    <td class="text-bold">
                                                                        {{ $vT->SJe_Abreviatura }}
                                                                    </td>
                                                                    <td>
                                                                        {{ $vT->CantM }}
                                                                    </td>
                                                                    <td>
                                                                        {{ $vT->CantF }}
                                                                    </td>
                                                                    <td class="text-bold">
                                                                        {{ $vT->CantM + $vT->CantF }}
                                                                    </td>
                                                                    @php
                                                                        $vTCantMD = $vTCantMD + $vT->CantM;
                                                                        $vTCantFD = $vTCantFD + $vT->CantF;
                                                                    @endphp 
                                                                </tr>
                                                            @endforeach

                                                            <tr class="text-bold" >
                                                                <td></td>
                                                                <td colspan="2">
                                                                    <span class="block">Total</span> 
                                                                </td>
                                                                <td>
                                                                    <span class="text-bold">{{ $vTCantMD }}</span>
                                                                </td>
                                                                <td>
                                                                    <span class="text-bold">{{ $vTCantFD }}</span>
                                                                </td>
                                                                <td>
                                                                    <span class="text-bold">{{ $vTCantMD + $vTCantFD }}</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    @php
                                                        $vPorMD = ($vTCantMD * 100) / ($vTCantMD + $vTCantFD);
                                                        $vPorFD = ($vTCantFD * 100) / ($vTCantMD + $vTCantFD);
                                                    @endphp
                                                </div>

                                                <div class="col-sm-12">
                                                    <canvas id="barChartSJ" class="full-width"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-white no-radius" id="panelsocial">
                                        <div class="panel-heading border-light">
                                            <h4 class="panel-title">Personal por Departamento</h4>
                                            <div class="panel-tools">
                                                <a data-original-title="Minimizar" data-toggle="tooltip" data-placement="top" data-trigger="hover" class="btn btn-transparent btn-sm panel-collapse" href="#"><i class="ti-minus collapse-off"></i><i class="ti-plus collapse-on"></i></a>
                                                <a data-original-title="Cerrar" data-toggle="tooltip" data-placement="top" data-trigger="hover" class="btn btn-transparent btn-sm panel-close" href="#"><i class="ti-close"></i></a>
                                            </div>
                                        </div>
                                        <div class="panel-wrapper">
                                            <div class="panel-body no-padding">
                                                <div class="col-sm-12">
                                                    <table class="table table-stylish" id="sample-table-2">
                                                        <thead>
                                                            <tr>
                                                                <th class="center no-border">#</th>
                                                                <th class="no-border">Departamento</th>
                                                                <th class="no-border">Abreviatura</th>
                                                                <th class="no-border">
                                                                    Hombre 
                                                                    <a href="javascript:void(0)" data-toggle="popover" data-trigger="focus" data-placement="top" data-content=".">
                                                                        <i class="fa fa-question-circle text-dark-transparent margin-left-5"></i>
                                                                    </a>
                                                                </th>
                                                                <th class="no-border">
                                                                    Mujer 
                                                                    <a href="javascript:void(0)" data-toggle="popover" data-trigger="focus" data-placement="top" data-content=".">
                                                                        <i class="fa fa-question-circle text-dark-transparent margin-left-5"></i>
                                                                    </a>
                                                                </th>
                                                                <th class="no-border">
                                                                    Total 
                                                                    <a href="javascript:void(0)" data-toggle="popover" data-trigger="focus" data-placement="top" data-content=".">
                                                                        <i class="fa fa-question-circle text-dark-transparent margin-left-5"></i>
                                                                    </a>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $xD = 1;
                                                                $vTCantMD = 0;
                                                                $vTCantFD = 0;
                                                            @endphp 
                                                            @foreach($vRH_PersDepa as $vT)
                                                                <tr>
                                                                    <td class="text-bold center">
                                                                        {{ $xD++ }}
                                                                    </td>
                                                                    <td class="text-bold">
                                                                        {{ $vT->Dep_Nombre }}
                                                                    </td>
                                                                    <td class="text-bold">
                                                                        {{ $vT->Dep_Abreviatura }}
                                                                    </td>
                                                                    <td>
                                                                        {{ $vT->CantM }}
                                                                    </td>
                                                                    <td>
                                                                        {{ $vT->CantF }}
                                                                    </td>
                                                                    <td class="text-bold">
                                                                        {{ $vT->CantM + $vT->CantF }}
                                                                    </td>
                                                                    @php
                                                                        $vTCantMD = $vTCantMD + $vT->CantM;
                                                                        $vTCantFD = $vTCantFD + $vT->CantF;
                                                                    @endphp 
                                                                </tr>
                                                            @endforeach

                                                            <tr class="text-bold" >
                                                                <td></td>
                                                                <td colspan="2">
                                                                    <span class="block">Total</span> 
                                                                </td>
                                                                <td>
                                                                    <span class="text-bold">{{ $vTCantMD }}</span>
                                                                </td>
                                                                <td>
                                                                    <span class="text-bold">{{ $vTCantFD }}</span>
                                                                </td>
                                                                <td>
                                                                    <span class="text-bold">{{ $vTCantMD + $vTCantFD }}</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    @php
                                                        $vPorMD = ($vTCantMD * 100) / ($vTCantMD + $vTCantFD);
                                                        $vPorFD = ($vTCantFD * 100) / ($vTCantMD + $vTCantFD);
                                                    @endphp
                                                </div>

                                                <div class="col-sm-12">
                                                    <canvas id="barChartDep" class="full-width"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-white no-radius" id="panelsocial">
                                            <div class="panel-heading border-light">
                                                <h4 class="panel-title">Personal por Categoría</h4>
                                                <div class="panel-tools">
                                                    <a data-original-title="Minimizar" data-toggle="tooltip" data-placement="top" data-trigger="hover" class="btn btn-transparent btn-sm panel-collapse" href="#"><i class="ti-minus collapse-off"></i><i class="ti-plus collapse-on"></i></a>
                                                    <a data-original-title="Cerrar" data-toggle="tooltip" data-placement="top" data-trigger="hover" class="btn btn-transparent btn-sm panel-close" href="#"><i class="ti-close"></i></a>
                                                </div>
                                            </div>
                                            <div class="panel-wrapper">
                                                <div class="panel-body no-padding">
                                                    <div class="col-sm-12">
                                                        <table class="table table-stylish" id="sample-table-2">
                                                            <thead>
                                                                <tr>
                                                                    <th class="center no-border">#</th>
                                                                    <th class="no-border">Categoría</th>
                                                                    <th class="no-border">
                                                                        Hombre 
                                                                        <a href="javascript:void(0)" data-toggle="popover" data-trigger="focus" data-placement="top" data-content=".">
                                                                            <i class="fa fa-question-circle text-dark-transparent margin-left-5"></i>
                                                                        </a>
                                                                    </th>
                                                                    <th class="no-border">
                                                                        Mujer 
                                                                        <a href="javascript:void(0)" data-toggle="popover" data-trigger="focus" data-placement="top" data-content=".">
                                                                            <i class="fa fa-question-circle text-dark-transparent margin-left-5"></i>
                                                                        </a>
                                                                    </th>
                                                                    <th class="no-border">
                                                                        Total 
                                                                        <a href="javascript:void(0)" data-toggle="popover" data-trigger="focus" data-placement="top" data-content=".">
                                                                            <i class="fa fa-question-circle text-dark-transparent margin-left-5"></i>
                                                                        </a>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @php
                                                                    $xD = 1;
                                                                    $vTCantMD = 0;
                                                                    $vTCantFD = 0;
                                                                @endphp 
                                                                @foreach($vRH_PersCate as $vT)
                                                                    <tr>
                                                                        <td class="text-bold center">
                                                                            {{ $xD++ }}
                                                                        </td>
                                                                        <td class="text-bold">
                                                                            {{ $vT->CPu_Nombre }}
                                                                        </td>
                                                                        <td>
                                                                            {{ $vT->CantM }}
                                                                        </td>
                                                                        <td>
                                                                            {{ $vT->CantF }}
                                                                        </td>
                                                                        <td class="text-bold">
                                                                            {{ $vT->CantM + $vT->CantF }}
                                                                        </td>
                                                                        @php
                                                                            $vTCantMD = $vTCantMD + $vT->CantM;
                                                                            $vTCantFD = $vTCantFD + $vT->CantF;
                                                                        @endphp 
                                                                    </tr>
                                                                @endforeach
    
                                                                <tr class="text-bold" >
                                                                    <td></td>
                                                                    <td>
                                                                        <span class="block">Total</span> 
                                                                    </td>
                                                                    <td>
                                                                        <span class="text-bold">{{ $vTCantMD }}</span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="text-bold">{{ $vTCantFD }}</span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="text-bold">{{ $vTCantMD + $vTCantFD }}</span>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        @php
                                                            $vPorMD = ($vTCantMD * 100) / ($vTCantMD + $vTCantFD);
                                                            $vPorFD = ($vTCantFD * 100) / ($vTCantMD + $vTCantFD);
                                                        @endphp
                                                    </div>
    
                                                    <div class="col-sm-12">
                                                        <canvas id="barChartCat" class="full-width"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop


@section('customScript')
    <script src="{{ asset('/bower_components/Chart-js/Chart.min.js?v=2') }}"></script>
@stop


@section('customScript2')

    <script>

        var Charts = function() {"use strict";

            var barChartHandler = function() {
                var options = {

                    // Sets the chart to be responsive
                    responsive: true,

                    //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
                    scaleBeginAtZero: true,

                    //Boolean - Whether grid lines are shown across the chart
                    scaleShowGridLines: true,

                    //String - Colour of the grid lines
                    scaleGridLineColor: "rgba(0,0,0,.05)",

                    //Number - Width of the grid lines
                    scaleGridLineWidth: 1,

                    //Boolean - If there is a stroke on each bar
                    barShowStroke: true,

                    //Number - Pixel width of the bar stroke
                    barStrokeWidth: 2,

                    //Number - Spacing between each of the X value sets
                    barValueSpacing: 5,

                    //Number - Spacing between data sets within X values
                    barDatasetSpacing: 1,

                    //String - A legend template
                    legendTemplate: '<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>'
                };
                var data = {
                    labels: [@foreach($vRH_PersSede as $vTitD) "{{ $vTitD->Sed_Nombre }}", @endforeach],

                    datasets: [{
                        label: "Hombre",
                        fillColor: "rgba(91, 155, 209,0.5)",
                        strokeColor: "rgba(91, 155, 209,0.8)",
                        highlightFill: "rgba(91, 155, 209,0.75)",
                        highlightStroke: "rgba(91, 155, 209,1)",
                        data: [@foreach($vRH_PersSede as $vCMD) {{ $vCMD->CantM }}, @endforeach]
                    }, {
                        label: "Mujer",
                        fillColor: "rgba(245,136,141,0.5)",
                        strokeColor: "rgba(245,136,141,0.8)",
                        highlightFill: "rgba(245,136,141,0.75)",
                        highlightStroke: "rgba(245,136,141,1)",
                        data: [@foreach($vRH_PersSede as $vCFD) {{ $vCFD->CantF }}, @endforeach]
                    }]
                };

                // Get context with jQuery - using jQuery's .get() method.
                var ctx = $("#barChart").get(0).getContext("2d");
                // This will get the first returned node in the jQuery collection.
                var barChart = new Chart(ctx).Bar(data, options);
                ;
                //generate the legend
                var legend = barChart.generateLegend();
                //and append it to your page somewhere
                $('#barLegend').append(legend);
            };

            var barChartSJ = function() {
                var options = {

                    // Sets the chart to be responsive
                    responsive: true,

                    //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
                    scaleBeginAtZero: true,

                    //Boolean - Whether grid lines are shown across the chart
                    scaleShowGridLines: true,

                    //String - Colour of the grid lines
                    scaleGridLineColor: "rgba(0,0,0,.05)",

                    //Number - Width of the grid lines
                    scaleGridLineWidth: 1,

                    //Boolean - If there is a stroke on each bar
                    barShowStroke: true,

                    //Number - Pixel width of the bar stroke
                    barStrokeWidth: 2,

                    //Number - Spacing between each of the X value sets
                    barValueSpacing: 5,

                    //Number - Spacing between data sets within X values
                    barDatasetSpacing: 1,

                    //String - A legend template
                    legendTemplate: '<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>'
                };
                var data = {
                    labels: [@foreach($vRH_PersSuJe as $vTitD) "{{ $vTitD->SJe_Nombre }}", @endforeach],

                    datasets: [{
                        label: "Hombre",
                        fillColor: "rgba(91, 155, 209,0.5)",
                        strokeColor: "rgba(91, 155, 209,0.8)",
                        highlightFill: "rgba(91, 155, 209,0.75)",
                        highlightStroke: "rgba(91, 155, 209,1)",
                        data: [@foreach($vRH_PersSuJe as $vCMD) {{ $vCMD->CantM }}, @endforeach]
                    }, {
                        label: "Mujer",
                        fillColor: "rgba(245,136,141,0.5)",
                        strokeColor: "rgba(245,136,141,0.8)",
                        highlightFill: "rgba(245,136,141,0.75)",
                        highlightStroke: "rgba(245,136,141,1)",
                        data: [@foreach($vRH_PersSuJe as $vCFD) {{ $vCFD->CantF }}, @endforeach]
                    }]
                };

                // Get context with jQuery - using jQuery's .get() method.
                var ctx = $("#barChartSJ").get(0).getContext("2d");
                // This will get the first returned node in the jQuery collection.
                var barChart = new Chart(ctx).Bar(data, options);
                ;
                //generate the legend
                var legend = barChart.generateLegend();
                //and append it to your page somewhere
                $('#barLegend').append(legend);
            };

            var barChartDep = function() {
                var options = {

                    // Sets the chart to be responsive
                    responsive: true,

                    //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
                    scaleBeginAtZero: true,

                    //Boolean - Whether grid lines are shown across the chart
                    scaleShowGridLines: true,

                    //String - Colour of the grid lines
                    scaleGridLineColor: "rgba(0,0,0,.05)",

                    //Number - Width of the grid lines
                    scaleGridLineWidth: 1,

                    //Boolean - If there is a stroke on each bar
                    barShowStroke: true,

                    //Number - Pixel width of the bar stroke
                    barStrokeWidth: 2,

                    //Number - Spacing between each of the X value sets
                    barValueSpacing: 5,

                    //Number - Spacing between data sets within X values
                    barDatasetSpacing: 1,

                    //String - A legend template
                    legendTemplate: '<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>'
                };
                var data = {
                    labels: [@foreach($vRH_PersDepa as $vTitD) "{{ $vTitD->Dep_Abreviatura }}", @endforeach],

                    datasets: [{
                        label: "Hombre",
                        fillColor: "rgba(91, 155, 209,0.5)",
                        strokeColor: "rgba(91, 155, 209,0.8)",
                        highlightFill: "rgba(91, 155, 209,0.75)",
                        highlightStroke: "rgba(91, 155, 209,1)",
                        data: [@foreach($vRH_PersDepa as $vCMD) {{ $vCMD->CantM }}, @endforeach]
                    }, {
                        label: "Mujer",
                        fillColor: "rgba(245,136,141,0.5)",
                        strokeColor: "rgba(245,136,141,0.8)",
                        highlightFill: "rgba(245,136,141,0.75)",
                        highlightStroke: "rgba(245,136,141,1)",
                        data: [@foreach($vRH_PersDepa as $vCFD) {{ $vCFD->CantF }}, @endforeach]
                    }]
                };

                // Get context with jQuery - using jQuery's .get() method.
                var ctx = $("#barChartDep").get(0).getContext("2d");
                // This will get the first returned node in the jQuery collection.
                var barChart = new Chart(ctx).Bar(data, options);
                ;
                //generate the legend
                var legend = barChart.generateLegend();
                //and append it to your page somewhere
                $('#barLegend').append(legend);
            };

            var barChartCat = function() {
                var options = {

                    // Sets the chart to be responsive
                    responsive: true,

                    //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
                    scaleBeginAtZero: true,

                    //Boolean - Whether grid lines are shown across the chart
                    scaleShowGridLines: true,

                    //String - Colour of the grid lines
                    scaleGridLineColor: "rgba(0,0,0,.05)",

                    //Number - Width of the grid lines
                    scaleGridLineWidth: 1,

                    //Boolean - If there is a stroke on each bar
                    barShowStroke: true,

                    //Number - Pixel width of the bar stroke
                    barStrokeWidth: 2,

                    //Number - Spacing between each of the X value sets
                    barValueSpacing: 5,

                    //Number - Spacing between data sets within X values
                    barDatasetSpacing: 1,

                    //String - A legend template
                    legendTemplate: '<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>'
                };
                var data = {
                    labels: [@foreach($vRH_PersCate as $vTitD) "{{ $vTitD->CPu_Nombre }}", @endforeach],

                    datasets: [{
                        label: "Hombre",
                        fillColor: "rgba(91, 155, 209,0.5)",
                        strokeColor: "rgba(91, 155, 209,0.8)",
                        highlightFill: "rgba(91, 155, 209,0.75)",
                        highlightStroke: "rgba(91, 155, 209,1)",
                        data: [@foreach($vRH_PersCate as $vCMD) {{ $vCMD->CantM }}, @endforeach]
                    }, {
                        label: "Mujer",
                        fillColor: "rgba(245,136,141,0.5)",
                        strokeColor: "rgba(245,136,141,0.8)",
                        highlightFill: "rgba(245,136,141,0.75)",
                        highlightStroke: "rgba(245,136,141,1)",
                        data: [@foreach($vRH_PersCate as $vCFD) {{ $vCFD->CantF }}, @endforeach]
                    }]
                };

                // Get context with jQuery - using jQuery's .get() method.
                var ctx = $("#barChartCat").get(0).getContext("2d");
                // This will get the first returned node in the jQuery collection.
                var barChart = new Chart(ctx).Bar(data, options);
                ;
                //generate the legend
                var legend = barChart.generateLegend();
                //and append it to your page somewhere
                $('#barLegend').append(legend);
            };

            return {
                init: function() {
                    barChartHandler();
                    barChartSJ();
                    barChartDep();
                    barChartCat();
                }
            };
        }();

        jQuery(document).ready(function() {
            Main.init();
            Charts.init();
        });
    </script>

@stop