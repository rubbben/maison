<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>La Maison</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('partials.menu')
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @yield('content')
        </div>
    </div>
</div>

<script src="{{asset('js/app.js')}}"></script>

</body>
</html>