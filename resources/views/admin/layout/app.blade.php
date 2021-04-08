<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Path Admin Panel</title>

    <!-- Bootstrap framework -->
    <link rel="stylesheet" href="{{asset('admin/bootstrap/css/bootstrap.min.css')}}" />
    <!-- jQuery UI theme -->
    <link rel="stylesheet" href="{{asset('admin/lib/jquery-ui/css/Aristo/Aristo.css')}}" />
    <!-- tooltips-->
    <link rel="stylesheet" href="{{asset('admin/lib/jBreadcrumbs/css/BreadCrumb.css')}}" />
    <!-- tooltips-->
    <link rel="stylesheet" href="{{asset('admin/lib/qtip2/jquery.qtip.min.css')}}" />
    <!-- colorbox -->
    <link rel="stylesheet" href="{{asset('admin/lib/colorbox/colorbox.css')}}" />
    <!-- code prettify -->
    <link rel="stylesheet" href="{{asset('admin/lib/google-code-prettify/prettify.css')}}" />
    <!-- sticky notifications -->
    <link rel="stylesheet" href="{{asset('admin/lib/sticky/sticky.css')}}" />
    <!-- aditional icons -->
    <link rel="stylesheet" href="{{asset('admin/img/splashy/splashy.css')}}" />
    <!-- flags -->
    <link rel="stylesheet" href="{{asset('admin/img/flags/flags.css')}}" />
    <!-- datatables -->
    <link rel="stylesheet" href="{{asset('admin/lib/datatables/extras/TableTools/media/css/TableTools.css')}}">

    <!-- calendar -->
    <link rel="stylesheet" href="{{asset('admin/lib/fullcalendar/fullcalendar_gebo.css')}}" />

    <!-- main styles -->
    <link rel="stylesheet" href="{{asset('admin/css/style.css')}}" />
    <!-- theme color-->
    <link rel="stylesheet" href="{{asset('admin/css/blue.css')}}" id="link_theme" />

    <!-- <link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>-->

    <!-- favicon -->
    <link rel="shortcut icon" href="{{asset('admin/favicon.ico')}}" />

<!--[if lte IE 8]>
            <link rel="stylesheet" href="{{asset('admin/css/ie.css')}}" />
        <![endif]-->

<!--[if lt IE 9]>
			<script src="{{asset('admin/js/ie/html5.js')}}"></script>
			<script src="{{asset('admin/js/ie/respond.min.js')}}"></script>
			<script src="{{asset('admin/lib/flot/excanvas.min.js')}}"></script>
        <![endif]-->

</head>
    @yield('content')
</html>
