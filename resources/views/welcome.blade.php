<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.11.3/af-2.3.7/b-2.0.1/b-colvis-2.0.1/b-html5-2.0.1/date-1.1.1/fc-4.0.1/fh-3.2.0/r-2.2.9/sc-2.0.5/sb-1.3.0/sp-1.4.0/datatables.min.css"/>
        <title>Laravel</title>

    </head>
    <body class="antialiased">
       <div id="app">
{{--           <router-link to="/">Home</router-link>--}}
           <router-link to="/products">Products</router-link>
           <router-link to="/quote">Quote</router-link>
           <hr>
           <router-view></router-view>



       </div>


       <script src="../js/app.js"></script>

    </body>
</html>
