<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
         @vite('resources/css/app.css')
         @vite('resources/js/app.js')
    </head>
    <body>
        <div id="app"></div>
    </body>
</html>
