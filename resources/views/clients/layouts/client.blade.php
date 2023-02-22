<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>@yield('title')</title>
</head>
<body>
    <head>
        <h1>Header</h1>
    </head>
    <main>
        <aside>
            @section('sidebar')
            @include('blocks.sidebar') 
            @show
        </aside>
        <div class="container">
            @yield('content')
        </div>
        <div class="content">
            
        </div>
    </main>
    <footer>
        <h1>Footer</h1>
    </footer>
</body>
</html>