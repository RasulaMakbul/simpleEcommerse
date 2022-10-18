<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>{{ $title }}</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />



    <!-- Bootstrap core CSS -->
    <link href="{{asset('assets')}}/css/bootstrap.min.css" rel="stylesheet">



    <!-- Custom styles for this template -->
    <link href="{{asset('assets')}}/css/carousel.css" rel="stylesheet">
    <link href="{{asset('assets')}}/css/style.css" rel="stylesheet">
</head>

<body>


    <x-audience.partials.header />
    <main>

        {{ $slot }}

    </main>
    <x-audience.partials.footer />


    <script src="{{asset('assets')}}/js/bootstrap.bundle.min.js"></script>


</body>

</html>