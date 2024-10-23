<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from technext.github.io/dentista/doctor.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Sep 2024 11:55:06 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
   @include('user.css')
  </head>
  <body>
  @include('user.navbar')
    <!-- END nav -->

    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Our Dentist</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('index') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Doctors <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
			<div class="container">
				<div class="row">
                    @foreach ($doctor as $dr)
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url('{{ asset('doctor_image/'.$dr->Image) }}');"></div>
							</div>
							<div class="text pt-3 text-center">
								<h3>{{ $dr->name }}</h3>
								<span class="position mb-2">{{ $dr->speciality }}</span>
								<div class="faded">
									<p><i class="fa-solid fa-location-dot" style="color: #e00b20;"></i>  {{ $dr->location }}</p>
									<p>  {{Str::limit($dr->description, 53, '...') }}</p>
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
                    @endforeach
					

				</div>
			</div>
		</section>

@include('user.footer')
  
@include('user.js')

  </body>

<!-- Mirrored from technext.github.io/dentista/doctor.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Sep 2024 11:55:07 GMT -->
</html>
