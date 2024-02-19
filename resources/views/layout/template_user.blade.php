<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>AI.Tech - Artificial Intelligence HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Ubuntu:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assetsus/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsus/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assetsus/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assetsus/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assetsus/css2/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsus/vendors/themify-icons/themify-icons.css') }}" />
		<link rel="stylesheet" href="{{ asset('assetsus/vendors/linericon/style.css') }}" />
		<link rel="stylesheet" href="{{ asset('assetsus/vendors/nice-select/nice-select.css') }}" />
		<link rel="stylesheet" href="{{ asset('assetsus/vendors/owl-carousel/owl.theme.default.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('assetsus/vendors/owl-carousel/owl.carousel.min.css') }}" />
</head>

<body>
    @include('partial.navbar')
    @yield('content')

    @include('partial.footer')    

    @yield('script')


    
</body>

</html>