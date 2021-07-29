<?php
use Framework\Core\AbsView;
AbsView::render('layouts/header.php');
?>


<div class="wrapper">

	<section id="carousel">

		<div class="container-fluid">

			<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
				<div class="carousel-indicators">
					<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class=""
						aria-label="Slide 1"></button>
					<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"
						class="active" aria-current="true"></button>
					<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"
						class=""></button>
				</div>
				<div class="carousel-inner">
					<div class="carousel-item active carousel-item-start">
						<svg class="bd-placeholder-img" width="100%" height="600px" xmlns="http://www.w3.org/2000/svg"
							aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
							<rect width="100%" height="100%" fill="#777"></rect>
						</svg>

						<div class="container">
							<div class="carousel-caption">
								<h1>Example headline.</h1>
								<p>Some representative placeholder content for the first slide of the carousel.</p>
								<p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
							</div>
						</div>
					</div>
					<div class="carousel-item carousel-item-next carousel-item-start">
						<svg class="bd-placeholder-img" width="100%" height="600px" xmlns="http://www.w3.org/2000/svg"
							aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
							<rect width="100%" height="100%" fill="#777"></rect>
						</svg>

						<div class="container">
							<div class="carousel-caption">
								<h1>Another example headline.</h1>
								<p>Some representative placeholder content for the second slide of the carousel.</p>
								<p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<svg class="bd-placeholder-img" width="100%" height="600px" xmlns="http://www.w3.org/2000/svg"
							aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
							<rect width="100%" height="100%" fill="#777"></rect>
						</svg>

						<div class="container">
							<div class="carousel-caption text-end">
								<h1>One more for good measure.</h1>
								<p>Some representative placeholder content for the third slide of this carousel.</p>
								<p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>

		<div class="container">
			<div class="bla mt-4">
				<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint, itaque tempora fuga earum explicabo ea
					consequatur
					nam pariatur aliquid corrupti reprehenderit optio ipsum nulla, quidem eum hic laborum facilis
					veritatis?
				</p>
				<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint, itaque tempora fuga earum explicabo ea
					consequatur
					nam pariatur aliquid corrupti reprehenderit optio ipsum nulla, quidem eum hic laborum facilis
					veritatis?
				</p>
				<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint, itaque tempora fuga earum explicabo ea
					consequatur
					nam pariatur aliquid corrupti reprehenderit optio ipsum nulla, quidem eum hic laborum facilis
					veritatis?
				</p>
				<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint, itaque tempora fuga earum explicabo ea
					consequatur
					nam pariatur aliquid corrupti reprehenderit optio ipsum nulla, quidem eum hic laborum facilis
					veritatis?
				</p>

			</div>
		</div>
	</section>
</div>

<?php
AbsView::render('layouts/footer.php');
?>