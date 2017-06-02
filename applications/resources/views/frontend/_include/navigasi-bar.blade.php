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
						<a class="btn btn-green open-fre-tri-clas">
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
	<div 
		id="freeTrialClass" 
		class="fre-tri-clas @if($errors->has('name') || $errors->has('phone') || $errors->has('email') || $errors->has('class') || $errors->has('subject') || $errors->has('message')) active @endif"
	>
		<div id="freeTrialClass-wrapper">
			<div class="bar bar-size-2 left" style="background-image: url('{{ asset('amadeo/main-image/bg-iad.png') }}');">
				<form method="post" action="{{ route('frontend.store.classFT') }}">
					{{ csrf_field() }}
					<div class="input-group {{ $errors->has('name') ? 'error' : '' }}">
						<input 
							type="text" 
							name="name" 
							class="form-control" 
							placeholder="Name"
							value="{{ old('name') }}"
						>
						<span class="input-group-addon">
							<i class="fa fa-users" aria-hidden="true"></i>
						</span>
					</div>
					<div class="input-group {{ $errors->has('phone') ? 'error' : '' }}">
						<input 
							type="phone" 
							name="phone" 
							class="form-control" 
							placeholder="Phone"
							value="{{ old('phone') }}"
						>
						<span class="input-group-addon">
							<i class="fa fa-phone" aria-hidden="true" style="font-size: 17px;"></i>
						</span>
					</div>
					<div class="input-group {{ $errors->has('email') ? 'error' : '' }}">
						<input 
							type="email" 
							name="email" 
							class="form-control" 
							placeholder="Email Address"
							value="{{ old('email') }}"
						>
						<span class="input-group-addon">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
					<div class="input-group {{ $errors->has('class') ? 'error' : '' }}">
						<select class="form-control" name="class">
							<option value="" selected="" disabled>Choose Class</option>
							@foreach($callFreeTrialClass as $list)
							<option 
								value="{{ $list->id }}"
								 {{ old('class') == $list->id ? 'selected="selected"' : '' }}
							>
								{{ $list->nama_kelas." (".$list->program_kelas.")" }}
							</option>
							@endforeach
						</select>
					</div>
					<div class="input-group {{ $errors->has('subject') ? 'error' : '' }}">
						<input 
							type="text" 
							name="subject" 
							class="form-control" 
							placeholder="Subject"
							value="{{ old('subject') }}"
						>
						<span class="input-group-addon">
							<i class="fa fa-question" aria-hidden="true"></i>
						</span>
					</div>
					<div class="input-group {{ $errors->has('message') ? 'error' : '' }}">
						<textarea name="message" class="form-control" placeholder="Message" rows="3">{{ old('message') }}</textarea>
					</div>
					<button class="btn btn-green">Submit</button>
				</form>
			</div>
			<div class="bar bar-size-2 right" style="background-image: url('{{ asset('amadeo/main-image/popup.png') }}');">
				<i class="fa fa-times-circle-o open-fre-tri-clas"" aria-hidden="true"></i>
			</div>
		</div>
	</div>
</div>