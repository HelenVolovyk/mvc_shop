<header class="header">
	<div class="name">
		<nav class="name navbar navbar-expand-md navbar-light bg-white ">
			<div class="container-fluid">


				<div class="med__s">
					<span>
						<!-- the best shop in the world -->
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
					<!-- <span class=""> the best shop in the world </span> -->
				</div>


				<div class="">
					<ul class="navbar-nav ml-auto ">

						<div class="name__enter">




							<?php if (!Framework\Authentication\Authentication::isAuth()): ?>
							<li class="nav-item">
								<a class="nav-link" href="/login"><i class="fa fa-user-o" aria-hidden="true"></i></a>
							</li>
							<?php endif?>


							<?php if (Framework\Authentication\Authentication::isAuth()): ?>
							<ul class="navbar-nav float-right">
								<li class="nav-item dropdown active">
									<a class="nav-link" href="/user/profile"><?php echo  $_SESSION['user_data']['name'];?></a>
								</li>
								<!-- 


								<li class="nav-item">
									<a class="nav-link" href="/logout/"><svg xmlns="http://www.w3.org/2000/svg" width="16"
											height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
											<path fill-rule="evenodd"
												d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
											<path fill-rule="evenodd"
												d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
										</svg></a>
								</li> -->


							</ul>


							<?php endif; ?>


						</div>
					</ul>
				</div>

				<div class="d-flex justify-content-end">
					<!-- <li class="nav-item">
						<a class="nav-link" href=""><i class="fa fa-heart-o" aria-hidden="true"></i>
						</a>
					</li> -->

					<li class="nav-item">
						<div class="nav-link cart">
							<div class="">
								<a class="nav-link" href="/cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> </a>
							</div>
							<div class="">

								<span
									class="badge badge-pill badge-secondary"><?php echo App\Models\Cart::countItems();?></span>
							</div>
						</div>
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
						<a class="header__link" href="/products"> SHOP</a>
					</li>

					<li class="header__link">
						<a class="header__link" href="/payment">PAYMENT &
							DELIVERY
						</a>
					</li>

					<li class="header__link">
						<a class="header__link" href="/news">NEWS</a>
					</li>

					<li class="header__link">
						<a class="header__link" href="/about">About</a>
					</li>

					<li class=" header__link">
						<a class="header__link" href="/contact">Contact</a>
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