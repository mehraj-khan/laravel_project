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
    h1 {
      font-size: 26px;
      font-weight: bold;
      text-align: center;
      margin-bottom: 15px;
      color: #E0296A;
    }

    p {
      text-align: center;
      font-size: 16px;
      color: #6c757d;
    }

    /* Form group styling */
    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      font-size: 15px;
      color: #5a5c69;
      font-weight: bold;
    }

    .form-group input[type="text"],
    .form-group input[type="email"],
    .form-group input[type="file"],
    .form-group textarea {
      width: 100%;
      padding: 12px;
      font-size: 14px;
      border-radius: 5px;
      border: 1px solid #ced4da;
      margin-top: 5px;
    }

    .form-group input[type="text"]:focus,
    .form-group input[type="email"]:focus,
    .form-group input[type="file"]:focus,
    .form-group textarea:focus {
      border-color: #4e73df;
      outline: none;
      box-shadow: 0 0 5px rgba(78, 115, 223, 0.5);
    }

    /* Textarea styling */
    textarea {
      resize: vertical;
      min-height: 100px;
    }

    /* Button styling */
    .btn-primary {
      /* background-color: #E0296A; */
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      text-align: center;
      width: 100%;
    }

    .btn-primary:hover {
      background-color: #E0296A;
    }

    /* Error message styling */
    .text-danger {
      color: #e74a3b;
      font-size: 12px;
    }

    /* Success message styling */
    .alert-success {
      background-color: #28a745;
      color: white;
      padding: 10px;
      border-radius: 5px;
      margin-bottom: 20px;
    }

    .alert-success .close {
      color: white;
    }

    /* Responsive design */
    @media (max-width: 768px) {
      .form-box {
        padding: 20px;
        width: 90%;
      }

      .form-group label,
      .form-group input,
      .form-group textarea {
        font-size: 14px;
      }

      h1 {
        font-size: 22px;
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

    <div class="container-fluid py-4">
      <div class="container align-center">
        <div class="form-box">
          @if ($message = Session::get('success'))
          <div class="alert alert-success alert-block">
            <strong>{{ $message }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif

          <h1>Doctor Form</h1>
          <p>Fill this form completely</p>

          <form action="{{ url('upload_doctor') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
              <label for="name">Full Name</label>
              <input class="form-control" value="{{ old('name') }}" placeholder="Enter your full name" id="name" type="text" name="name">
              @if ($errors->has('name'))
              <span class="text-danger">{{ $errors->first('name') }}</span>
              @endif
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input class="form-control" value="{{ old('email') }}" placeholder="Enter your email" id="email" type="email" name="email">
              @if ($errors->has('email'))
              <span class="text-danger">{{ $errors->first('email') }}</span>
              @endif
            </div>

            <div class="form-group">
              <label for="phone">Phone</label>
              <input class="form-control" placeholder="Enter your phone number" value="{{ old('phone') }}" id="phone" type="text" name="phone">
              @if ($errors->has('phone'))
              <span class="text-danger">{{ $errors->first('phone') }}</span>
              @endif
            </div>

            <div class="form-group">
              <label for="location">Location</label>
              <input class="form-control" placeholder="Enter your location" value="{{ old('location') }}" id="location" type="text" name="location">
              @if ($errors->has('location'))
              <span class="text-danger">{{ $errors->first('location') }}</span>
              @endif
            </div>

            <div class="form-group">
              <label for="speciality">Speciality</label>
              <input class="form-control" placeholder="Enter your speciality" value="{{ old('speciality') }}" id="speciality" type="text" name="speciality">
              @if ($errors->has('speciality'))
              <span class="text-danger">{{ $errors->first('speciality') }}</span>
              @endif
            </div>

            <div class="form-group">
              <label for="description">Description</label>
              <textarea class="form-control" placeholder="Enter description" id="description" name="description">{{ old('description') }}</textarea>
              @if ($errors->has('description'))
              <span class="text-danger">{{ $errors->first('description') }}</span>
              @endif
            </div>

            <div class="form-group">
              <label for="image">Image</label>
              <input class="form-control" id="image" type="file" name="Image">
              @if ($errors->has('image'))
              <span class="text-danger">{{ $errors->first('image') }}</span>
              @endif
            </div>

            <input class="btn btn-primary" class="btn-primary" type="submit" value="Submit">
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
