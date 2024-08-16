@php
    $url = ltrim($movie['view_node'], '/');
    $url = str_replace("-watch-online-full-movie","-download-full-movie-and-wacth-online",$url);
    $rating = explode("|",@$movie['field_metadata'])
@endphp
<article class="item movies swiper-slide" id="">
<div class="poster">
<img data-src="{{ $movie['field_image_urls'] }}" src="" class="lazy thumb mli-thumb" alt="{{ $movie['title'] }}">
<div class="rating">
	 @if(@$rating[0])
	 {{ $rating[0] }}
     @endif
</div>
<div class="mepo"> 

                  <span class="quality">HD</span>
                    
				  @if(@$movie['field_eps'])
                 <span class="quality">Eps<i>{{ $movie['field_eps'] }}</i></span>
				 @endif
</div>
<a href="{{ $url }}">
<div class="see play4"></div>
</a>
</div>
<div class="data dfeatur">
<h3><a href="{{ $url }}">{{ $movie['title'] }}</a></h3>
</div>
</article>