<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Document')</title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>

@guest

    @include('online_library.layouts.blocks.nav.index')

@endguest

@auth

    @if (auth()->user()->is_admin == '1')

        @include('online_library.layouts.admin.blocks.nav.index')

    @elseif (auth()->user()->is_admin == '0')

        @include('online_library.layouts.blocks.nav.index')

    @endif

@endauth

@yield('content')

@include('online_library.layouts.blocks.footer.index')

<script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>