<div class=" py-4 border-bottom">
    <div class="container">
        <div class="row no-gutters d-flex align-items-start align-items-center px-3 px-md-0">
            <div class="col-md-4 order-md-2 mb-2 mb-md-0 align-items-center text-center">
                <a class="navbar-brand" href="{{ route('index') }}">Dentista<span>Dental Clinic</span></a>
            </div>
            <div class="col-md-4 order-md-1 d-flex topper mb-md-0 mb-2 align-items-center text-md-right">
                <div class="icon d-flex justify-content-center align-items-center order-md-last">
                    <span class="icon-map"></span>
                </div>
                <div class="pr-md-4 pl-md-0 pl-3 text">
                    <p class="con"><span>Free Call</span> <span>+1 234 456 78910</span></p>
                    <p class="con">198 West 21th Street, Suite 721 New York NY 10016</p>
                </div>
            </div>
            <div class="col-md-4 order-md-3 d-flex topper mb-md-0 align-items-center">
                <div class="icon d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                <div class="text pl-3 pl-md-3">
                    <p class="hr"><span>Open Hours</span></p>
                    <p class="time"><span>Mon - Sat:</span> <span>8:00am - 9:00pm</span> Sun: Closed</p>
                </div>
            </div>
        </div>
        {{-- <div class="row mt-5 justify-content-start">
            <button class="justify">appoinment</button>
        </div>
        @if (Route::has('login'))
        @auth
        <x-app-layout>
        </x-app-layout>
        @else
        <div class="row mt-3 justify-content-end">
            <div class="col-auto ms-4">
                <a href="{{ route('login') }}" class="btn btn-primary text-dark">Login</a>
            </div>
            <div class="col-auto ">
                <a href="{{ route('register') }}" class="btn btn-primary text-dark">Register</a>
            </div>
        </div>
        @endauth
        @endif --}}
        <div class="row mt-5 justify-content-between">
            <div class="col-auto">
                <a href="{{ url('/appoinment') }}" class="btn btn-primary">Book an Appointment</a>
            </div>

            @if (Route::has('login'))
                @auth

                <x-app-layout>
                </x-app-layout>
                @else
                <div class="col-auto">
                    <a href="{{ route('login') }}" class="btn btn-primary text-dark">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-primary text-dark ms-2">Register</a>
                </div>
                @endauth
            @endif
        </div>
      </div>
</div>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container d-flex align-items-center">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav m-auto">
            <li class="nav-item "><a href="{{ route('index') }}" class="nav-link pl-0">Home</a></li>
            <li class="nav-item "><a href="{{ route('about') }}" class="nav-link">About</a></li>
            <li class="nav-item"><a href="{{ route('doctor') }}" class="nav-link">Doctor</a></li>
            <li class="nav-item"><a href="{{ route('doctors.search') }}" class="nav-link">Find Doctor</a></li>
            <li class="nav-item"><a href="{{ route('treatments') }}" class="nav-link">Treatments</a></li>
            <li class="nav-item"><a href="{{ route('blog') }}" class="nav-link">Blog</a></li>
          <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>
          @if (Route::has('login'))
                @auth
          <li class="nav-item">
                    <a href="{{ url('/myappoinment') }}" style="background-color: greenyellow; color: white; padding: 10px; margin-top: 20px;" class="nav-link">my appointment</a>
          </li>
          @endauth
          @endif
        </ul>
      </div>
    </div>
  </nav>
