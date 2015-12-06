<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        ===
        This comment should NOT be removed.

        Charisma v2.0.0

        Copyright 2012-2014 Muhammad Usman
        Licensed under the Apache License v2.0
        http://www.apache.org/licenses/LICENSE-2.0

        http://usman.it
        http://twitter.com/halalit_usman
        ===
    -->
    <meta charset="utf-8">
    <title>实用红包工具</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Xiaoqiu">

    <!-- The styles -->
    <link id="bs-css" href="/css/bootstrap-cerulean.min.css" rel="stylesheet">

    <link href="/css/charisma-app.css" rel="stylesheet">
    <link href='/bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='/bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='/bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='/bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='/bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='/bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='/css/jquery.noty.css' rel='stylesheet'>
    <link href='/css/noty_theme_default.css' rel='stylesheet'>
    <link href='/css/elfinder.min.css' rel='stylesheet'>
    <link href='/css/elfinder.theme.css' rel='stylesheet'>
    <link href='/css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='/css/uploadify.css' rel='stylesheet'>
    <link href='/css/animate.min.css' rel='stylesheet'>

    <!-- jQuery -->
    <script src="/bower_components/jquery/jquery.min.js"></script>

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="/img/favicon.ico">
    <script src="//libs.useso.com/js/angular.js/1.0.1/angular.min.js"></script>
    <script class=""></script>

</head>

<body ng-app>

    <div style="width:500px;margin: 30px auto 0 auto">
        <form ng-controller="grabController">
            <div class="row">
                <label for="phone"></label>
                <input type="text" class="form-control" id="phone" ng-model="phone" placeholder="请输入手机号"/>
            </div>
            <div class="row">
                <label for="urls"></label>
                <textarea ng-model="urls" class="form-control" id="urls" placeholder="请输入要领取红包的地址" style="min-height:100px"></textarea>
            </div>
            <div class="row" style="margin-top: 10px; text-align: center">
                <button class="btn btn-primary" ng-click="grab()">领取</button>
            </div>
            <div class="row">
                <div ng-repeat="item in result">
                    {{item.message}} ,  {{item.data.rewardAmount}}元
                </div>
            </div>
        </form>
    </div>

<script>
    function grabController($scope,$http){
        console.log($scope.urls);
        $scope.result = [];
        $scope.grab = function(){
            if($scope.urls && $scope.phone){
                //console.log($scope.urls);
                var urls = $scope.urls.split('\n');
                //console.log(urls);
                localStorage.setItem('phone', $scope.phone);
                var count = urls.length;
                var n = 0;
                for(var i = 0; i < count; i++){
                    $http.post('/tool/longdai/redbag', {url: urls[i], phone: $scope.phone}).success(function(data){
                        n++;
                        try{
                            data.forEach(function(item){
                                $scope.result.push(item);
                            });
                        }catch(e){
                            console.log(e);
                            n++
                        }
                        if(n == count){
                            alert("领取完成");
                        }
                        /*console.log(data);
                        try{
                            var res = JSON.parse(data);
                            $scope.result.push(res);
                        }catch(e){
                            console.log(e);
                        }*/
                    });
                }
            }
        };
        $scope.phone = localStorage.getItem('phone');
    }
</script>

<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- library for cookie management -->
<script src="/js/jquery.cookie.js"></script>
<!-- calender plugin -->
<script src='/bower_components/moment/min/moment.min.js'></script>
<script src='/bower_components/fullcalendar/dist/fullcalendar.min.js'></script>
<!-- data table plugin -->

<!-- select or dropdown enhancer -->
<script src="/bower_components/chosen/chosen.jquery.min.js"></script>
<!-- plugin for gallery image view -->
<script src="/bower_components/colorbox/jquery.colorbox-min.js"></script>
<!-- notification plugin -->
<script src="/js/jquery.noty.js"></script>
<!-- library for making tables responsive -->
<script src="/bower_components/responsive-tables/responsive-tables.js"></script>
<!-- tour plugin -->
<script src="/bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
<!-- star rating plugin -->
<script src="/js/jquery.raty.min.js"></script>
<!-- for iOS style toggle switch -->
<script src="/js/jquery.iphone.toggle.js"></script>
<!-- autogrowing textarea plugin -->
<script src="/js/jquery.autogrow-textarea.js"></script>
<!-- multiple file upload plugin -->
<script src="/js/jquery.uploadify-3.1.min.js"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="/js/jquery.history.js"></script>


</body>
</html>
