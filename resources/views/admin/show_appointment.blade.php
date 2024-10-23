<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.csss')
  <style>
    /* General body styling */
    body {
      background-color: #f7f8fa;
    }

    /* Table container styling */
    .table-container {
      padding: 40px;
      background-color: #ffffff;
      border-radius: 10px;
      box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
      margin-top: 20px;
    }

    /* Table styling */
    .table {
      width: 100%;
      margin-bottom: 1rem;
      color: #212529;
      border-collapse: collapse;
    }

    .table th {
      background-color: #343a40;
      color: white;
      padding: 12px;
      text-align: center;
      font-size: 14px;
      font-weight: bold;
    }

    .table td {
      background-color: #f9f9f9;
      padding: 12px;
      text-align: center;
      border-bottom: 1px solid #dee2e6;
      font-size: 14px;
    }

    /* Row hover effect */
    .table-hover tbody tr:hover {
      background-color: #f1f3f5;
      transition: background-color 0.3s ease;
    }

    /* Button styling */
    .btn-danger {
      padding: 8px 12px;
      font-size: 12px;
      border-radius: 5px;
      color: #fff;
      background-color: #dc3545;
      border: none;
    }

    .btn-danger:hover {
      background-color: #c82333;
      cursor: pointer;
    }

    /* Responsive for smaller screens */
    @media (max-width: 768px) {
      .table-container {
        padding: 20px;
      }

      .table th,
      .table td {
        padding: 10px;
        font-size: 12px;
      }

      .btn-danger {
        padding: 6px 10px;
        font-size: 10px;
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

    <div class="table-container align-self-center">
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
            <td>{{ $appoint->name }}</td>
            <td>{{ $appoint->phone }}</td>
            <td>{{ $appoint->select_doctor }}</td>
            <td>{{ $appoint->gender }}</td>
            <td>{{ $appoint->date }}</td>
            <td>
              <a href="{{ url('delete_appointment', $appoint->id ) }}" onclick="return confirm('Are you sure you want to delete this appointment?')" class="btn btn-danger">
                Delete Appointment
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <!-- Core JS Files -->
    @include('admin.script')
  </main>
</body>

</html>
