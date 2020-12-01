<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mondok</title>
    <!-- Custom styles for this template-->
  <link href="{{asset('admin/css/sb-admin-2.min.css')}}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center">
                <img src="{{ asset('landingpage/img/offline.png') }}" class="img-fluid" alt="">
                <h1>You are currently not connected to any networks.</h1>
                <p onclick="location.reload();">Click here to refresh</p>
            </div>
        </div>
    </div>
</body>
</html>