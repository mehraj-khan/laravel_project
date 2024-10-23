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
<form action="{{ route('update_avaibility', $doctor->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Full Name</label>
        <input type="text" class="form-control" readonly value="{{ old('name', $doctor->name) }}" id="name" name="name" placeholder="Enter your name">
        @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
        <br>
    </div>

    @foreach($doctor->availabilities as $index => $availability)  <!-- Use $index to keep track -->
    @php
    // Decode the days JSON into an array
    $selected_days = json_decode($availability->days, true);
@endphp

<label for="days">Select Available Days:</label><br>

<!-- <div class="form-check">
    @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
        <input type="checkbox" name="days[{{ $index }}][]" value="{{ $day }}"
            @if(is_array(old('days.' . $index, $selected_days)) && in_array($day, old('days.' . $index, $selected_days)))
                checked
            @endif>
        {{ $day }}<br>
    @endforeach
</div> -->
<div class="form-check">
    @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
        <input type="checkbox" name="days[{{ $index }}][]" value="{{ $day }}"
            @if(is_array(old('days.' . $index)) && in_array($day, old('days.' . $index)))
                checked
            @elseif(is_array($selected_days) && in_array($day, $selected_days))
                checked
            @endif>
        {{ $day }}<br>
    @endforeach
</div>



        <div class="form-group">
            <label for="start_time">Start Time</label>
            <input type="text" class="form-control" value="{{ old('start_time.' . $index, $availability->start_time) }}" id="start_time" name="start_time[{{ $index }}]" placeholder="Start Time">
            @if ($errors->has('start_time.' . $index))
                <span class="text-danger">{{ $errors->first('start_time.' . $index) }}</span>
            @endif
            <br>
        </div>

        <div class="form-group">
            <label for="end_time">End Time</label>
            <input type="text" class="form-control" value="{{ old('end_time.' . $index, $availability->end_time) }}" id="end_time" name="end_time[{{ $index }}]" placeholder="End Time">
            @if ($errors->has('end_time.' . $index))
                <span class="text-danger">{{ $errors->first('end_time.' . $index) }}</span>
            @endif
            <br>
        </div>

        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" value="{{ old('location.' . $index, $availability->location) }}" id="location" name="location[{{ $index }}]" placeholder="Location">
            @if ($errors->has('location.' . $index))
                <span class="text-danger">{{ $errors->first('location.' . $index) }}</span>
            @endif
            <br>
        </div>
    @endforeach

    <input type="submit" value="Update" class="btn btn-primary">
</form>
</div>
      </div>
    </div>


@include('admin.script')

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </main>
</body>

</html>

