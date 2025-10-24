<!DOCTYPE html>
<html lang="en">


<x-main.head />

<body>
	@php
	use App\Models\Book;

	$books = Book::latest()->paginate(3);
	@endphp
	<!-- perloader -->
	<div id="preloader">
		<div id="loading-center">
			<div id="loading-center-absolute">
				<div class="object" id="object_one"></div>
				<div class="object" id="object_two"></div>
				<div class="object" id="object_three"></div>
				<div class="object" id="object_four"></div>
			</div>
		</div>
	</div>
	<!-- preloader -->

	<!-- HEADER AREA START -->
	<x-main.header />

	<!-- right-menu modal -->
	<x-main.menu />
	<!-- contact modal -->
	<x-main.contact />

	<!-- HEADER AREA ENDS -->

	<!-- BANNER AREA START -->
	<section id="banner">
		<div id="backtotop">
			<a href="#banner" id="backtotop-value"><i class="fa-solid fa-arrow-up"></i></a>
		</div>
		<div class="container zindex">
			<div class="row">
				<div class="col-lg-6 banner-txt">
					<span>Our Books</span>
					<h3>Book</h3>
					<h3 class="txt-pos">Tick.</h3>
					<a href="#" class="button-primary">Read Now</a>
					<a class="venobox button-circular" data-autoplay="true" data-vbtype="video" href="https://www.youtube.com/watch?v=kmh1cr3b4Js"><i class="fa-solid fa-play"></i></a>

				</div>
				<div class="col-10 col-sm-11 col-md-7 col-lg-6 banner-images">
					<img src="{{ asset('assets/main/images/banner-icon.png') }}" alt="banner-icon" class="banner-icon">
					<img src="{{ asset('assets/main/images/banner.jpg') }}" alt="banner-img" class="banner-img one img-fluid">
					<img src="{{ asset('assets/main/images/banner.jpg') }}" alt="banner-img" class="banner-img two img-fluid">
				</div>
			</div>
		</div>

	</section>
	<!-- BANNER AREA ENDS -->

	<!-- ABOUT AREA START -->
	<section id="about">
		<div class="container">
			<div class="row pt-5">
				<div class="col-lg-5 col-md-9 m-md-auto about-main">
					<img src="{{ asset('assets/main/images/about.jpg') }}" alt="about-img" class="img-fluid" style="height: 500px;">
					<div class="active-users">
						<h3 class="counter" data-counterup-time="2000" data-counterup-delay="30" data-counterup-beginat="1">3</h3><span>K</span>
						<p>Users</p>
					</div>
					<div class="experience">
						<h3 class="counter" data-counterup-time="2000" data-counterup-delay="30" data-counterup-beginat="2">10</h3>
						<span>+</span>
						<p>Years of creativity</p>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="about-txt">
						<span>About Us</span>
						<h3>Digital Bookstore & Reading Platform</h3>
						<p class="pt-2 pb-4"> We are a digital platform specialized in providing a wide range of eBooks across different genres.
							Our mission is to make reading more accessible and enjoyable through instant digital downloads
							and a seamless user experience.
						</p>
						<div class="check-p">
							<p><i class="fa-solid fa-check"></i> Access a wide collection of digital books</p>
							<p><i class="fa-solid fa-check"></i> Enjoy secure and instant downloads</p>
							<p><i class="fa-solid fa-check"></i>Discover new authors and creative stories</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ABOUT AREA ENDS -->



	<!-- NEW_COMICS AREA START -->
	<section id="new-comics">
		<div class="container">
			<div class="row">
				<div class="section-title t-white">
					<div class="row">
						<div class="col-lg-6 m-auto text-center">
							<span>New Books</span>
							<h3>Enjoy Newest Books.</h3>
						</div>
					</div>
				</div>
			</div>
			<div class="row comic-item-pos">
				@foreach ($books as $book )
				<div class="col-lg-4 col-md-8 mobile-m-auto">
					<div class="comic-item">
						<img src="{{ asset('images/' . $book->image) }}" alt="comic" class="img-fluid" style="height: 480px;">
						<a class="veno-img" data-gall="comic1" href="{{ asset('images/' . $book->image) }}"><i class="fa-solid fa-plus"></i></a>
						<div class="comic-item-details">
							<div class="row">
								<div class="col-8 col-lg-8">
									<h3>{{ $book->title }}</h3>
									<p><i class="fa-solid fa-eye"></i> 250.6K Reviews</p>
								</div>
								<div class="col-4 col-lg-4 text-end">
									<a href="/books/{{ $book->id }}"><i class="fa-solid fa-arrow-right"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach


			</div>
		</div>
	</section>
	<!-- NEW_COMICS AREA END -->

	<section id="popular">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 section-title">
					<span>Popular</span>
					<h3>Explore Our Creativity.</h3>
					<p>Discover the most loved books by our readers.</p>
					<a href="/books" class="button-primary">Browse All</a>
				</div>

				@foreach($books as $book)
				<div class="col-lg-6 col-md-9 mobile-m-auto mb-5">
					<div class="popular-item {{ $loop->iteration % 2 == 0 ? 'right' : '' }}">
						<p>{{ $book->published_year }}</p>
						<div class="col-lg-10 {{ $loop->iteration % 2 == 0 ? 'me-auto' : 'ms-auto' }}">
							<img src="{{ asset('images/' . ($book->image ?? 'default-book.png')) }}" alt="{{ $book->title }}" class="img-fluid">
							<a href="{{ route('books.show', $book->id) }}">{{ $book->title }}</a>
						</div>
					</div>
				</div>
				@endforeach

			</div>
		</div>
	</section>



	<!-- FOOTER AREA START -->
	<x-main.footer />
	<!-- FOOTER AREA END -->



	<!-- JavaScript -->
	<x-main.script />
</body>


<!-- Mirrored from epiktheme.com/demos/html/comixo_live_preview/demos/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 Jul 2024 03:52:57 GMT -->

</html>