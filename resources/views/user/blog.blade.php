<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from technext.github.io/dentista/blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Sep 2024 11:55:10 GMT -->
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
            <h1 class="mb-2 bread">News</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('index') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>News <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

		<section class="ftco-section bg-light">
			<div class="container">
				<div class="row">
          @foreach($data as $data)
          <div class="col-md-4 ftco-animate">
    <div class="blog-entry">
        <a href="javascript:void(0)" class="block-20 d-flex align-items-end justify-content-end" style="background-image: url('{{ asset('news_image/'.$data->image) }}');">
            <div class="meta-date text-center p-2">
                <span class="day">{{ \Carbon\Carbon::parse($data->date)->format('d') }}</span>
                <span class="mos">{{ \Carbon\Carbon::parse($data->date)->format('F') }}</span>
                <span class="yr">{{ \Carbon\Carbon::parse($data->date)->format('Y') }}</span>
            </div>
        </a>
        <div class="text bg-white p-4">
            @php
                // Limit title and content to 10 and 30 words respectively
                $limitedTitle = Str::words($data->title, 10, '...');
                $limitedContent = Str::words($data->content, 10, '...');
            @endphp

            {{-- Display the limited title initially --}}
            <h3 class="heading">
                <a href="javascript:void(0)" class="toggle-title-btn">{{ $limitedTitle }}</a>
                <span class="full-title" style="display: none;">{{ $data->title }}</span>
            </h3>

            {{-- Display the limited content initially --}}
            <p class="short-content">{{ $limitedContent }}</p>

            {{-- Full content hidden initially --}}
            <p class="full-content" style="display: none;">{{ $data->content }}</p>

            {{-- Read More / Read Less button for content --}}
            <div class="d-flex align-items-center mt-4">
                <p class="mb-0">
                    <a href="javascript:void(0)" class="btn btn-primary toggle-content-btn">
                        Read More <span class="ion-ios-arrow-round-forward"></span>
                    </a>
                </p>
            </div>

            <div class="d-flex align-items-center mt-4">
                <p class="ml-auto mb-0">
                    <a href="#" class="mr-2">Admin</a>
                    <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                </p>
            </div>
        </div>
    </div>
