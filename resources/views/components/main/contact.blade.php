<div class="modal fade" id="contact-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Contact Us</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form method="POST" action="{{ route('email.send') }}">
					@csrf

					<div class="modal-body">
						<div class="row">
							<div class="col-lg-7">
								<div class="row">
									<div class="col-lg-6">
										<input type="text" name="name" class="form-control" placeholder="Your Name">
									</div>
									<div class="col-lg-6">
										<input type="email" name="email" class="form-control" placeholder="Your Email">
									</div>
									<div class="col-lg-6">
										<input type="text" name="phone" class="form-control" placeholder="Your Phone">
									</div>
									<div class="col-lg-6">
										<input type="text" name="subject" class="form-control" placeholder="Subject">
									</div>
									<div class="col-lg-12">
										<textarea class="form-control" name="messageBody" placeholder="Write Your Comment Here..." rows="3"></textarea>
									</div>
								</div>
							</div>
							<div class="col-lg-5">
								<div class="contact-item">
									<p>Welcome to our BookTick here you can read what you love with creative book</p>
									<div class="row">
										<div class="col-6 col-lg-6 contact-info">
											<i class="fa-solid fa-location-dot"></i>
											<h3>Address:</h3>
											<p>Gaza  No. 001, Pa .</p>
										</div>
										<div class="col-6 col-lg-6 contact-info">
											<i class="fa-solid fa-phone"></i>
											<h3>Phone:</h3>
											<p>+(972) 568181025</p>
										</div>
										<div class="col-6 col-lg-6 contact-info mb-0">
											<i class="fa-solid fa-envelope"></i>
											<h3>Email:</h3>
											<p>booktick@gmail.com</p>
										</div>
										<div class="col-6 col-lg-6 contact-info mb-0">
											<i class="fa-solid fa-wifi"></i>
											<h3>Connect:</h3>
											<div class="social">
												<a href="#"><i class="fa-brands fa-facebook-f"></i></a>
												<a href="#"><i class="fa-brands fa-twitter"></i></a>
												<a href="#"><i class="fa-brands fa-twitch"></i></a>
												<a href="#"><i class="fa-brands fa-youtube"></i></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="button-primary">Send Message</button>
					</div>
				</form>
			</div>
		</div>
	</div>