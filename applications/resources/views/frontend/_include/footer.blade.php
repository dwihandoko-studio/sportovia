<div id="footer" class="setup-wrapper">
	<div class="setup-content lar-wd">
		<div class="bar bar-size-4">
			<div class="footer-wrapper">
				<div class="footer-content">
					<img id="footer-logo" src="{{ asset('amadeo/main-image/sportopia-logo-white.png') }}">
				</div>
			</div>
		</div>
		<div class="bar bar-size-4">
			<div class="footer-wrapper">
				<div class="footer-content">
					<p>SPORTOPIA</p>
					<p>{{ $callKontak->alamat }}</p>
				</div>
			</div>
		</div>
		<div class="bar bar-size-4">
			<div class="footer-wrapper">
				<div class="footer-content">
				@foreach($callSosMed as $list)
					<a href="{{ $list->link_url }}" title="{{ $list->nama_sosmed }}">
						<span class="fa-stack fa-lg">
						  <i class="fa fa-circle fa-stack-2x"></i>
						  <i class="fa fa-{{ str_slug($list->nama_sosmed, '-') }} fa-stack-1x"></i>
						</span>
					</a>
				@endforeach
				</div>
			</div>
		</div>
		<div class="bar bar-size-4">
			<div class="footer-wrapper">
				<div class="footer-content">
					<p>© Copyright 2017All Rights Reserved</p>
					<p>Web development by</p>
				</div>
			</div>
		</div>
	</div>
</div>