

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
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Doctor</th>
                <th scope="col">Gender</th>
                <th scope="col">Date</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($show_appointment as $appoint)


              <tr>
                {{-- <th scope="row">1</th> --}}
                <td>{{ $appoint->name }}</td>
                <td>{{ $appoint->phone }}</td>
                <td>{{ $appoint->select_doctor }}</td>
                <td>{{ $appoint->gender }}</td>
                <td>{{ $appoint->date }}</td>
                <td><a href="{{ url('delete_appointment',$appoint->id ) }}" onclick="return confirm('are you sure to delete this')" class="btn btn-danger">Delete Appointment</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
  <!--   Core JS Files   -->
 @include('admin.script')
</body>

</html>
