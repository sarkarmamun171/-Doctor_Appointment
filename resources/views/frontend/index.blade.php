<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('forntend/front.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Appointment</title>

</head>

<body>
    <div class="wrapper">
        <div class="section" id="home">
            <span class="section-span">Home</span>
            <header id="header">
                <a href="#" class="logo">Appointment</a>
                <div class="menu">
                    <a href="{{ route('index') }}" class="active" onclick="closeMenu()">Home</a>
                    <a href="{{ route('doctor.list') }}" onclick="closeMenu()">Doctor</a>
                    <a href="#" onclick="closeMenu()">Appointment</a>
                    <i class="fa fa-times close-menu" onclick="closeMenu()"></i>
                </div>
            </header>
        </div>
        <div class="section" id="aboutme"><span class="section-span">Doctor</span></div>
        <div class="section" id="service"><span class="section-span">Appointment</span></div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('forntend/front.js') }}"></script>
</body>

</html>
