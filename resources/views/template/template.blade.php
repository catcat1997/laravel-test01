<html>
    <head>
        <title>App Name - @yield('title')</title>
    </head>
    
    <body>
        @section('sidebar')
            This is template sidebar.
        @show
        <!-- show 在定義的同時 立即 yield 這個片段endsectopn + yield。 -->
        <h1>after section(sidebar) and show(endsection + yield)</h1>
        <div class="container">
            @yield('content')
        </div>
    </body>
    <hr>
</html>


