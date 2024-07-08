@php
    $url = ltrim($movie['view_node'], '/');
    $url = str_replace("-watch-online-full-movie","-download-full-movie-and-wacth-online",$url);
    $rating = explode("|",@$movie['field_metadata'])
@endphp
<div id="post-553" class="carousel-cell item normal front post-553 post type-post status-publish">
	<a href="{{ route('movies.show', $url) }}" rel="bookmark">
	@if(@$movie['field_eps'])
	<span class="episodes" style="display: inline;">Eps<i>{{ $movie['field_eps'] }}</i></span>
	@endif
	@if(@$movie['field_quality'])
	<span class="item-tv" style="display: inline;">{{ $movie['field_quality'] }}</span>
	@else
	<span class="item-tv" style="display: inline;">HD</span>
	@endif
	@if(@$rating[0])	
	<div class="imdb-rating"><i class="fa fa-star"></i>{{ $rating[0] }}</div>
	@endif

		<div class="item-flip">
			<div class="item-inner">
			<img class="lazyfast" loading="lazy" data-sizes="100w" src="data:image/webp;base64,UklGRhoAAABXRUJQVlA4TA4AAAAv20BSAAcQEf0PRET/Aw==" data-src="{{ $movie['field_image_urls'] }}" alt="{{ $movie['title'] }}">
		    
		</div>
			<div class="item-details">
				<div class="item-details-inner">
					<p class="movie-description">{!! html_entity_decode(@$movie['body']) !!}</p>
					<div class="watch-btn">
					@if(@$rating[2])
					    <div class="imdb-rating">{{ $rating[2] }}</div>
					@endif	
						<span class="movie-date">{{ @$movie['field_year'] }}</span>
						<span class="play">Play</span>
					</div>
				</div>
			</div>
			<div class="item-detail-bottom">
			 <h2 class="movie-title">{{ $movie['title'] }}</h2>
			</div>
		</div>
	</a>
</div>