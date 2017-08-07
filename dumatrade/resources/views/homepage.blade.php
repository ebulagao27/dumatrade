@extends('app')

@section('content')
    <html ng-app="DemoApp">
    <head>
        <meta charset="UTF-8">
        <title>DGtrade</title>

        <link href="{{ asset('/css/angular-carousel.css')}}" rel="stylesheet">
        <link href="{{ asset('/css/demo.css')}}" rel="stylesheet">
    </head>
    <body ng-controller="DemoCtrl">

    <center>
        <div class="container">
            <div class="row">

                <table class="tab" CELLSPACING="15">
                    <tr>
                        <td class="g" id="hovs"><a href="{{ url('listproduct/cat/1') }}"><img src='./images/1.png'  style=' height: 50px; width: 50px;' ><br>Phones</a></td>
                        <td class="e" id="hovs"><a href="{{ url('listproduct/cat/2') }}"><img src='./images/2.png'  style=' height: 50px; width: 50px;' ><br>Computers</a></td>
                        <td class="i" id="hovs"><a href="{{ url('listproduct/cat/3') }}"><img src='./images/3.png'  style=' height: 50px; width: 50px;' ><br>Clothes</a></td>
                        <td rowspan="3">
                            <div class="carousel-demo">
                                <ul rn-carousel  rn-carousel-controls rn-carousel-index="carouselIndex2" rn-carousel-auto-slide  rn-carousel-buffered class="carousel2">
                                    <li ng-repeat="slide in slides2 track by slide.id" ng-class="'id-' + slide.id">
                                        <div ng-style="{'background-image': 'url(' + slide.img + ')'}"  class="bgimage">

                                        </div>
                                    </li>
                                </ul>
                                <div rn-carousel-indicators ng-if="slides2.length > 1" slides="slides2" rn-carousel-index="carouselIndex2"></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="c" id="hovs"><a href="{{ url('listproduct/cat/4') }}"><img src='./images/4.png'  style=' height: 50px; width: 50px;' ><br>Shoes</a></td>
                        <td class="b" id="hovs"><a href="{{ url('listproduct/cat/5') }}"><img src='./images/5.png'  style=' height: 50px; width: 50px;' ><br>Real Property</a></td>
                        <td class="f" id="hovs"><a href="{{ url('listproduct/cat/6') }}"><img src='./images/6.png'  style=' height: 50px; width: 50px;' ><br>Vehicles</a></td>
                    </tr>
                    <tr>
                        <td class="d" id="hovs"><a href="{{ url('listproduct/cat/7') }}"><img src='./images/7.png'  style=' height: 50px; width: 50px;' ><br>Watches</a></td>
                        <td class="h" id="hovs"><a href="{{ url('listproduct/cat/8') }}"><img src='./images/8.png'  style=' height: 50px; width: 50px;' ><br>Appliances</a></td>
                        <td class="n" id="hovs"><a href="{{ url('listproduct/cat/9') }}"><img src='./images/9.png'  style=' height: 50px; width: 50px;' ><br>Others</a></td>
                    </tr>

                </table>


        </div>
        </div>
        </div>
        </div>

        <script src="{{ asset('/script/scrpt.js') }}"></script>
        <script src="{{ asset('/script/angular.js') }}"></script>

        <script src="{{ asset('/script/angular-carousel.min.js') }}"></script>
        <script src="{{ asset('/script/movement.js') }}"></script>

        </body>
        </html>


@endsection
