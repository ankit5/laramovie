@extends('layouts.html')

@section('head')
@endsection

@section('script')
@endsection

@section('body_class')
home blog custom overview frontpage @endsection



@section('content')
@include('templates.header-secondery')
<section id="content" class="inner-container" style="padding-bottom: 30px!important;">
<div class="item-container">

<div class="app-heading">
<div class="text">Popular Movies</div>
</div>
<div class="carousel" data-flickity="{ &quot;autoPlay&quot;: true, &quot;wrapAround&quot;: true, &quot;resize&quot;: true, &quot;prevNextButtons&quot;: true, &quot;pageDots&quot;: false, &quot;lazyLoad&quot;: true, &quot;lazyLoad&quot;: 12, &quot;cellAlign&quot;: &quot;left&quot; }">
                @foreach ($popularMovies as $movie)
                    <x-movie-post :movie="$movie" />
                @endforeach
</div>

<div class="app-heading">
<div class="text">Latest Series</div>
<a href="/tv-series" class="all">View All</a>
</div>
<div class="carousel" data-flickity="{ &quot;autoPlay&quot;: true, &quot;wrapAround&quot;: true, &quot;resize&quot;: true, &quot;prevNextButtons&quot;: true, &quot;pageDots&quot;: false, &quot;lazyLoad&quot;: true, &quot;lazyLoad&quot;: 12, &quot;cellAlign&quot;: &quot;left&quot; }">
			
	@foreach ($tvshows as $movie)
                    <x-movie-post :movie="$movie" />
                @endforeach

</div>



<div class="app-heading">
<div class="text">Latest Movies</div>
<a href="/movies" class="all">View All</a>
</div>
<div class="carousel" data-flickity="{ &quot;autoPlay&quot;: true, &quot;wrapAround&quot;: true, &quot;resize&quot;: true, &quot;prevNextButtons&quot;: true, &quot;pageDots&quot;: false, &quot;lazyLoad&quot;: true, &quot;lazyLoad&quot;: 12, &quot;cellAlign&quot;: &quot;left&quot; }">

                @foreach ($latest as $movie)
                    <x-movie-post :movie="$movie" />
                @endforeach
</div>

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
<div class="text">Marvel Universe</div>
</div>
<div class="carousel" data-flickity="{ &quot;autoPlay&quot;: true, &quot;wrapAround&quot;: true, &quot;resize&quot;: true, &quot;prevNextButtons&quot;: true, &quot;pageDots&quot;: false, &quot;lazyLoad&quot;: true, &quot;lazyLoad&quot;: 12, &quot;cellAlign&quot;: &quot;left&quot; }">

                @foreach ($marvel as $movie)
                    <x-movie-post :movie="$movie" />
                @endforeach
</div>

@include('templates.collection')


</div>
</section>
@endsection