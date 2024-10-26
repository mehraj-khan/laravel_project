

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
                <form action="{{url('edit_news',$update->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" value="{{old('title' , $update->title) }}" id="title" type="text"  name="title" placeholder="Enter your title">
                    @if ($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                    <br>
                    </div>

                  
               
                   
               
               
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content"  cols="30" rows="4" placeholder="content">{{ old('content', $update->content) }}</textarea>
                    @if ($errors->has('content'))
                    <span class="text-danger">{{ $errors->first('content') }}</span>
                    @endif
                </div>
               
                    <div class="form-group">
                    <label for="date">Date</label>
                    <input  class="form-control" value="{{ old('date', $update->date) }}" id="date" type="date"   name="date" placeholder="date">
                    @if ($errors->has('date'))
                    <span class="text-danger">{{ $errors->first('date') }}</span>
                    @endif
                    <br>
                </div>
                    <br>
                    <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" value="{{ old('image'),$update->image }}" id="image" class="form-control" name="image">
                    @if ($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                    @endif
                    </div>
                    <br>
                    <input type="submit"  value="Update" class="btn btn-primary">
                    </div>
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
