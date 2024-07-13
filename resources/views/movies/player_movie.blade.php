<html lang="en-US"><head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="noindex,nofollow">
		
		<link rel="preconnect" href="//fonts.gstatic.com">
		<link rel="preconnect" href="//fonts.googleapis.com" crossorigin="">
        <link rel="preconnect" href="//fonts.gstatic.com" crossorigin="">
        <link rel="preconnect" href="//cdn.jsdelivr.net" crossorigin="">
        <link rel="preconnect" href="//image.tmdb.org">
		<link rel="stylesheet" id="color-css" href="{{ asset('wp-content/themes/moviewp/assets/css/red.css') }}" type="text/css" media="all">
		<link rel="stylesheet" as="style" href="//cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css" onload="this.rel='stylesheet'">
        <link rel="preload" href="//cdn.jsdelivr.net/npm/font-awesome@4.7.0/fonts/fontawesome-webfont.woff2?v=4.7.0" as="font" type="font/woff2" crossorigin="">
		<link rel="stylesheet" href="{{ asset('wp-content/themes/moviewp/assets/css/warez.css?gfhds') }}" type="text/css" media="all">
        <style>body {background-color: #000; color:#fff;font-family: 'Jost', sans-serif !important;}</style>
	</head>
	<body inject_video_svd="true">
		<div id="mainautoembed">
			<div id="backgroundautoembed" style="background-image: url('{{ $movie['field_poster_url'] }}');"></div>
			
			<div id="selectPlayer" class="ps-display">
			
				<div class="hostListSelector singleautoembed">
					<div class="hostList active">
						@if(@$movie['field_episodes'][0])
						@foreach($movie['field_episodes'] as $key=>$value)
						<div class="buttonLoadHost" data-load-id="{{ $movie['nid'] }}" data-load-tab="{{ $key }}"><i class="fa fa-play-circle"></i>
							<div class="t">Episode {{ $key+1 }}</div>
							<div class="s">Watch and Download</div>
						</div>
						@endforeach
						@elseif(@$movie['field_download_url'][1])
						@foreach($movie['field_download_url'] as $key=>$value)
						<div class="buttonLoadHost" data-load-id="{{ $movie['nid'] }}" data-load-tab="{{ $key }}"><i class="fa fa-play-circle"></i>
							<div class="t">Part {{ $key+1 }}</div>
							<div class="s">Watch and Download</div>
						</div>
						@endforeach
						@elseif(@$movie['field_download_url'][0])
						@foreach($movie['field_download_url'] as $key=>$value)
						<div class="buttonLoadHost" data-load-id="{{ $movie['nid'] }}" data-load-tab="{{ $key }}"><i class="fa fa-play-circle"></i>
							<div class="t">Server {{ $key+1 }}</div>
							<div class="s">Watch and Download</div>
						</div>
						@endforeach
						@elseif(@$movie['field_player'][0])
						<div class="buttonLoadHost" data-load-id="{{ $movie['nid'] }}" data-load-tab="{{ $key }}"><i class="fa fa-play-circle"></i>
							<div class="t">Server 1</div>
							<div class="s">Watch Now.</div>
						</div>
						@endif
									
						</div>
					</div>
				</div>
			</div>
			<div id="autoembed">
			</div>
	<script src="//cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="{{ asset('wp-content/themes/moviewp/assets/js/scrollbar.min.js') }}" id="scrollbar-js"></script>
	<script src="{{ asset('wp-content/themes/moviewp/assets/js/autoembed.js?ver=3.8.7') }}?asdf"></script>
	

	<div id="videoPopupMenu"></div></body></html>