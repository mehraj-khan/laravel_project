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
                    <label for="Speciality">Speciality</label>
                    <input class="form-control border" placeholder="Eter your Speciality" value="{{old('speciality') }}" id="Speciality" type="text " name="speciality" >
                    @if ($errors->has('speciality'))
                    <span class="text-danger">{{ $errors->first('speciality') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="password">password</label>
                    <input class="form-control border" placeholder="Eter your password" value="{{old('password') }}" id="password" type="text" name="password" >
                    @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
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
