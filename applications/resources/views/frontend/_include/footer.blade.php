<div id="footer" class="setup-wrapper">
	<div class="setup-content lar-wd">
		<div class="bar bar-size-4">
			<div class="footer-wrapper">
				<div class="footer-content">
					<img id="footer-logo" src="{{ asset('amadeo/main-image/logo-sportopia.png') }}">
				</div>
			</div>
		</div>
		<div class="bar bar-size-4">
			<div class="footer-wrapper">
				<div class="footer-content">
					<p>SPORTOPIA</p>
					<p>@if($callKontak != null){!! $callKontak->alamat !!}@endif</p>
				</div>
			</div>
		</div>
		<div class="bar bar-size-4">
			<div class="footer-wrapper">
				<div class="footer-content">
				@if($callSosMed != null)
				@foreach($callSosMed as $list)
					<a href="{{ $list->link_url }}" title="{{ $list->nama_sosmed }}">
						<span class="fa-stack fa-lg">
						  <i class="fa fa-circle fa-stack-2x"></i>
						  <i class="fa fa-{{ str_slug($list->nama_sosmed, '-') }} fa-stack-1x"></i>
						</span>
					</a>
				@endforeach
				@endif
				</div>
			</div>
		</div>
		<div class="bar bar-size-4">
			<div class="footer-wrapper">
				<div class="footer-content">
					<p>© Copyright 2017 All Rights Reserved</p>
					<p>Web development by <a href="http://amadeo.id/"><img src="{{ asset('amadeo/main-image/logo-white-amadeo.png') }}" height="25px"></a></p>
				</div>
			</div>
		</div>
	</div>
</div>