</div>
          <!-- <div class="col-md-4 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.html" class="block-20 d-flex align-items-end justify-content-end" style="background-image: url('images/image_2.jpg');">
								<div class="meta-date text-center p-2">
                  <span class="day">18</span>
                  <span class="mos">September</span>
                  <span class="yr">2019</span>
                </div>
              </a>
              <div class="text bg-white p-4">
                <h3 class="heading"><a href="#">Scary Thing That You Don’t Get Enough Sleep</a></h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <div class="d-flex align-items-center mt-4">
	                <p class="mb-0"><a href="#" class="btn btn-primary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
	                <p class="ml-auto mb-0">
	                	<a href="#" class="mr-2">Admin</a>
	                	<a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
	                </p>
                </div>
              </div>
            </div>
          </div> -->
          <!-- <div class="col-md-4 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.html" class="block-20 d-flex align-items-end justify-content-end" style="background-image: url('images/image_3.jpg');">
								<div class="meta-date text-center p-2">
                  <span class="day">18</span>
                  <span class="mos">September</span>
                  <span class="yr">2019</span>
                </div>
              </a>
              <div class="text bg-white p-4">
                <h3 class="heading"><a href="#">Scary Thing That You Don’t Get Enough Sleep</a></h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <div class="d-flex align-items-center mt-4">
	                <p class="mb-0"><a href="#" class="btn btn-primary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
	                <p class="ml-auto mb-0">
	                	<a href="#" class="mr-2">Admin</a>
	                	<a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
	                </p>
                </div>
              </div>
            </div>
          </div> -->

          <!-- <div class="col-md-4 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.html" class="block-20 d-flex align-items-end justify-content-end" style="background-image: url('images/image_4.jpg');">
								<div class="meta-date text-center p-2">
                  <span class="day">18</span>
                  <span class="mos">September</span>
                  <span class="yr">2019</span>
                </div>
              </a>
              <div class="text bg-white p-4">
                <h3 class="heading"><a href="#">Scary Thing That You Don’t Get Enough Sleep</a></h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <div class="d-flex align-items-center mt-4">
	                <p class="mb-0"><a href="#" class="btn btn-primary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
	                <p class="ml-auto mb-0">
	                	<a href="#" class="mr-2">Admin</a>
	                	<a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
	                </p>
                </div>
              </div>
            </div>
          </div> -->
          <!-- <div class="col-md-4 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.html" class="block-20 d-flex align-items-end justify-content-end" style="background-image: url('images/image_5.jpg');">
								<div class="meta-date text-center p-2">
                  <span class="day">18</span>
                  <span class="mos">September</span>
                  <span class="yr">2019</span>
                </div>
              </a>
              <div class="text bg-white p-4">
                <h3 class="heading"><a href="#">Scary Thing That You Don’t Get Enough Sleep</a></h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <div class="d-flex align-items-center mt-4">
	                <p class="mb-0"><a href="#" class="btn btn-primary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
	                <p class="ml-auto mb-0">
	                	<a href="#" class="mr-2">Admin</a>
	                	<a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
	                </p>
                </div>
              </div>
            </div>
          </div> -->
          <!-- <div class="col-md-4 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.html" class="block-20 d-flex align-items-end justify-content-end" style="background-image: url('images/image_6.jpg');">
								<div class="meta-date text-center p-2">
                  <span class="day">18</span>
                  <span class="mos">September</span>
                  <span class="yr">2019</span>
                </div>
              </a>
              <div class="text bg-white p-4">
                <h3 class="heading"><a href="#">Scary Thing That You Don’t Get Enough Sleep</a></h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <div class="d-flex align-items-center mt-4">
	                <p class="mb-0"><a href="#" class="btn btn-primary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
	                <p class="ml-auto mb-0">
	                	<a href="#" class="mr-2">Admin</a>
	                	<a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
	                </p>
                </div>
              </div>
            </div>
          </div> -->
       
        @endforeach
        <!-- <div class="row no-gutters my-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#"><i class="ion-ios-arrow-back"></i></a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#"><i class="ion-ios-arrow-forward"></i></a></li>
              </ul>
            </div>
          </div>
        </div> -->
        </div>
			</div>
		</section>

    @include('user.footer')


  <!-- loader -->
  @include('user.js') 


  <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Toggle title functionality
        document.querySelectorAll('.toggle-title-btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                var parentDiv = this.closest('.heading');
                var shortTitle = this; // Limited title
                var fullTitle = parentDiv.querySelector('.full-title');

                // Toggle visibility of the titles
                if (fullTitle.style.display === 'none') {
                    fullTitle.style.display = 'inline'; // Show full title
                    shortTitle.style.display = 'none'; // Hide limited title
                } else {
                    fullTitle.style.display = 'none'; // Hide full title
                    shortTitle.style.display = 'inline'; // Show limited title
                }
            });
        });

        // Attach click event to the 'Read More / Read Less' button
        document.querySelectorAll('.toggle-content-btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                var parentDiv = this.closest('.text');  // Find the closest text container
                var shortContent = parentDiv.querySelector('.short-content');
                var fullContent = parentDiv.querySelector('.full-content');
                
                // Toggle visibility of short and full content
                if (shortContent.style.display === 'none') {
                    // Currently showing full content, so hide it and show limited content
                    shortContent.style.display = 'block';
                    fullContent.style.display = 'none';
                    this.innerHTML = 'Read More <span class="ion-ios-arrow-round-forward"></span>';
                } else {
                    // Currently showing limited content, so hide it and show full content
                    shortContent.style.display = 'none';
                    fullContent.style.display = 'block';
                    this.innerHTML = 'Read Less <span class="ion-ios-arrow-round-back"></span>';
                }
            });
        });
    });
</script>
  </body>

<!-- Mirrored from technext.github.io/dentista/blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Sep 2024 11:55:11 GMT -->
</html>
