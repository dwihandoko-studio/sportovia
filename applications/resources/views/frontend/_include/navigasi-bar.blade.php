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
						<a class="btn btn-green" href="{{ Route('frontend.member.index') }}">
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
						@foreach($callNavKategori as $list)
						<li class="dropdown">
							<a class="" href="{{ Route('frontend.class.index', ['slug' => $list->slug]) }}">
								{{ $list->kategori_kelas }}
							</a>
							<div class="dropdown-wrapper class">
								<div class="dropdown-content">
									@php ($looping=1)
									@foreach($callNavClass as $sublist)
									@if($sublist->id_kelas_kategori == $list->id)
									@if($looping%2 != 0)
									<div class="link-wrapper">
									@endif
										<div class="link">
											<a href="{{ Route('frontend.class.view', ['slug' => $list->slug, 'subslug' => $sublist->slug]) }}">
												{{ Str::words($sublist->nama_kelas, 2, '') }}
											</a>
										</div>
									@if($looping%2 == 0)
									</div>
									@endif
									@php ($looping++)
									@endif
									@endforeach
								</div>
							</div>
						</li>
						@endforeach
						<li>
							<a class="{{ Route::is('frontend.news-event*') ? 'active' : '' }}" href="{{ Route('frontend.news-event.index') }}">
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