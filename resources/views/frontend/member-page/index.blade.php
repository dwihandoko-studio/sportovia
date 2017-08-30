@extends('frontend._layouts.basic')

@section('head-title')
<title>Sportopia - Member Area - My Area</title>
@endsection

@section('meta')
	<meta name="title" content="Member Area">
	<meta name="keywords" content="Sportopia, Sport, Art, Games, Education" />
@endsection

@section('head-style')
	<link rel="stylesheet" type="text/css" href="{{ asset(mix('amadeo/css/mix/member-index.css')) }}">
@endsection

@section('body-content')
	<?php // index and description wrapper ?>
	<div id="iad" class="setup-wrapper">
		<div class="setup-content lar-wd">
			<div id="index-wrapper">
				<label>
					<a href="{{ Route('frontend.home') }}">
						Home
					</a>
				</label>
				<label>
					<a href="{{ route('frontend.member.index') }}">
						Member Area
					</a>
				</label>
			</div>
			<h2>Member Area</h2>
			<div id="description-wrapper">
				<p>Lorem ipsum dolor sit amet, quas assum volutpat ei vix, usu semper laoreet placerat an. Assum recteque te has, ad quidam euripidis eloquentiam sed, equidem fierent phaedrum et sea. An legendos praesent quo. Sea cu dicta partem signiferumque.</p>
			</div>
		</div>
	</div>
	<?php // info wrapper ?>
	<div id="info" class="setup-wrapper">
		<div id="tabs-wrapper">
			<ul class="nav nav-tabs">
			    <li class="active">
			    	<a data-toggle="tab" href="#parents">Parents</a>
			    </li>
			    <li class="">
			    	<a data-toggle="tab" href="#child">Child</a>
			    </li>
			</ul>
		</div>
		<div class="setup-content lar-wd tab-content">
			<div id="parents" class="tab-pane fade in active">			
				@php ($oldMember = "")
				@foreach($call as $list)
				@if($oldMember != $list->kode_member)
				@php ($oldMember = $list->kode_member)
				@if($list->anak_member == null)
				<div class="info-wrapper reguler-class">
					<div class="bar bar-size-3">
						@if($list->img_member != null)
							<div class="img" style="background-image: url('{{ asset('amadeo/images/users/').'/'.$list->img_member }}');"></div>
						@else
							<div class="img" style="background-image: url('{{ asset('amadeo/images/users/userdefault.png') }}');"></div>
						@endif
					</div>
					<div class="bar bar-size-3">
						<div class="content">
							<h2>{{ $list->nama_member }}</h2>
							<table>
								<tr>
									<td>Code Member</td>
									<td>:</td>
									<td>{{ $list->kode_member }}</td>
								</tr>
								<tr>
									<td>Place of birth</td>
									<td>:</td>
									<td>{{ $list->tempat_lahir }}</td>
								</tr>
								<tr>
									<td>Date of birth</td>
									<td>:</td>
									<td>{{ $list->tanggal_lahir }}</td>
								</tr>
								<tr>
									<td>Address</td>
									<td>:</td>
									<td>{{ $list->alamat }}</td>
								</tr>
							</table>
							<table class="table">
								<tr>
									<td><label class="font-style">Class</label></td>
									<td><label class="font-style">Room</label></td>
									<td><label class="font-style">Schedule</label></td>
									<td></td>
								</tr>
								@foreach($call as $listNd)
								@if($listNd->kode_member == $list->kode_member)
								<tr>
									<td>
										{{ $listNd->nama_kelas }}
									</td>
									<td>
										{{ $listNd->nama_ruang }}
									</td>
									<td>
										{{ $listNd->hari.', '.$listNd->jam_mulai.' - '.$listNd->jam_akhir }}
									</td>
									<td>
										<a class="font-style" href="{{ route('frontend.member.view', ['slug'=>$listNd->id_jadwal]) }}">
											View
										</a>
									</td>
								</tr>
								@endif
								@endforeach
							</table>
						</div>
					</div>
					<div class="bar bar-size-3">
						<div class="content">
							<h2>Change Password</h2>
							@if(Session::has('info-password'))
								<p class="info">{{ Session::get('info-password') }}</p>
							@endif
							<form method="post" action="{{ route('frontend.member.changePassword') }}">
								{{ csrf_field() }}
						        <input type="hidden" name="id" value="{{ auth()->guard('user')->user()->id }}">
								<div class="input-group">
									<div class="input-group-cell label">
										<label>Email</label>
									</div>
									<div class="input-group-cell input">
										<label></label>
										<input
											name="email"
											type="text"
											class="form-control"
											value="{{ auth()->guard('user')->user()->email }}"
											readonly
										>
									</div>
								</div>
								<div class="input-group {{ $errors->has('old_password') ? 'error' : '' }}">
									<div class="input-group-cell label">
										<label>Old Password</label>
									</div>
									<div class="input-group-cell input">
										@if($errors->has('old_password'))
										<label class="info">
											{{ $errors->first('old_password') }}
										</label>
										@endif
										<input
											name="old_password"
											type="password"
											class="form-control"
											placeholder="Old Password"
										>
									</div>
								</div>
								<div class="input-group {{ $errors->has('new_password') ? 'error' : '' }}">
									<div class="input-group-cell label">
										<label>New Password</label>
									</div>
									<div class="input-group-cell input">
										@if($errors->has('new_password'))
										<label class="info">
											{{ $errors->first('new_password') }}
										</label>
										@endif
										<input
											name="new_password"
											type="password"
											class="form-control"
											placeholder="New Password"
										>
									</div>
								</div>
								<div class="input-group {{ $errors->has('confirm_password') ? 'error' : '' }}">
									<div class="input-group-cell label">
										<label>Confirm Password</label>
									</div>
									<div class="input-group-cell input">
										@if($errors->has('confirm_password'))
										<label class="info">
											{{ $errors->first('confirm_password')}}
										</label>
										@endif
										<input
											name="confirm_password"
											type="password"
											class="form-control"
											placeholder="Confirm Password"
										>
									</div>
								</div>
								
								<button class="btn btn-green">Submit</button>
							</form>
						</div>
					</div>
				</div>
				@endif
				@endif
				@endforeach
			</div>
			<div id="child" class="tab-pane fade">			
				@php ($oldMember = "")
				@foreach($call as $list)
				@if($oldMember != $list->kode_member)
				@php ($oldMember = $list->kode_member)
				@if($list->anak_member != null)
				<div class="info-wrapper">
					@if($list->img_member != null)
						<div class="img" style="background-image: url('{{ asset('amadeo/images/users/').'/'.$list->img_member }}');"></div>
					@else
						<div class="img" style="background-image: url('{{ asset('amadeo/images/users/userdefault.png') }}');"></div>
					@endif
					<div class="content">
						<h2>{{ $list->nama_member }}</h2>
						<table>
							<tr>
								<td>Code Member</td>
								<td>:</td>
								<td>{{ $list->kode_member }}</td>
							</tr>
							<tr>
								<td>Place of birth</td>
								<td>:</td>
								<td>{{ $list->tempat_lahir }}</td>
							</tr>
							<tr>
								<td>Date of birth</td>
								<td>:</td>
								<td>{{ $list->tanggal_lahir }}</td>
							</tr>
							<tr>
								<td>Address</td>
								<td>:</td>
								<td>{{ $list->alamat }}</td>
							</tr>
						</table>
						<table class="table">
							<tr>
								<td><label class="font-style">Class</label></td>
								<td><label class="font-style">Room</label></td>
								<td><label class="font-style">Schedule</label></td>
								<td></td>
							</tr>
							@foreach($call as $listNd)
							@if($listNd->kode_member == $list->kode_member)
							<tr>
								<td>
									{{ $listNd->nama_kelas }}
								</td>
								<td>
									{{ $listNd->nama_ruang }}
								</td>
								<td>
									{{ $listNd->hari.', '.$listNd->jam_mulai.' - '.$listNd->jam_akhir }}
								</td>
								<td>
									<a class="font-style" href="{{ route('frontend.member.view', ['slug'=>$listNd->id_jadwal]) }}">
										View
									</a>
								</td>
							</tr>
							@endif
							@endforeach
						</table>
					</div>
				</div>
				@endif
				@endif
				@endforeach
			</div>
		</div>
	</div>
@endsection

@section('footer-script')
	<script src="{{ asset(mix('amadeo/js/mix/default-public.js')) }}"></script>
@endsection
