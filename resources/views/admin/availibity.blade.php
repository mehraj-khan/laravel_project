<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.csss')
  <style>
    /* General body styling */
    body {
      background-color: #f7f8fa;
    }

    /* Form container styling */
    .form-box {
      background-color: #ffffff;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
      margin-top: 30px;
      width: 100%;
      max-width: 600px;
      margin-left: auto;
      margin-right: auto;
    }

    /* Form header styling */
    .form-box h1 {
      font-size: 24px;
      font-weight: bold;
      text-align: center;
      margin-bottom: 10px;
      color: #E0296A;
    }

    .form-box p {
      text-align: center;
      color: #6c757d;
    }

    /* Input field styling */
    .form-box label {
      font-size: 16px;
      color: #5a5c69;
      font-weight: bold;
      display: block;
      margin-bottom: 5px;
    }

    .form-box input[type="text"],
    .form-box input[type="time"],
    .form-box select {
      width: 100%;
      padding: 10px;
      font-size: 14px;
      border-radius: 5px;
      border: 1px solid #ced4da;
      margin-bottom: 15px;
      outline: none;
    }

    /* Checkbox styling */
    .form-box input[type="checkbox"] {
      margin-right: 8px;
    }

    .form-box .form-check-label {
      margin-left: 5px;
      font-weight: normal;
    }

    /* Button styling */
    .form-box button[type="submit"] {
      /* background-color: #4e73df; */
      color: #fff;
      font-size: 16px;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      width: 100%;
    }

    .form-box button[type="submit"]:hover {
      background-color: #E0296A;
    }

    /* Success message styling */
    .alert {
      background-color: #28a745;
      color: #fff;
      padding: 15px;
      border-radius: 5px;
      margin-bottom: 15px;
    }

    .alert strong {
      color: #fff;
    }

    .alert .close {
      color: #fff;
    }

    /* Responsive design */
    @media (max-width: 768px) {
      .form-box {
        padding: 20px;
        width: 90%;
      }
    }
  </style>
</head>

<body class="g-sidenav-show bg-gray-200">
  @include('admin.aside')

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <!-- Navbar -->
    @include('admin.navbar')
    <!-- End Navbar -->

    <div class="container-fluid py-4">
      <div class="container align-center">
        <div class="form-box">
          @if ($message = Session::get('success'))
          <div class="alert alert-success alert-block">
            <strong> {{ $message }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
          <h1>Doctor Availability Form</h1>
          <p>Fill in this form completely</p>

          <form action="/avaibility_store" method="POST">
            @csrf
            <label for="doctor">Select Doctor:</label>
            <select name="doctor_id" id="doctor" required>
              @foreach($doctors as $doctor)
              <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
              @endforeach
            </select>

            <label for="days">Select Available Days:</label><br>
            <div class="form-check">
              <input type="checkbox" name="days[]" value="Monday"> Monday<br>
              <input type="checkbox" name="days[]" value="Tuesday"> Tuesday<br>
              <input type="checkbox" name="days[]" value="Wednesday"> Wednesday<br>
              <input type="checkbox" name="days[]" value="Thursday"> Thursday<br>
              <input type="checkbox" name="days[]" value="Friday"> Friday<br>
              <input type="checkbox" name="days[]" value="Saturday"> Saturday<br>
              <input type="checkbox" name="days[]" value="Sunday"> Sunday<br>
            </div>

            <div class="form-group">
              <label for="start_time">Start Time:</label>
              <input class="form-control border" placeholder="Enter start time" value="{{ old('start_time') }}" id="start_time" type="time" name="start_time">
              @if ($errors->has('start_time'))
              <span class="text-danger">{{ $errors->first('start_time') }}</span>
              @endif
            </div>

            <div class="form-group">
              <label for="end_time">End Time:</label>
              <input class="form-control border" placeholder="Enter end time" value="{{ old('end_time') }}" id="end_time" type="time" name="end_time">
              @if ($errors->has('end_time'))
              <span class="text-danger">{{ $errors->first('end_time') }}</span>
              @endif
            </div>

            <div class="form-group">
              <label for="location">Location:</label>
              <input class="form-control border" placeholder="Enter your location" value="{{ old('location') }}" id="location" type="text" name="location">
              @if ($errors->has('location'))
              <span class="text-danger">{{ $errors->first('location') }}</span>
              @endif
            </div>

            <button type="submit" class="btn btn-primary">Update Availability</button>
          </form>
        </div>
      </div>
    </div>

    <!-- Core JS Files -->
    @include('admin.script')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </main>
</body>

</html>
