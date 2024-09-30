<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Form Download</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">


    <link rel="stylesheet" href="css/ionicons.min.css">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- Bootstrap Datepicker CSS and JS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

</head>
<style>
    body {
        background: rgb(244, 244, 247);
        background: linear-gradient(90deg, rgb(99, 98, 104) 0%, rgba(9, 113, 121, 1) 35%, rgb(130, 149, 153) 100%);
    }

    .form-box {
        max-width: 800px;
        margin: auto;
        padding: 50px;
        background: rgb(104, 103, 128);
        background: linear-gradient(90deg, rgb(199, 197, 237) 0%, rgb(198, 222, 224) 35%, rgb(186, 215, 218) 54%, rgb(175, 214, 220) 59%, rgb(156, 227, 241) 100%);
        border: 10px solid #f2f2f2;
    }

    h1,
    p {
        text-align: center;
    }

    input,
    textarea {
        width: 100%;
    }
    .input-group-text {
    background-color: #fff;
    border: 1px solid #ced4da;
    cursor: pointer;
}

.input-group .form-control {
    border-right: 0;
}

.input-group .input-group-append .input-group-text {
    border-left: 0;
}
</style>

<body>
    <div class="container-fluid py-4">
        <div class="container align-center" style="align-items: center">
            <div class="form-box">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <strong> {{ $message }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>

                    </div>
                @endif
                <h1>Book an Appointment</h1>
                <p>Fill this form completely</p>

                <form action="{{ url('book_appoinment') }}" method="post" >
                    @csrf
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input class="form-control border" value="{{ old('name') }}" placeholder="Entr your full name"
                            id="name" type="text" name="name">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                        <br>
                    </div>
                    <div class="form-group">
                        <label for="Phone">Phone</label>
                        <input class="form-control border" placeholder="Eter your phone" value="{{ old('phone') }}"
                            id="Phone" type="text" name="phone">
                        @if ($errors->has('phone'))
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                        @endif
                        <br>
                    </div>
                    <div class="form-group ">
                        <label for="select_doctor" class="form-label">Select Doctor Appointment </label>
                        <select class="form-select" id="select_doctor" value="{{ old('select_doctor') }}" name="select_doctor">
                            <option value="" disabled selected>Select Doctor</option>
                            @foreach ($doctor as $doc)
                                <option value="{{ $doc->name }}"{{ old('select_doctor') == $doc->name ? 'selected' : '' }}
                                    class="form-control w-50">
                                    {{ $doc->name }}---speciality-----{{ $doc->speciality }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('select_doctor'))
                            <span class="text-danger">{{ $errors->first('select_doctor') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <select id="gender" class="form-control" name="gender">
                            <option value="" disabled selected>Select Gender</option>
                            <option value="male {{ old('gender') }}">Male</option>
                            <option value="female {{ old('gender') }}">Female</option>
                        </select>
                        @if ($errors->has('gender'))
                            <span class="text-danger">{{ $errors->first('gender') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                    <label for="date">Select a date:</label>
                    <div class="input-group date" id="datepicker">
                        <input type="text" placeholder="Select a date" class="form-control" name="date">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="ion-md-calendar"></i>
                            </span>
                        </div>
                    </div>

                    @if ($errors->has('date'))
                    <span class="text-danger">{{ $errors->first('date') }}</span>
                @endif
                    </div>

                    <input class="btn btn-primary" type="submit" value="Submit" />
            </div>
            </form>

        </div>

        <script>
            $(function() {
                $("#datepicker").datepicker({
                    dateFormat: "yy-mm-dd", // Format for the selected date
                    startDate: new Date(), // Prevent selecting past dates
                    autoclose: true
                });
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
