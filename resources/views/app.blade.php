<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> <!-- class="dark" -->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Realestate</title>
        <!-- Directive from ziggy library to add routes -->
        @routes
        <!-- To load the site assets (CSS and JS), and will also contain a root <div> in which to boot the JS app.-->
        @inertia
        @vite('resources/js/app.js')
        @inertiaHead

    </head>
    <body class="bg-white dark:bg-slate-800 text-gray-800 dark:text-gray-300">
    </body>
</html>
