<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('forntend/front.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Appointment</title>
</head>

<body>
    <div class="wrapper">
        <div class="section" id="appointment">
            <span class="section-span">Appointment</span>
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
        <section id="appointment">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="" class="form-label">Appointment Date</label>
                                <input type="date" class="form-control" name="appointment_date">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Select Department</label>
                                <select name="department_id" id="department" class="form-control">
                                    <option value="">Select Department</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Select Doctor</label>
                                <select name="doctor_id" id="doctor_id" class="form-control">
                                    <option value="">Select Doctor</option>
                                    @foreach ($doctors as $doctor)
                                        <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Fee</label>
                                <input type="text" name="fee" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-info">Add</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6"></div>
                </div>
            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('forntend/front.js') }}"></script>
        <script>
            $('#department').change(function() {
                var department_id = $(this).val();
                alert(department_id);
            });
        </script>
</body>

</html>
