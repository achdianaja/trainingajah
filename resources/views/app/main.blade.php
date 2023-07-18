<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/vendor/fontawesome/css/all.min.css">
    @include('components.style.content')
    <title>Document</title>
</head>

<body>

    <div class="d-flex" id="wrapper">
        @include('components.sidebar')

        <div id="page-content-wrapper">
            @include('components.navbar')

            <div class="container-fluid">
                @yield('contents')
            </div>
        </div>

    </div>

    <script src="/js/bootstrap.min.js"></script>
  @include('components.script.content')
</body>
</html>