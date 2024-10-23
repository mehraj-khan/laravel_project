<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from technext.github.io/dentista/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Sep 2024 11:54:42 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
   @include('user.css')
  </head>
  <body>

    @include('user.navbar')
{{-- end navbar --}}
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
        @foreach ($appoint as $appoint)

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
   

@include('user.js')
  </body>

<!-- Mirrored from technext.github.io/dentista/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Sep 2024 11:54:59 GMT -->
</html>
