<div id="nav">
	<div id="nav-wrapper">
		<div id="nav-content">
			<div id="left">
				<div class="nav-content-wrapper">
					<a href="{{ Route('frontend.home') }}">
						<img id="nav-logo" src="{{ asset('amadeo/main-image/sportopia-logo-color.png') }}">
					</a>
				</div>
			</div>
			<div id="right">
				<div class="nav-content-wrapper">
					<div>
						<a class="btn btn-green" href="">
							Free Trial Class
						</a>
						<a class="btn btn-green" href="">
							Login
						</a>
					</div>
					<ul id="list">
						<li class="dropdown">
							<a class="{{ Route::is('frontend.about*') ? 'active' : '' }}">
								About
							</a>
							<div class="dropdown-wrapper">
								<div class="dropdown-content">
									<div class="link-wrapper">
										<div class="link">
											<a href="{{ Route('frontend.about.us') }}">
												About Us
											</a>
										</div>
										<div class="link">
											<a href="{{ Route('frontend.about.staff') }}">
												Our Staff
											</a>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="dropdown">
							<a class="{{ Route::is('frontend.sport*') ? 'active' : '' }}" href="{{ Route('frontend.sport.index') }}">
								Sport
							</a>
							<div class="dropdown-wrapper">
								<div class="dropdown-content">
									@for($a=0; $a<=2; $a++)
									<div class="link-wrapper">
										<div class="link">
											<a href="">
												Aikido
											</a>
										</div>
										<div class="link">
											<a href="">
												Taekwondo
											</a>
										</div>
									</div>
									@endfor
								</div>
							</div>
						</li>
						<li class="dropdown">
							<a class="{{ Route::is('frontend.art*') ? 'active' : '' }}" href="{{ Route('frontend.art.index') }}">
								Art
							</a>
							<div class="dropdown-wrapper">
								<div class="dropdown-content">
									@for($a=0; $a<=3; $a++)
									<div class="link-wrapper">
										<div class="link">
											<a href="">
												Aikido
											</a>
										</div>
										<div class="link">
											<a href="">
												Taekwondo
											</a>
										</div>
									</div>
									@endfor
								</div>
							</div>
						</li>
						<li class="dropdown">
							<a class="{{ Route::is('frontend.education*') ? 'active' : '' }}" href="{{ Route('frontend.education.index') }}">
								Education
							</a>
							<div class="dropdown-wrapper">
								<div class="dropdown-content">
									@for($a=0; $a<=3; $a++)
									<div class="link-wrapper">
										<div class="link">
											<a href="">
												Aikido
											</a>
										</div>
										<div class="link">
											<a href="">
												Taekwondo
											</a>
										</div>
									</div>
									@endfor
								</div>
							</div>
						</li>
						<li class="dropdown">
							<a href="">
								Games
							</a>
							<div class="dropdown-wrapper">
								<div class="dropdown-content">
									@for($a=0; $a<=5; $a++)
									<div class="link-wrapper">
										<div class="link">
											<a href="">
												Aikido
											</a>
										</div>
										<div class="link">
											<a href="">
												Taekwondo
											</a>
										</div>
									</div>
									@endfor
								</div>
							</div>
						</li>
						<li>
							<a href="">
								News & Event
							</a>
						</li>
						<li>
							<a class="{{ Route::is('frontend.contact*') ? 'active' : '' }}" href="{{ Route('frontend.contact') }}">
								Contact
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<div id="space-nav">
</div>