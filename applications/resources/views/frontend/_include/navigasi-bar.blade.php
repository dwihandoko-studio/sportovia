<div id="nav">
	<div id="nav-wrapper">
		<div id="nav-content">
			<div id="left">
				<div class="nav-content-wrapper">
					<a href="{{ Route('frontend.home') }}">
						<img id="nav-logo" src="{{ asset('amadeo/main-image/logo-sportopia.png') }}">
					</a>
				</div>
			</div>
			<div id="right">
				<div class="nav-content-wrapper">
					<div>
						<a class="btn btn-green open-form-class" <?php /* @if(Route::is('frontend.news-event.index') || Route::is('frontend.news-event.view')) style="display: none;" @endif */ ?>>
							Free Trial Class
						</a>
						@if(empty(auth()->guard('user')->id()))
						<a class="btn btn-green" href="{{ Route('frontend.member.log-in') }}">
							Login
						</a>
						@else
						<a class="btn btn-green" href="{{ Route('frontend.member.index') }}">
							My Area
						</a>
				        <a class="btn btn-green" href="{{ Route('frontend.member.log-out') }}">
							Logout
						</a>
						@endif
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
						@if($callNavKategori != null)
						@foreach($callNavKategori as $list)
						<li class="dropdown">
							<a 
								@if(Route::is('frontend.class*'))
								@if($callKategori->slug == $list->slug)
								class="active"
								@endif
								@endif
								href="{{ Route('frontend.class.index', ['slug' => $list->slug]) }}"
							>
								{{ $list->kategori_kelas }}
							</a>
							<div class="dropdown-wrapper class">
								<div class="dropdown-content">
									@if($callNavClass != null)
									@php 
										$looping=1;
										$lenArr = count($callNavClass);
									@endphp
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
									@if($looping == $lenArr)
									@if($looping%2 != 0)
									</div>
									@endif
									@endif

									@php ($looping++)
									@endif
									@endforeach
									@endif
								</div>
							</div>
						</li>
						@endforeach
						@endif
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
		class="fre-tri-clas @if($errors->has('store_type') || $errors->has('store_name') || $errors->has('store_phone') || $errors->has('store_email') || $errors->has('store_class') || $errors->has('store_subject') || $errors->has('store_message') || Session::has('store_info')) active @endif"
	>
		<div id="freeTrialClass-wrapper">
			<div class="bar bar-size-2 left" style="background-image: url('{{ asset('amadeo/main-image/bg-iad.png') }}');">
				@if(Session::has('store_info'))
					<p class="info  @if($errors->has('store_type') || $errors->has('store_name') || $errors->has('store_phone') || $errors->has('store_email') || $errors->has('store_class') || $errors->has('store_subject') || $errors->has('store_message')) errors @endif">{{ Session::get('store_info') }}</p>
				@endif
				<form method="post" action="{{ route('frontend.store') }}">
					{{ csrf_field() }}
					<div class="input-group {{ $errors->has('store_type') ? 'error' : '' }}">
						<label>
							{{ $errors->has('store_type') ? $errors->first('store_type') : '' }}
						</label>
						<select class="form-control" name="store_type">
							<?php /*
							@if(Route::is('frontend.news-event.index') || Route::is('frontend.news-event.view'))
							<option value="3" selected>Register Joint Event</option>
							@else
							*/ ?>
							<option value="" selected="" disabled>Choose Register or Free Trial</option>
							<option value="1"
								{{ old('store_type') == 1 ? 'selected="selected"' : '' }}
							>
								Free Trial	
							</option>
							<option value="2"
								{{ old('store_type') == 2 ? 'selected="selected"' : '' }}
							>
								Register
							</option>
							<?php /* @endif */ ?>
						</select>
					</div>
					<div class="input-group {{ $errors->has('store_name') ? 'error' : '' }}">
						<label>
							{{ $errors->has('store_name') ? $errors->first('store_name') : '' }}
						</label>
						<input 
							type="text" 
							name="store_name" 
							class="form-control" 
							placeholder="Name"
							@if(!empty(auth()->guard('user')->id()))
							value="{{ auth()->guard('user')->user()->name }}"
							readonly
							@else
							value="{{ old('store_name') }}"
							@endif
						>
						<span class="input-group-addon">
							<i class="fa fa-users" aria-hidden="true"></i>
						</span>
					</div>
					<div class="input-group {{ $errors->has('store_phone') ? 'error' : '' }}">
						<label>
							{{ $errors->has('store_phone') ? $errors->first('store_phone') : '' }}
						</label>
						<input 
							type="phone" 
							name="store_phone" 
							class="form-control" 
							placeholder="Phone"
							value="{{ old('store_phone') }}"
						>
						<span class="input-group-addon">
							<i class="fa fa-phone" aria-hidden="true" style="font-size: 17px;"></i>
						</span>
					</div>
					<div class="input-group {{ $errors->has('store_email') ? 'error' : '' }}">
						<label>
							{{ $errors->has('store_email') ? $errors->first('store_email') : '' }}
						</label>
						<input 
							type="email" 
							name="store_email" 
							class="form-control" 
							placeholder="Email Address"
							@if(!empty(auth()->guard('user')->id()))
							value="{{ auth()->guard('user')->user()->email }}"
							readonly
							@else
							value="{{ old('store_email') }}"
							@endif
						>
						<span class="input-group-addon">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
					<div class="input-group {{ $errors->has('store_class') ? 'error' : '' }}">
						<label>
							{{ $errors->has('store_class') ? $errors->first('store_class') : '' }}
						</label>
						<select class="form-control" name="store_class">
							<?php /* 
							@if(Route::is('frontend.news-event.index'))
							<option value="{{ $callEventNew->id }}" selected>{{ $callEventNew->judul }}</option>
							@elseif(Route::is('frontend.news-event.view'))
							<option value="{{ $call->id }}" selected>{{ $call->judul }}</option>
							@else
							*/ ?>
							<option value="" selected="" disabled>Choose Class</option>
							@if($callFreeTrialClass != null)
							@foreach($callFreeTrialClass as $list)
							@if(Route::is('frontend.class.view'))
							@if($list->id == $callClass->id)
							<option 
								value="{{ $list->id }}"
								 {{ old('store_class') == $list->id ? 'selected="selected"' : '' }}
							>
								{{ $list->nama_kelas." (".$list->program_kelas.")" }}
							</option>
							@endif
							@else
							<option 
								value="{{ $list->id }}"
								 {{ old('store_class') == $list->id ? 'selected="selected"' : '' }}
							>
								{{ $list->nama_kelas." (".$list->program_kelas.")" }}
							</option>
							@endif
							@endforeach
							@endif
							<?php /*  @endif */ ?>
						</select>
					</div>
					<div class="input-group {{ $errors->has('store_subject') ? 'error' : '' }}">
						<label>
							{{ $errors->has('store_subject') ? $errors->first('store_subject') : '' }}
						</label>
						<input 
							type="text" 
							name="store_subject" 
							class="form-control" 
							placeholder="Subject"
							value="{{ old('subject') }}"
						>
						<span class="input-group-addon">
							<i class="fa fa-question" aria-hidden="true"></i>
						</span>
					</div>
					<div class="input-group {{ $errors->has('store_message') ? 'error' : '' }}">
						<label>
							{{ $errors->has('store_message') ? $errors->first('store_message') : '' }}
						</label>
						<textarea name="store_message" class="form-control" placeholder="Message" rows="3">{{ old('store_message') }}</textarea>
					</div>
					<button class="btn btn-green">Submit</button>
				</form>
			</div>
			<div class="bar bar-size-2 right" @if($callAdv != null) style="background-image: url('{{ asset('amadeo/images/ads/'.$callAdv->img_url) }}');" title="{{ $callAdv->ads_judul }}" @endif>
				<i class="fa fa-times-circle-o close-form-class" aria-hidden="true"></i>
			</div>
		</div>
	</div>
</div>