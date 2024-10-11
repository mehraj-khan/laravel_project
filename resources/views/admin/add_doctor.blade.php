<!DOCTYPE html>
<html lang="en">

<head>
 @include('admin.csss')
</head>
<style>
    .form-box {
  max-width: 500px;
  margin: auto;
  padding: 50px;
  background: #ffffff;
  border: 10px solid #f2f2f2;
}

h1, p {
  text-align: center;
}

input, textarea {
  width: 100%;
}
</style>

<body class="g-sidenav-show  bg-gray-200">

  @include('admin.aside')
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    @include('admin.navbar')
    <!-- End Navbar -->
    {{-- <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg "> --}}
        <div class="container-fluid py-4">
           <div class="container align-center" style="align-items: center">
            <div class="form-box">
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <strong> {{ $message }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                </div>
                @endif
                <h1>Doctor  Form</h1>
                <p>Fill this form completely</p>
                <form action="{{ url('upload_doctor') }}" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="form-group">
                    <label for="name">Full Name</label>
                    <input class="form-control border" value="{{old('name') }}" placeholder="Entr your full name" id="name" type="text" name="name" >
                    @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                    <br>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control border"value="{{old('email') }}" placeholder="Eter your Email" id="email" type="email" name="email" >
                    @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                    <br>
                  </div>
                  <div class="form-group">
                    <label for="Phone">Phone</label>
                    <input class="form-control border" placeholder="Eter your phone" value="{{old('phone') }}" id="Phone" type="text" name="phone" >
                    @if ($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
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
                  <!-- <div class="form-group">

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
                  </div> -->
                  <div class="form-group">
                    <label for="Phone">location</label>
                    <input class="form-control border" placeholder="Eter your location" value="{{old('location') }}" id="location" type="text" name="location" >
                    @if ($errors->has('location'))
                    <span class="text-danger">{{ $errors->first('location') }}</span>
                    @endif
                    <br>
                  </div>
                  <div class="form-group">
                    <label for="Speciality">Speciality</label>
                    <input class="form-control border" placeholder="Eter your Speciality" value="{{old('speciality') }}" id="Speciality" type="text " name="speciality" >
                    @if ($errors->has('speciality'))
                    <span class="text-danger">{{ $errors->first('speciality') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="Speciality">Description</label>
                    {{-- <input class="form-control border" placeholder="Eter description" value="{{old('description') }}" id="description" type="text " name="description" > --}}
                    <textarea name="description" id="description" value="{{old('description') }}" cols="50" rows="4"></textarea>
                    @if ($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                  </div>
                  
                  <div class="form-group">
                    <label for="Image">Image</label>
                    <input class="form-control border" id="Image" type="file" value="{{old('Image') }}" name="Image" >
                    @if ($errors->has('Image'))
                    <span class="text-danger">{{ $errors->first('Image') }}</span>
                    @endif
                    <br>
                  </div>
                  <input class="btn btn-primary" type="submit" value="Submit" />
                  </div>
                </form>
              </div>

           </div>
   </div>
{{-- </main> --}}
  <!--   Core JS Files   -->
 @include('admin.script')

 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>
