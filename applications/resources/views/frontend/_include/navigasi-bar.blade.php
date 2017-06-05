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
						<a class="btn btn-green open-form-class" @if(Route::is('frontend.news-event.index') || Route::is('frontend.news-event.view')) style="display: none;" @endif>
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
		class="fre-tri-clas @if($errors->has('type') || $errors->has('name') || $errors->has('phone') || $errors->has('email') || $errors->has('class') || $errors->has('subject') || $errors->has('message') || Session::has('store_info')) active @endif"
	>
		<div id="freeTrialClass-wrapper">
			<div class="bar bar-size-2 left" style="background-image: url('{{ asset('amadeo/main-image/bg-iad.png') }}');">
				@if(Session::has('store_info'))
					<p class="info  @if($errors->has('type') || $errors->has('name') || $errors->has('phone') || $errors->has('email') || $errors->has('class') || $errors->has('subject') || $errors->has('message')) errors @endif">{{ Session::get('store_info') }}</p>
				@endif
				<form method="post" action="{{ route('frontend.store') }}">
					{{ csrf_field() }}
					<div class="input-group {{ $errors->has('type') ? 'error' : '' }}">
						<label>
							{{ $errors->has('type') ? $errors->first('type') : '' }}
						</label>
						<select class="form-control" name="type">
							@if(Route::is('frontend.news-event.index') || Route::is('frontend.news-event.view'))
							<option value="3" selected>Register Joint Event</option>
							@else
							<option value="" selected="" disabled>Choose Register or Free Trial</option>
							<option value="1"
								{{ old('type') == 1 ? 'selected="selected"' : '' }}
							>
								Free Trial	
							</option>
							<option value="2"
								{{ old('type') == 2 ? 'selected="selected"' : '' }}
							>
								Register
							</option>
							@endif
						</select>
					</div>
					<div class="input-group {{ $errors->has('name') ? 'error' : '' }}">
						<label>
							{{ $errors->has('name') ? $errors->first('name') : '' }}
						</label>
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
						<label>
							{{ $errors->has('phone') ? $errors->first('phone') : '' }}
						</label>
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
						<label>
							{{ $errors->has('email') ? $errors->first('email') : '' }}
						</label>
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
						<label>
							{{ $errors->has('class') ? $errors->first('class') : '' }}
						</label>
						<select class="form-control" name="class">
							@if(Route::is('frontend.news-event.index'))
							<option value="{{ $callEventNew->id }}" selected>{{ $callEventNew->judul }}</option>
							@elseif(Route::is('frontend.news-event.view'))
							<option value="{{ $call->id }}" selected>{{ $call->judul }}</option>
							@else
							<option value="" selected="" disabled>Choose Class</option>
							@foreach($callFreeTrialClass as $list)
							@if(Route::is('frontend.class.view'))
							@if($list->id == $callClass->id)
							<option 
								value="{{ $list->id }}"
								 {{ old('class') == $list->id ? 'selected="selected"' : '' }}
							>
								{{ $list->nama_kelas." (".$list->program_kelas.")" }}
							</option>
							@endif
							@else
							<option 
								value="{{ $list->id }}"
								 {{ old('class') == $list->id ? 'selected="selected"' : '' }}
							>
								{{ $list->nama_kelas." (".$list->program_kelas.")" }}
							</option>
							@endif
							@endforeach
							@endif
						</select>
					</div>
					<div class="input-group {{ $errors->has('subject') ? 'error' : '' }}">
						<label>
							{{ $errors->has('subject') ? $errors->first('subject') : '' }}
						</label>
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
						<label>
							{{ $errors->has('message') ? $errors->first('message') : '' }}
						</label>
						<textarea name="message" class="form-control" placeholder="Message" rows="3">{{ old('message') }}</textarea>
					</div>
					<button class="btn btn-green">Submit</button>
				</form>
			</div>
			<div class="bar bar-size-2 right" style="background-image: url('{{ asset('amadeo/main-image/popup.png') }}');">
				<i class="fa fa-times-circle-o close-form-class" aria-hidden="true"></i>
			</div>
		</div>
	</div>
</div>