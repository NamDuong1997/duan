<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Startmin - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
   
    <link href={{ asset('../css/bootstrap.min.css') }} rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href={{ asset('../css/metisMenu.min.css') }} rel="stylesheet">

    <!-- Timeline CSS -->
    <link href={{ asset('../css/timeline.css') }} rel="stylesheet">

    <!-- Custom CSS -->
    <link href={{ asset('../css/startmin.css') }} rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href={{ asset('../css/morris.css') }} rel="stylesheet">

    <!-- Custom Fonts -->
    <link href={{ asset('../css/font-awesome.min.css') }} rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src={{ asset('https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js') }}></script>
        <script src={{ asset('https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js') }}></script>
        <![endif]-->
    
    <!-- /Bootstrap5 cdn -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}

    <!-- /# CSS FOR CKEDITOR -->
    <link rel="stylesheet" href={{ asset('../../assets/vendor/ckeditor5.css') }}>

    @stack('CSS');
    
</head>

<body>
    <!-- /#page-wrapper -->
    <div id="wrapper">
        @include('partials.header')
        <!-- Navigation -->
        @include('partials.nav')
        @yield('content')
    </div>
    <!-- /#wrapper -->

    <!-- /CKEDITOR -->
   
    <script type="importmap">
            {
                "imports": {
                    "ckeditor5": "../../assets/vendor/ckeditor5.js",
                    "ckeditor5/": "../../assets/vendor/"
                }
            }
    </script>
    {{-- // gọi file cài đặt ckeditor trong public/assets/vendor/custom-editor.js --}}
    <script type="module" src={{ asset('../../assets/vendor/custom-editor.js') }}>
    </script>
    <!-- /CKEDITOR -->

    <!-- jQuery -->
    <script src={{ asset('../js/jquery.min.js') }}></script>

    <!-- Bootstrap Core JavaScript -->
    <script src={{ asset('../js/bootstrap.min.js') }}></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src={{ asset('../js/metisMenu.min.js') }}></script>

    @stack('JS');

    <!-- Custom Theme JavaScript -->
    <script src={{ asset('../js/startmin.js') }}></script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script> --}}

</body>

</html>
