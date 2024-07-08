@php
    $url = ltrim($movie['view_node'], '/');
    $url = str_replace("-watch-online-full-movie","-download-full-movie-and-wacth-online",$url);
@endphp
<div id="post-558" class="carousel-cell post-558 post type-post status-publish format-standard hentry">
		<a href="{{ route('movies.show', $url) }}" rel="bookmark">
			<span class="episodes">Eps<i>{{ $movie['field_eps'] }}</i></span>			<span class="item-tv">TV</span>		
        	<img class="carousel-cell-image" src="" data-flickity-lazyload="{{ $movie['field_image_urls'] }}" alt="{{ $movie['title'] }}">
			<span class="tt">{{ $movie['title'] }}</span>
		</a>
	</div>