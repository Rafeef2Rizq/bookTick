<!DOCTYPE html>
<html lang="en">


<x-main.head />

<body>
	@php
	use App\Models\Book;

	$books=Book::paginate(3);
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


	<!-- comic details -->
	<section id="page-title">
		<div id="backtotop">
			<a href="#page-title" id="backtotop-value"><i class="fa-solid fa-arrow-up"></i></a>
		</div>
	</section>
	<section id="comic-details">
		<div class="container zindex">
			<div class="row details-pos">
				<div class="col-lg-5 comic-detail-img">
					<img src="{{ asset('images/' . $book->image) }}"" alt=" comic-img" class="img-fluid">
				</div>
				<div class="col-lg-6 comic-detail-txt">
					<div class="stars">
						<i class="fa-solid fa-star"></i>
						<i class="fa-solid fa-star"></i>
						<i class="fa-solid fa-star"></i>
						<i class="fa-solid fa-star"></i>
						<i class="fa-solid fa-star-half-stroke"></i>
						<span>4.5</span>
					</div>
					<h3>{{ $book->title }}</h3>
					<span>{{ $book->author }}</span>
					<p>{{ $book->description }}</p>
					<h4>${{ $book->price }}</h4>
					<a href="/cart/add/{{ $book->id }}" class="button-primary">Add To Cart</a>
					<form action="{{ route('bookmarks.store', $book->id) }}" method="POST">
						@csrf
						<button type="submit" class="bookmark-btn" style="border: none; margin-top:50px" ><i class="fa-solid fa-bookmark"></i></button>
					</form>
				
				</div>
			</div>
		</div>

	</section>
	<!-- comic details -->

	<!-- FOOTER AREA START -->
	<x-main.footer />
	<!-- FOOTER AREA END -->

	<!-- COPY_RIGHT AREA START -->
	<section id="copy_right">
		<div class="container">
			<div class="row copyright-txt">
				<div class="col-lg-6">
					<span>LANGUAGE: </span>
					<a href="#">BAN</a>
					<a href="#">NL</a>
					<a href="#" class="active">EN</a>
					<a href="#">FR</a>
					<a href="#">EU</a>
				</div>
				<div class="col-lg-6 text-end">
					<p>&copy; Made by EpikTheme. All Rights Reserved.</p>
				</div>
			</div>
		</div>
	</section>
	<!-- COPY_RIGHT AREA END -->

	<!-- JavaScript -->
	<x-main.script />
</body>


<!-- Mirrored from epiktheme.com/demos/html/comixo_live_preview/demos/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 Jul 2024 03:52:57 GMT -->

</html>