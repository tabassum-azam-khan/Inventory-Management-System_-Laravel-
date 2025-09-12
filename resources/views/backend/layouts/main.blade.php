<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Dashboard" />
    <link rel="shortcut icon" href="{{url('backend/assets/images/favicon.svg')}}" />
    <!-- FontAwesome JS-->
    <script defer src="{{url('backend/assets/plugins/fontawesome/js/all.min.js')}}"></script>
    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="{{url('backend/assets/css/portal.css')}}"/>
</head>

<body class="app">
    <header class="app-header fixed-top">

        <!-------------- Top Nav --------------->
        @include('backend.layouts.nav')

        <!-------------- SidePanel --------------->
        @include('backend.layouts.sidepanel')
    </header>

    <!------------------------------- Body  -------------------------------->
    <main>
        @yield('content')
    </main>


    <!-- Javascript -->
    <script src="{{url('backend/assets/plugins/popper.min.js')}}"></script>
    <script src="{{url('backend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Charts JS -->
    <script src="{{url('backend/assets/plugins/chart.js/chart.min.js')}}"></script>
    <script src="{{url('backend/assets/js/index-charts.js')}}"></script>
    <!-- Page Specific JS -->
    <script src="{{url('backend/assets/js/app.js')}}"></script>
</body>
</html>
