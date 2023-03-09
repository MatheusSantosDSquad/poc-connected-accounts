<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title>App Name - @yield('title')</title>
        @vite(['resources/css/app.css'])
    </head>
    <body>
        <div class="max-w-7xl mx-auto h-full py-8">
            {{ $slot }}
        </div>
    </body>
</html>
