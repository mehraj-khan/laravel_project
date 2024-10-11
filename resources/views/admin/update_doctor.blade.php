

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
    <div class="text-end ">
        {{-- <a href="/products/index" type="button" class="btn btn-primary  mt-5">go to index</a> --}}
    </div>

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
                <p>Can you update Dr information</p>
            {{-- <div class="col-sm-10"> --}}
                {{-- <div class="card p-3"> --}}
                <form action="{{url('edit_doctor',$update->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control" value="{{old('name' , $update->name) }}" id="name" type="text"  name="name" placeholder="Enter your name">
                    @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                    <br>
                    </div>

                    <div class="form-group">
                    <label for="name">Email</label>
                    <input type="text" class="form-control" value="{{ old('email', $update->email) }}" id="email" type="text"  name="email" placeholder="email">
                    @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                    <br>
                </div>
                    <div class="form-group">
                    <label for="name">Phone</label>
                    <input type="text" class="form-control" value="{{ old('phone', $update->phone) }}" id="phone" type="text"   name="phone" placeholder="phone">
                    @if ($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                    @endif
                    <br>
                </div>
                    <div class="form-group">
                    <label for="name">Speciality</label>
                    <input type="text" class="form-control" value="{{ old('speciality', $update->speciality) }}" id="speciality" type="text"   name="speciality" placeholder="speciality">
                    @if ($errors->has('speciality'))
                    <span class="text-danger">{{ $errors->first('speciality') }}</span>
                    @endif
                    <br>
                </div>
                <div class="form-group">
                    <label for="name">location</label>
                    <input type="text" class="form-control" value="{{ old('location', $update->location) }}" id="location" type="text"   name="location" placeholder="location">
                    @if ($errors->has('location'))
                    <span class="text-danger">{{ $errors->first('location') }}</span>
                    @endif
                    <br>
                </div>
                <!-- <div class="form-group">
                    <label for="name">availability_days</label>
                    <input type="text" class="form-control" value="{{ old('locavailability_daysation', $update->availability_days) }}" id="availability_days" type="text"   name="availability_days" placeholder="availability_days">
                    @if ($errors->has('availability_days'))
                    <span class="text-danger">{{ $errors->first('availability_days') }}</span>
                    @endif
                    <br>
                </div> -->
                <div class="form-group">
                    {{-- <input type="text" class="form-control" value="{{ old('description', $update->description) }}" id="description" type="text"   name="description" placeholder="description"> --}}
                    <label for="name">Description</label>
                    <textarea name="description" id="description"  cols="30" rows="4" placeholder="description">{{ old('description', $update->description) }}</textarea>
                    @if ($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                    <br>
                    <div class="form-group">
                    <label for="name">Image</label>
                    <input type="file" value="{{ old('Image'),$update->Image }}" id="Image" type="text" class="form-control" name="Image">
                    @if ($errors->has('Image'))
                    <span class="text-danger">{{ $errors->first('Image') }}</span>
                    @endif
                    </div>
                    <br>
                    <input type="submit" value="Update" class="btn-btn-primary">
                </form>
            {{-- </div> --}}
            </div>
        </div>
    </div>
    </div>
  <!--   Core JS Files   -->
 @include('admin.script')
</body>

</html>
