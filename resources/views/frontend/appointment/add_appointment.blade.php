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
                                <select name="doctor_id" id="doctor" class="form-control">
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
                    <div class="col-lg-6">
                        <table class="table table-bordered">
                            <tr>
                                <th>SL</th>
                                <th>App Date</th>
                                <th>Doctor Name</th>
                                <th>Fee</th>
                                <th>Action</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>1/04/055</td>
                                <td>Mamun</td>
                                <td>400</td>
                                <td>Delete</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('forntend/front.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('#department').change(function() {
                    var departmentId = $(this).val();

                    if (departmentId) {
                        $.ajax({
                            url: '/get-doctors',
                            type: 'POST',
                            data: {
                                department_id: departmentId,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(data) {
                                $('#doctor').empty().append('<option value="">Select Doctor</option>');
                                $.each(data, function(key, doctor) {
                                    $('#doctor').append('<option value="' + doctor.id + '">' + doctor.name + '</option>');
                                });
                            }
                        });
                    }
                });

                $('#doctor').change(function() {
                    var doctorId = $(this).val();

                    if (doctorId) {
                        $.ajax({
                            url: '/get-doctor-info',
                            type: 'POST',
                            data: {
                                doctor_id: doctorId,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(data) {
                                $('#fee').val(data.fee);
                                $('#availability-message').text(data.message);

                                if (!data.isAvailable) {
                                    $('#addButton').hide();
                                } else {
                                    $('#addButton').show();
                                }
                            }
                        });
                    }
                });
            });
        </script>
</body>

</html>
