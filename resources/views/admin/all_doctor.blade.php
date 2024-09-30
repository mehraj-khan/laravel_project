

<!DOCTYPE html>
<html lang="en">

<head>
 @include('admin.csss')
</head>

<body class="g-sidenav-show  bg-gray-200">
  @include('admin.aside')
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    @include('admin.navbar')
    <!-- End Navbar -->
    <div class="align-self-center" style="padding: 70px; align-content: center ">
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">email</th>
                <th scope="col">phone</th>
                <th scope="col">Speciality</th>
                <th scope="col">Image</th>
                <th scope="col">Delete</th>
                <th scope="col">Update</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($all_doctor as $doctor)
              <tr>
                <th scope="row">{{ $doctor->id }}</th>
                <td>{{ $doctor->name }}</td>
                <td>{{ $doctor->email }}</td>
                <td>{{ $doctor->phone }}</td>
                <td>{{ $doctor->speciality }}</td>
                <td>
                    <img height="100px" width="100px" src="doctor_image/{{ $doctor->Image }}"  alt="">
                </td>
                <td><a href="{{ url('delete_doctor',$doctor->id ) }}" onclick="return confirm('are you sure to delete doctor')" class="btn btn-danger">Delete Doctor</a></td>
                <td><a href="{{ url('update_doctor',$doctor->id ) }}"  class="btn btn-warning">Update Doctor</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
  <!--   Core JS Files   -->
 @include('admin.script')
</body>

</html>
