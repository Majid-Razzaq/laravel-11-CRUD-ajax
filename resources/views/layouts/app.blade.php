<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 11 CRUD Ajax</title>

	<!-- # Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!-- # CSS Plugins -->
	<link rel="stylesheet" href="{{ asset('front/plugins/slick/slick.css') }} ">
	<link rel="stylesheet" href="{{ asset('front/plugins/font-awesome/fontawesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('front/plugins/font-awesome/brands.css') }} ">
	<link rel="stylesheet" href="{{ asset('front/plugins/font-awesome/solid.css') }} ">

	<!-- # Main Style Sheet -->
	<link rel="stylesheet" href="{{ asset('front/css/style.css') }}">

</head>
<body>
    

    @yield('content')

    <!-- # JS Plugins -->
    <script src="{{ asset('front/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('front/plugins/bootstrap/bootstrap.min.js') }}"></script>

    <!-- Main Script -->
    <script src="{{ asset('front/js/script.js') }}"></script>

    @yield('script')
</body>
</html>