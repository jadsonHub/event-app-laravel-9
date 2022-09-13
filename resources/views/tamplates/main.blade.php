<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/css/bootstrap.css' integrity='sha512-h1rwF0uB6r2IuEZcyjPrR53bBKN9Wb4yL+w3Rdlzmc3CkBF1gMSFvQIIstnu4bEtYDaKca5ke5S8UBAACRImyg==' crossorigin='anonymous' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.css' integrity='sha512-9nqhm3FWfB00id4NJpxK/wV1g9P2QfSsEPhSSpT+6qrESP6mpYbTfpC+Jvwe2XY27K5mLwwrqYuzqMGK5yC9/Q==' crossorigin='anonymous' />
    <link rel="stylesheet" href="{{ asset('/css/style.css')}}">
    <title>@yield('title')</title>
</head>

<header>
@yield('header')
</header>

<body>

    @yield('content')
        <!-- JS -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js' integrity='sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==' crossorigin='anonymous'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/js/bootstrap.js' integrity='sha512-39Q5Yw4jtWPVkYu5Dry3HiRh6DWG4FDODb/rHF+X2Xp0kzhg9VgTyYV209uQ/EsqPDP/4dDvwm1rb8JgnAkHNg==' crossorigin='anonymous'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/js/fontawesome.js' integrity='sha512-NmQxqRpJaq9f61/JnlDlAf8IHnz6DM9vtv6o+Kr9PNljJ91Tio2an1Btq0237RTE3rBa0tPY3UkzvLj5cnIs1w==' crossorigin='anonymous'></script>
<script src="{{ asset('/js/main.js') }}"></script>


</body>


<footer class="text-center text-lg-start text-white"
style="background-color: #8A2BE2">
    @include('tamplates.partial.footer')
</footer>


</html>