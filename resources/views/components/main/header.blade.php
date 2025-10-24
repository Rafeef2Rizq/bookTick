<nav class="navbar navbar-expand-lg navbar-light sticky-top">
		<div class="container">
			<a class="navbar-brand" href="/">BookTick<span>.</span></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav m-auto mb-2 mt-0 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link" href="/">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#about">About</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/books">Books</a>
					</li>
				
					<li class="nav-item">
						<a class="nav-link" data-bs-toggle="modal" data-bs-target="#contact-modal">Contact</a>
					</li>
				</ul>
				<div class="menu-action d-flex">
					<div class="action-icon">
						<a href="/bookmarks" class="menu-icon"><i class="fa-solid fa-bookmark"></i></a>
						<a href="/cart" class="menu-icon"><span>{{ app('App\Http\Controllers\CartController')->getCartQuantity() }}</span><i class="fa-solid fa-cart-shopping"></i></a>
						
						<a data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" class="menu-icon mobile-v-show"><i class="fa-solid fa-magnifying-glass"></i></a>
					</div>
					<a href="#" class="button-secondary">Free Books</a>
					<a href="#" class="ham-button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
						<div class="hamburger-menu">
							<div class="nav-line"></div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</nav>