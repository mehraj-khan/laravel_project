<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.csss')
  <style>
    /* General Styling */
    body {
      background-color: #f8f9fa;
    }

    .table-responsive {
      padding: 20px;
      background-color: white;
      border-radius: 10px;
      box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
    }

    /* Table Styling */
    .table {
      border-collapse: separate;
      border-spacing: 0 10px;
    }

    .table th {
      background-color: #343a40;
      color: white;
      text-align: center;
      padding: 12px;
      border: none;
      font-size: 14px;
    }

    .table td {
      background-color: #ffffff;
      text-align: center;
      padding: 12px;
      border: none;
      font-size: 14px;
    }

    /* Row Hover Effect */
    .table-hover tbody tr:hover {
      background-color: #f1f3f5;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    /* Button Styling */
    .btn {
      padding: 6px 12px;
      font-size: 12px;
      border-radius: 5px;
    }

    .btn-danger {
      background-color: #dc3545;
      border-color: #dc3545;
      color: white;
    }

    .btn-danger:hover {
      background-color: #c82333;
      border-color: #bd2130;
    }

    .btn-warning {
      background-color: #ffc107;
      border-color: #ffc107;
      color: white;
    }

    .btn-warning:hover {
      background-color: #e0a800;
      border-color: #d39e00;
    }

    /* Image Styling */
    img {
      border-radius: 8px;
      object-fit: cover;
    }

    img:hover {
      transform: scale(1.05);
      transition: transform 0.3s ease;
    }

    /* Responsive for Smaller Screens */
    @media (max-width: 768px) {
      .table-responsive {
        padding: 10px;
      }

      .table th,
      .table td {
        padding: 10px;
        font-size: 12px;
      }

      .btn {
        padding: 4px 8px;
        font-size: 10px;
      }

      img {
        height: 80px;
        width: 50px;
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

    <div class="align-self-center" style="padding: 10px;">
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Title</th>
              <th scope="col">Content</th>
              <th scope="col">Date</th>
              <th scope="col">Image</th>
              <th scope="col">Delete</th>
              <th scope="col">Update</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($show as $show)
            <tr>
              <td>
                <span title="{{ $show->title }}">
                  {{ Str::limit($show->content, 20, '...') }}
                </span>
              </td>              
             
              <td>
                <span title="{{ $show->content }}">
                  {{ Str::limit($show->content, 30, '...') }}
                </span>
              </td>
              <td>{{ $show->date }}</td>
              <td>
                <img height="100px" width="60px" src="{{ asset('news_image/' . $show->image) }}" alt="news Image">
              </td>
              <td>
                <a href="{{ url('delete_news', $show->id ) }}" onclick="return confirm('Are you sure you want to delete this doctor?')" class="btn btn-sm btn-danger">Delete</a>
              </td>
              <td>
                <a href="{{ url('update_news', $show->id ) }}" class="btn btn-sm btn-warning">Update</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    <!-- Core JS Files -->
    @include('admin.script')
  </main>
</body>

</html>
