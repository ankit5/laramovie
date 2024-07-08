<!DOCTYPE html><html lang="en-US"><head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=5.0">
<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">

	<!-- This site is optimized with the Yoast SEO plugin v22.5 - https://yoast.com/wordpress/plugins/seo/ -->
	<title>{{ ucfirst($meta['meta-title']) }}</title>
	<meta name="description" content="{{ $meta['description'] }}">
	<link rel="canonical" href="{{ $meta['canonical'] }}">
	<meta property="og:locale" content="en_US">
	<meta property="og:type" content="website">
	<meta property="og:title" content="{{ ucfirst($meta['og-title']) }}">
	<meta property="og:description" content="{{ $meta['description'] }}">
	<meta property="og:url" content="{{ $meta['url'] }}">
	<meta property="og:site_name" content="moviesFlix">
	<meta property="og:image" content="{{ @$meta['image'] }}">
	<meta property="og:image:width" content="1896">
	<meta property="og:image:height" content="2462">
	<meta property="og:image:type" content="image/jpeg">
	<meta name="twitter:card" content="summary_large_image">
	<!-- / Yoast SEO plugin. -->


<link rel="dns-prefetch" href="//cdn.jsdelivr.net">
<link rel="dns-prefetch" href="//image.tmdb.org">
<link rel="dns-prefetch" href="//images.metahub.space">

@php
$rand = 'h34kjf';
@endphp

<link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin="">
<link rel="preconnect" href="https://image.tmdb.org">
<link rel="preconnect" href="https://via.placeholder.com">
<link rel="preconnect" href="https://images.metahub.space">

