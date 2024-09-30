

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
    @include('admin.body')

  <!--   Core JS Files   -->
 @include('admin.script')
</body>

</html>
