<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{{mix('css/app.css')}}">

    <style>
        #app {
            margin: 2em;
        }

        #app h1 {
            text-align: center;
        }
    </style>

    <script>
        window.locale = 'sl';
        window.translations = {!! cache('translations') !!};
    </script>
</head>
<body>
<div class="container-fluid ">
    <div id="app">
        <kpi></kpi>
    </div>


</div>

<script src="{{mix('js/app.js')}}"></script>


</body>
</html>
