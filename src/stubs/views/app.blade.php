<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    <script src="{{ mix('/js/manifest.js') }}" defer></script>
    <script src="{{ mix('/js/vendor.js') }}" defer></script>
    <script src="{{ mix('/js/app.js') }}" defer></script>
    <meta name="turbolinks-cache-control" content="no-cache">
    <title>Laravel</title>
</head>
<body>
    <div id="app" data-component="{{ $name }}" data-props="{{ json_encode($data) }}"></div>
</body>
</html>