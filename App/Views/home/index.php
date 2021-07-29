<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>My_Shop</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/main.css">

	<script src="https://use.fontawesome.com/c3a0e750de.js"></script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
	

	<header class="header">
		<div class="name">
			<nav class="name navbar navbar-expand-md navbar-light bg-white ">
				<div class="container-fluid">
	
					
					<div class="med__s">
						<span>
							the best shop in the world
						</span>
					</div>
	
					<div class="header__logo ">
						<a href="/" class="">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-back"
								viewBox="0 0 16 16">
								<path
									d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2z" />
							</svg>
						</a>
					</div>
					<div class="med">
						<span class=""> the best shop in the world</span>
					</div>
	
				
					<div class="">
						<ul class="navbar-nav ml-auto ">
	
							<div class="name__enter">
	
								<li class="nav-item">
									<a class="nav-link" href="/login"><i class="fa fa-user-o" aria-hidden="true"></i></a>
								</li>
	
								<li class="nav-item dropdown">
									<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
										data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
									
										<span class="caret"></span>
									</a>
									
	
									<form id="logout-form" action="" method="POST" style="display: none;">
	
									</form>
	
								</li>
							</div>
						</ul>
					</div>
	
					<div class="d-flex justify-content-end">
						<li class="nav-item">
							<a class="nav-link" href=""><i class="fa fa-heart-o"
									aria-hidden="true"></i>
							</a>
						</li>
	
						<li class="nav-item">
							<a class="nav-link" href=""><i
									class="fa fa-shopping-cart" aria-hidden="true"></i>
							</a>
						</li>
	
					</div>
	
					<li class="nav-item">
						<a class="nav-link">
							<div class="header__burger">
								<span></span>
								<span></span>
								<span></span>
							</div>
						</a>
					</li>
				</div>
			</nav>
		</div>

		<div class="header__body">
			<nav class="header__menu">
		
				<div class="container">
					<ul class="header__list">

						<li class="header__link">
							<a class="header__link" href="/shop"> SHOP</a>
						</li>

						<li class="header__link">
							<a class="header__link" href="#">PAYMENT &
								DELIVERY
							</a>
						</li>

						<li class="header__link">
							<a class="header__link" href="">NEWS</a>
						</li>

						<li class="header__link">
							<a class="header__link" href="">About</a>
						</li>

						<li class=" header__link">
							<a class="header__link" href="">Contact</a>
						</li>


						<div class="header__enter">
							<li class="nav-item">
								<a class="header__link" href="/login"><i class="fa fa-user-o" aria-hidden="true"></i></a>
							</li>

							<li class="nav-item dropdown ml-2">
								<a id="navbarDropdown" class="header__link nav-link dropdown-toggle font-weight-bold" href="#"
									role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
								</a>
							</li>
						</div>
					</ul>
				</div>
			</nav>
		</div>
	</header>


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





	<script src="../js/script.js"></script>
</body>
</html>