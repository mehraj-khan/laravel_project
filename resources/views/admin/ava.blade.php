<!-- <!DOCTYPE html>
<html lang="en">

<head>
 @include('admin.csss')
</head>

<body class="g-sidenav-show  bg-gray-200">

  @include('admin.aside')
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    Navbar 
    @include('admin.navbar')
    <div class="container">

<form action="{{ route('ava_store') }}" method="POST">
    @csrf
    
    
    <div class="form-group">

                    <div class="form-control border">
                        <label for="availability_days">Select Availability Days:</label><br>

                        <label>
                            <input type="checkbox" name="availability_days[]" value="Monday"
                            {{ in_array('Monday', old('availability_days', [])) ? 'checked' : '' }}> Monday
                        </label><br>

                        <label>
                            <input type="checkbox" name="availability_days[]" value="Tuesday"
                            {{ in_array('Tuesday', old('availability_days', [])) ? 'checked' : '' }}> Tuesday
                        </label><br>

                        <label>
                            <input type="checkbox" name="availability_days[]" value="Wednesday"
                            {{ in_array('Wednesday', old('availability_days', [])) ? 'checked' : '' }}> Wednesday
                        </label><br>

                        <label>
                            <input type="checkbox" name="availability_days[]" value="Thursday"
                            {{ in_array('Thursday', old('availability_days', [])) ? 'checked' : '' }}> Thursday
                        </label><br>

                        <label>
                            <input type="checkbox" name="availability_days[]" value="Friday"
                            {{ in_array('Friday', old('availability_days', [])) ? 'checked' : '' }}> Friday
                        </label><br>

                        <label>
                            <input type="checkbox" name="availability_days[]" value="Saturday"
                            {{ in_array('Saturday', old('availability_days', [])) ? 'checked' : '' }}> Saturday
                        </label><br>

                        <label>
                            <input type="checkbox" name="availability_days[]" value="Sunday"
                            {{ in_array('Sunday', old('availability_days', [])) ? 'checked' : '' }}> Sunday
                        </label><br>
                    </div>


                    
                    @if ($errors->has('availability_days'))
                    <span class="text-danger">{{ $errors->first('availability_days') }}</span>
                    @endif
                    <br>
                  </div>
    <div class="form-group">
                    <label for="start_time">start_time</label>
                    <input class="form-control border" placeholder="Eter your start_time" value="{{old('start_time') }}" id="start_time" type="time" name="start_time" >
                    @if ($errors->has('start_time'))
                    <span class="text-danger">{{ $errors->first('start_time') }}</span>
                    @endif
                  </div>
    
                  <div class="form-group">
                    <label for="end_time">end_time</label>
                    <input class="form-control border" placeholder="Eter your end_time" value="{{old('end_time') }}" id="end_time" type="time" name="end_time" >
                    @if ($errors->has('end_time'))
                    <span class="text-danger">{{ $errors->first('end_time') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="location">location</label>
                    <input class="form-control border" placeholder="Eter your location" value="{{old('location') }}" id="location" type="text" name="location" >
                    @if ($errors->has('location'))
                    <span class="text-danger">{{ $errors->first('location') }}</span>
                    @endif
                    <br>
                  </div>
                    <input type="submit" class="btn btn-primary" value="submit">
    

</form>
</div>
 -->
<!-- 
 <form action="{{ url('ava_store') }}" method="post">
 @csrf 
    <label for="doctor">Select Doctor:</label>
    <select name="doctor_id" id="doctor" required>
        @foreach($doctors as $doctor)
            <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
        @endforeach
    </select>

    <!-- <label for="type">Select Availability Type:</label>
    <select name="type" id="type" required>
        <option value="day">Day</option>
        <option value="week">Week</option>
        <option value="month">Month</option>
    </select> -->

    <label for="days">Select Available a:</label><br>
    <input type="checkbox" name="days[]" value="Monday"> Monday<br>
    <input type="checkbox" name="days[]" value="Tuesday"> Tuesday<br>
    <input type="checkbox" name="days[]" value="Wednesday"> Wednesday<br>
    <input type="checkbox" name="days[]" value="Thursday"> Thursday<br>
    <input type="checkbox" name="days[]" value="Friday"> Friday<br>
    <input type="checkbox" name="days[]" value="Saturday"> Saturday<br>
    <input type="checkbox" name="days[]" value="Sunday"> Sunday<br>

    <label for="date_from">From (optional):</label>
    <input type="time" name="end_time" id="end_time">

    <label for="date_to">To (optional):</label>
    <input type="time" name="end_time" id="end_time">

    <label for="location">(location):</label>
    <input type="text" name="location" id="location">

    <button type="submit">Update Availability</button>
</form>
 -->
