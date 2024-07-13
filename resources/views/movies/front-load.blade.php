@php
$rand = 'h34fgjf3';
@endphp
@if($page[0]==1)
<div class="app-heading">
<div class="text">Bollywood Movies</div>
<a href="/genre/bollywood" class="all">View All</a>
</div>
<div class="carousel" data-flickity="{ &quot;autoPlay&quot;: true, &quot;wrapAround&quot;: true, &quot;resize&quot;: true, &quot;prevNextButtons&quot;: true, &quot;pageDots&quot;: false, &quot;lazyLoad&quot;: true, &quot;lazyLoad&quot;: 12, &quot;cellAlign&quot;: &quot;left&quot; }">

                @foreach ($bollywood as $movie)
                    <x-movie-post :movie="$movie" />
                @endforeach
</div>


<div class="app-heading">
<div class="text">Latest English Series</div>
<a href="/tv-series" class="all">View All</a>
</div>
<div class="carousel" data-flickity="{ &quot;autoPlay&quot;: true, &quot;wrapAround&quot;: true, &quot;resize&quot;: true, &quot;prevNextButtons&quot;: true, &quot;pageDots&quot;: false, &quot;lazyLoad&quot;: true, &quot;lazyLoad&quot;: 12, &quot;cellAlign&quot;: &quot;left&quot; }">
			
	@foreach ($tvshows as $movie)
                    <x-movie-post :movie="$movie" />
                @endforeach

</div>

<div class="app-heading">
<div class="text">Marvel Universe</div>
</div>
<div class="carousel" data-flickity="{ &quot;autoPlay&quot;: true, &quot;wrapAround&quot;: true, &quot;resize&quot;: true, &quot;prevNextButtons&quot;: true, &quot;pageDots&quot;: false, &quot;lazyLoad&quot;: true, &quot;lazyLoad&quot;: 12, &quot;cellAlign&quot;: &quot;left&quot; }">

                @foreach ($marvel as $movie)
                    <x-movie-post :movie="$movie" />
                @endforeach
</div>

@include('templates.collection')
@endif
@if($page[0]==2)


<div class="app-heading">
<div class="text">Hollywood Hindi Dubbed</div>
<a href="/genre/dual-audio" class="all">View All</a>
</div>
<div class="carousel" data-flickity="{ &quot;autoPlay&quot;: true, &quot;wrapAround&quot;: true, &quot;resize&quot;: true, &quot;prevNextButtons&quot;: true, &quot;pageDots&quot;: false, &quot;lazyLoad&quot;: true, &quot;lazyLoad&quot;: 12, &quot;cellAlign&quot;: &quot;left&quot; }">
			
	@foreach ($hindiDubbed as $movie)
                    <x-movie-post :movie="$movie" />
                @endforeach

</div>

<div class="app-heading">
<div class="text">South Hindi Dubbed</div>
<a href="/genre/south-special" class="all">View All</a>
</div>
<div class="carousel" data-flickity="{ &quot;autoPlay&quot;: true, &quot;wrapAround&quot;: true, &quot;resize&quot;: true, &quot;prevNextButtons&quot;: true, &quot;pageDots&quot;: false, &quot;lazyLoad&quot;: true, &quot;lazyLoad&quot;: 12, &quot;cellAlign&quot;: &quot;left&quot; }">

                @foreach ($southDubbed as $movie)
                    <x-movie-post :movie="$movie" />
                @endforeach
</div>


<div class="app-heading">
<div class="text">Hot Shows</div>
<a href="/genre/hot-series" class="all">View All</a>
</div>
<div class="carousel" data-flickity="{ &quot;autoPlay&quot;: true, &quot;wrapAround&quot;: true, &quot;resize&quot;: true, &quot;prevNextButtons&quot;: true, &quot;pageDots&quot;: false, &quot;lazyLoad&quot;: true, &quot;lazyLoad&quot;: 12, &quot;cellAlign&quot;: &quot;left&quot; }">

                @foreach ($hotSeries as $movie)
                    <x-movie-post :movie="$movie" />
                @endforeach
</div>
@endif

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/flickity@2.3.0/dist/flickity.pkgd.min.js?ver=2.3.0" id="flickity-js"></script>
