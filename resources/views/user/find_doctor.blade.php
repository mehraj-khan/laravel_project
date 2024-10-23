<!DOCTYPE html>
<html lang="en">

<head>
@include('user.css')
<!-- <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"> -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> -->


</head>
<body>

@include('user.navbar')



<div class="container mt-4">
    <div class="row justify-content-center">
        <form action="{{ url('/doctors/search') }}" method="GET" class="row g-3 align-items-center">
            @csrf 
            <div class="row form-section"">
            <div class="col-12 col-md-6 mb-3">
    <select class="form-select custom-select" id="location" name="location">
        <option value="" disabled {{ old('location') ? '' : 'selected' }}>Select location</option>
        @foreach($allLocations as $location)
            <option value="{{ $location }}" {{ old('location') == $location ? 'selected' : '' }}>
                {{ $location }}
            </option>
        @endforeach
    </select>
</div>

<div class="col-12 col-md-6 mb-3">
    <select class="form-select custom-select w-200" id="speciality" name="speciality">
        <option value="" disabled {{ old('speciality') ? '' : 'selected' }}>Select speciality</option>
        @foreach($allSpecialities as $speciality)
            <option value="{{ $speciality }}" {{ old('speciality') == $speciality ? 'selected' : '' }}>
                {{ $speciality }}
            </option>
        @endforeach
    </select>
</div>

</div>

            <!-- speciality -->
            <div class="col-md-2 mb-3 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-200">Search</button>
            </div>
        </form>
    </div>
</div>


<section class="ftco-section">
			<div class="container">
				<div class="row">

@if($doctors->isNotEmpty())
       
       
            @foreach($doctors as $doctor)
            <div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url('{{ asset('doctor_image/'.$doctor->Image) }}');"></div>
							</div>
							<div class="text pt-3 text-center">
								<h3>{{ $doctor->name }}</h3>
								<span class="position mb-2">{{ $doctor->speciality }}</span>
								<div class="faded">
									<p><i class="fa-solid fa-location-dot" style="color: #e00b20;"></i>  {{ $doctor->location }}</p>
									<ul class="ftco-social text-center">
                                        
		                <li class="ftco-animate"><a href="#" class="d-flex align-items-center justify-content-center"><span class="icon-twitter"></span></a></li>
		                <li class="ftco-animate"><a href="#" class="d-flex align-items-center justify-content-center"><span class="icon-facebook"></span></a></li>
		                <li class="ftco-animate"><a href="#" class="d-flex align-items-center justify-content-center"><span class="icon-google-plus"></span></a></li>
		                <li class="ftco-animate"><a href="#" class="d-flex align-items-center justify-content-center"><span class="icon-instagram"></span></a></li>
		              </ul>
	              </div>
                 
							</div>
						</div>
					</div>
                <!-- <li>{{ $doctor->name }} - {{ $doctor->speciality }} in {{ $doctor->location }}</li> -->
            @endforeach
        
    @else
        <p>No doctors found matching your criteria.</p>
    @endif

    </div>
			</div>
		</section>





        @include('user.footer')

@include('user.js')
<!-- <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> -->


</body>
</html>