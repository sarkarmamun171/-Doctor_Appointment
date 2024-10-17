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
                        <form action="{{ route('appointment.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Appointment No</label>
                                <input type="text" class="form-control" name="appointment_no">
                            </div>
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
                            @foreach ($appointments as $sl=>$appointment)
                            <tr>
                                <td>{{ $sl+1 }}</td>
                                <td>{{ $appointment->appointment_date }}</td>
                                <td>{{ $appointment->rel_to_doctor->name }}</td>
                                <td>{{ $appointment->fee }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="#" class="btn btn-danger shadow btn-xs sharp "><i class="fa fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        <div class="col-lg-12">
                            <form action="{{ route('store.patient') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-label">Patient Name</label>
                                    <input type="text" class="form-control" name="patient_name">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Patient Phone</label>
                                    <input type="number" class="form-control" name="patient_phone">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Total Fee</label>
                                    <input type="text" class="form-control" name="total_fee">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Paid Amount</label>
                                    <input type="text" class="form-control" name="paid_amount">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://kit.fontawesome.com/56a6d796f4.js" crossorigin="anonymous"></script>
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
        <script>
            document.getElementById('doctor').addEventListener('change', function() {
                const selectedDoctor = this.options[this.selectedIndex];
                const fee = selectedDoctor.getAttribute('data-fee');
                document.getElementById('total_fee').value = fee;
            });

            document.querySelector('form').addEventListener('submit', function(event) {
                const paidAmount = parseFloat(document.getElementById('paid_amount').value);
                const totalFee = parseFloat(document.getElementById('total_fee').value);

                if (paidAmount !== totalFee) {
                    event.preventDefault();
                    alert('Paid Amount must be equal to Total Fee');
                }
            });
        </script>
</body>

</html>
