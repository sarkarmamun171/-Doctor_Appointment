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
        <div class="section" id="doctor">
            <span class="section-span">Doctor List</span>
            <header id="header">
                <a href="#" class="logo">Appointment</a>
                <div class="menu">
                    <a href="{{ route('index') }}" class="active" onclick="closeMenu()">Home</a>
                    <a href="{{ route('doctor.list') }}" onclick="closeMenu()">Doctor</a>
                    <a href="{{ route('add.appointment') }}" onclick="closeMenu()">Appointment</a>
                    <i class="fa fa-times close-menu" onclick="closeMenu()"></i>
                </div>
            </header>
        </div>
        <section>
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h3>Doctor List</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>SL</th>
                                <th>Department Name</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Fee(TK)</th>
                            </tr>
                            @foreach ($doctors as $sl=>$doctor)
                            <tr>
                                <td>{{ $doctors->firstitem()+$sl}}</td>
                                <td>{{ $doctor->rel_to_department->name }}</td>
                                <td>{{ $doctor->name }}</td>
                                <td>{{ $doctor->phone }}</td>
                                <td>{{ $doctor->fee }}</td>
                            </tr>
                            @endforeach
                        </table>
                        {{ $doctors->links() }}
                    </div>
                </div>
            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('forntend/front.js') }}"></script>
</body>

</html>
