<!DOCTYPE html>
<html lang="en">

<head>
@include('user.header')
</head>
<body>

@include('user.navbar')

<!-- <div class="container" style="text-align: center; margin-top: 20px;">
    <div class="row justify-content-center">
    
    <form action="{{ url('/doctors/search') }}" method="GET">
        @csrf 
        <div>
            <label for="location">Location:</label>
            <input type="text" name="location" id="location" placeholder="Enter location" required>
        </div>

        <div>
            <label for="speciality">Specialization:</label>
            <input type="text" name="speciality" id="speciality" placeholder="Enter specialization" required>
        </div>

        <button type="submit">Search</button>
    </form>

    <!-- Display Results 
    
    </div>
</div> -->

<div class="container mt-4">
    <div class="row justify-content-center">
        <form action="{{ url('/doctors/search') }}" method="GET" class="row g-3 align-items-center">
            @csrf 
            
            <div class="col-md-4">
                <label for="location" class="form-label">Location:</label>
                <input type="text" name="location" id="location" class="form-control" placeholder="Enter location" required>
            </div>

            <div class="col-md-4">
                <label for="speciality" class="form-label">Specialization:</label>
                <input type="text" name="speciality" id="speciality" class="form-control" placeholder="Enter specialization" required>
            </div>

            <div class="col-md-2 mt-3 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">Search</button>
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

@include('user.js')

</body>
</html>