<link rel="stylesheet" id="style-css" href="{{ asset('wp-content/themes/moviewp/style.css') }}?{{ $rand }}" type="text/css" media="all">
<link rel="stylesheet" id="color-css" href="{{ asset('wp-content/themes/moviewp/assets/css/red.css') }}?{{ $rand }}" type="text/css" media="all">
<link rel="stylesheet" id="flickity-css" href="{{ asset('wp-content/themes/moviewp/assets/css/flickity.css') }}?{{ $rand }}" type="text/css" media="all">
<link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500;600;700&amp;display=swap">
<style type="text/css">@font-face {font-family:Jost;font-style:normal;font-weight:100;src:url(cf-fonts/v/jost/5.0.16/latin-ext/wght/normal.woff2);unicode-range:U+0100-02AF,U+0304,U+0308,U+0329,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}@font-face {font-family:Jost;font-style:normal;font-weight:100;src:url(cf-fonts/v/jost/5.0.16/cyrillic/wght/normal.woff2);unicode-range:U+0301,U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116;font-display:swap;}@font-face {font-family:Jost;font-style:normal;font-weight:100;src:url(cf-fonts/v/jost/5.0.16/latin/wght/normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}@font-face {font-family:Jost;font-style:normal;font-weight:200;src:url(cf-fonts/v/jost/5.0.16/latin-ext/wght/normal.woff2);unicode-range:U+0100-02AF,U+0304,U+0308,U+0329,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}@font-face {font-family:Jost;font-style:normal;font-weight:200;src:url(cf-fonts/v/jost/5.0.16/latin/wght/normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}@font-face {font-family:Jost;font-style:normal;font-weight:200;src:url(cf-fonts/v/jost/5.0.16/cyrillic/wght/normal.woff2);unicode-range:U+0301,U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116;font-display:swap;}@font-face {font-family:Jost;font-style:normal;font-weight:300;src:url(cf-fonts/v/jost/5.0.16/latin-ext/wght/normal.woff2);unicode-range:U+0100-02AF,U+0304,U+0308,U+0329,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}@font-face {font-family:Jost;font-style:normal;font-weight:300;src:url(cf-fonts/v/jost/5.0.16/cyrillic/wght/normal.woff2);unicode-range:U+0301,U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116;font-display:swap;}@font-face {font-family:Jost;font-style:normal;font-weight:300;src:url(cf-fonts/v/jost/5.0.16/latin/wght/normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}@font-face {font-family:Jost;font-style:normal;font-weight:400;src:url(cf-fonts/v/jost/5.0.16/latin/wght/normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}@font-face {font-family:Jost;font-style:normal;font-weight:400;src:url(cf-fonts/v/jost/5.0.16/cyrillic/wght/normal.woff2);unicode-range:U+0301,U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116;font-display:swap;}@font-face {font-family:Jost;font-style:normal;font-weight:400;src:url(cf-fonts/v/jost/5.0.16/latin-ext/wght/normal.woff2);unicode-range:U+0100-02AF,U+0304,U+0308,U+0329,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}@font-face {font-family:Jost;font-style:normal;font-weight:500;src:url(cf-fonts/v/jost/5.0.16/latin-ext/wght/normal.woff2);unicode-range:U+0100-02AF,U+0304,U+0308,U+0329,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}@font-face {font-family:Jost;font-style:normal;font-weight:500;src:url(cf-fonts/v/jost/5.0.16/cyrillic/wght/normal.woff2);unicode-range:U+0301,U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116;font-display:swap;}@font-face {font-family:Jost;font-style:normal;font-weight:500;src:url(cf-fonts/v/jost/5.0.16/latin/wght/normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}@font-face {font-family:Jost;font-style:normal;font-weight:600;src:url(cf-fonts/v/jost/5.0.16/cyrillic/wght/normal.woff2);unicode-range:U+0301,U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116;font-display:swap;}@font-face {font-family:Jost;font-style:normal;font-weight:600;src:url(cf-fonts/v/jost/5.0.16/latin/wght/normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}@font-face {font-family:Jost;font-style:normal;font-weight:600;src:url(cf-fonts/v/jost/5.0.16/latin-ext/wght/normal.woff2);unicode-range:U+0100-02AF,U+0304,U+0308,U+0329,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}@font-face {font-family:Jost;font-style:normal;font-weight:700;src:url(cf-fonts/v/jost/5.0.16/cyrillic/wght/normal.woff2);unicode-range:U+0301,U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116;font-display:swap;}@font-face {font-family:Jost;font-style:normal;font-weight:700;src:url(cf-fonts/v/jost/5.0.16/latin-ext/wght/normal.woff2);unicode-range:U+0100-02AF,U+0304,U+0308,U+0329,U+1E00-1E9F,U+1EF2-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;font-display:swap;}@font-face {font-family:Jost;font-style:normal;font-weight:700;src:url(cf-fonts/v/jost/5.0.16/latin/wght/normal.woff2);unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;font-display:swap;}</style>
<link rel="preload" as="style" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css" onload="this.rel='stylesheet'">
<link rel="preload" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/fonts/fontawesome-webfont.woff2?v=4.7.0" as="font" type="font/woff2" crossorigin="">
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js?ver=3.5.1" id="jquery-js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@17.3.1/dist/lazyload.min.js?ver=17.3.1" id="lazyload-js"></script>
<link rel="icon" href="{{ asset('wp-content/uploads/2023/01/cropped-fav-32x32.png') }}" sizes="32x32">
<link rel="icon" href="{{ asset('wp-content/uploads/2023/01/cropped-fav-192x192.png') }}" sizes="192x192">
<link rel="apple-touch-icon" href="{{ asset('wp-content/uploads/2023/01/cropped-fav-180x180.png') }}">
<meta name="msapplication-TileImage" content="https://moviewp.com/wp-content/uploads/2023/01/cropped-fav-270x270.png">


@yield('head')


<style type="text/css" id="wp-custom-css">
			.outer_container {
    max-width: 100%;
}
.info_bottom_text a {
    color: rgb(229 9 20 / 90%);
}.app-heading .all:hover {
    color: #fff;
}
html {
    height: 100%;
    background: #080809 linear-gradient(to bottom, #cfcfcf, #080808) no-repeat;
    box-sizing: border-box;
    background-attachment: fixed;
}

.iframe-container {
  overflow: hidden;
  padding-top: 56.25%;
  position: relative;
}
.iframe-container iframe {
  border: 0;
  height: 100%;
  left: 0;
  position: absolute;
  top: 0;
  width: 100%;
}

ul#a-z li.current {
    background: #e50914;
}

.mobile-nav.ps-container > .ps-scrollbar-y-rail {
   display:none !important;
}		</style>
		</head>
<body id="body" class="@yield('body_class')">
@include('templates.sidebar-left')

<div id="site-container" class="site-content">
	<main id="main" role="main">
		

@include('templates.header')

@yield('content')


</main><!-- #main -->
</div><!-- #site-container -->
@yield('script')
<script type="text/javascript" src="{{ asset('wp-content/themes/moviewp/assets/js/script.min.js') }}?{{ $rand }}" id="script-js"></script>
<script type="text/javascript" src="{{ asset('wp-content/themes/moviewp/assets/js/scrollbar.min.js') }}?{{ $rand }}" id="scrollbar-js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/flickity@2.3.0/dist/flickity.pkgd.min.js?ver=2.3.0" id="flickity-js"></script>
<script type="text/javascript" src="{{ asset('wp-content/themes/moviewp/assets/js/vendor.js') }}?{{ $rand }}" id="vendor-js"></script>


</body></html><!-- WP Fastest Cache file was created in 2.9637959003448 seconds, on 27-04-24 17:01:24 -->