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
    <title>MicroAutumn admin login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Muhammad Usman">

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


    <!-- 加载Traceur编译器 -->
    <script src="http://google.github.io/traceur-compiler/bin/traceur.js" type="text/javascript"></script>
    <!-- 将Traceur编译器用于网页 -->
    <script src="http://google.github.io/traceur-compiler/src/bootstrap.js" type="text/javascript"></script>

    <script>
        //traceur.options.experimental = true;
    </script>

    <script type="module" src="/node_modules/angular2/es6/prod/angular2.js"></script>

    <!-- The fav icon -->
    <link rel="shortcut icon" href="/img/favicon.ico">
    <style>
        .padding-none{
            padding: 0 !important;
        }
        .padding{
            padding: 0 15px !important;
        }
        .margin-top-none{
            margin-top: 0 !important;
        }
    </style>
</head>

<body>
<div class="ch-container padding">
    <div class="row">
        <div class="box col-md-12 margin-top-none padding-none">
            <div class="box-inner homepage-box">
                <!--<div class="box-header well">
                    <h2><i class="glyphicon glyphicon-th"></i> Tabs</h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>-->
                <div class="box-content">
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active"><a href="#info">信誉查询</a></li>
                        <li class=""><a href="#community">小区查询</a></li>
                        <li class=""><a href="#order">放单信息</a></li>
                        <li class=""><a href="#zipCode">邮编查询</a></li>
                        <li class=""><a href="#releaseNeed">放单要求</a></li>
                    </ul>

                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane active" id="info">
                            <h3>Charisma
                                <small>a full featured template</small>
                            </h3>
                            <p>It's a full featured, responsive template for your admin panel. It's optimized for tablets
                                and mobile phones.</p>

                            <p>Check how it looks on different devices:</p>
                            <a href="http://www.responsinator.com/?url=usman.it%2Fthemes%2Fcharisma" target="_blank"><strong>Preview on iPhone size.</strong></a>
                            <br>
                            <a href="http://www.responsinator.com/?url=usman.it%2Fthemes%2Fcharisma" target="_blank"><strong>Preview on iPad size.</strong></a>
                        </div>
                        <div class="tab-pane" id="community">
                            <h3>community
                                <small>small text</small>
                            </h3>
                            <p>Sample paragraph.</p>

                            <p>Your custom text.</p>
                        </div>
                        <div class="tab-pane" id="order">
                            <table class="table table-striped table-bordered responsive" style="margin-top: 5px">
                                <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Date registered</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Muhammad Usman</td>
                                    <td class="center">2012/03/01</td>
                                    <td class="center">Member</td>
                                    <td class="center">
                                        <span class="label-warning label label-default">Pending</span>
                                    </td>
                                    <td class="center">
                                        <a class="btn btn-success btn-sm" href="#">
                                            <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm" href="#">
                                            <i class="glyphicon glyphicon-edit icon-white"></i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="#">
                                            <i class="glyphicon glyphicon-trash icon-white"></i>
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Abraham</td>
                                    <td class="center">2012/03/01</td>
                                    <td class="center">Member</td>
                                    <td class="center">
                                        <span class="label-warning label label-default">Pending</span>
                                    </td>
                                    <td class="center">
                                        <a class="btn btn-success btn-sm" href="#">
                                            <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm" href="#">
                                            <i class="glyphicon glyphicon-edit icon-white"></i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="#">
                                            <i class="glyphicon glyphicon-trash icon-white"></i>
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Brown Blue</td>
                                    <td class="center">2012/03/01</td>
                                    <td class="center">Member</td>
                                    <td class="center">
                                        <span class="label-warning label label-default">Pending</span>
                                    </td>
                                    <td class="center">
                                        <a class="btn btn-success btn-sm" href="#">
                                            <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm" href="#">
                                            <i class="glyphicon glyphicon-edit icon-white"></i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="#">
                                            <i class="glyphicon glyphicon-trash icon-white"></i>
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Worth Name</td>
                                    <td class="center">2012/03/01</td>
                                    <td class="center">Member</td>
                                    <td class="center">
                                        <span class="label-warning label label-default">Pending</span>
                                    </td>
                                    <td class="center">
                                        <a class="btn btn-success btn-sm" href="#">
                                            <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm" href="#">
                                            <i class="glyphicon glyphicon-edit icon-white"></i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="#">
                                            <i class="glyphicon glyphicon-trash icon-white"></i>
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="zipCode">
                            <h3>zipCode
                                <small>small text</small>
                            </h3>
                            <p>Sample paragraph.</p>

                            <p>Your custom text.</p>
                        </div>
                        <div class="tab-pane" id="releaseNeed">
                            <h3>releaseNeed
                                <small>small text</small>
                            </h3>
                            <p>Sample paragraph.</p>

                            <p>Your custom text.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/span-->
</div><!--/fluid-row-->

</div><!--/.fluid-container-->

<!-- external javascript -->

<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- library for cookie management -->
<script src="/js/jquery.cookie.js"></script>
<!-- calender plugin -->
<script src='/bower_components/moment/min/moment.min.js'></script>
<script src='/bower_components/fullcalendar/dist/fullcalendar.min.js'></script>
<!-- data table plugin -->
<script src='/js/jquery.dataTables.min.js'></script>

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
<!-- application script for Charisma demo -->
<script src="/js/charisma.js"></script>


</body>
</html>
