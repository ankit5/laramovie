@extends('layouts.htmlnew')

@section('head')
@endsection

@section('script')
@endsection

@section('body_class')
home blog custom overview frontpage @endsection



@section('content')

<script type="text/javascript">
$(document).ready(function() {
swipercall('featured-movies','featured_movies','block_1');
});
</script>
<header><h2>Featured Movie -Hdmovie2</h2> </header>
<div class="swiper horizontal_scroll_swiper featured-movies">
         <div class="items normal swiper-wrapper">      
         @foreach ($popularMovies as $movie)
                    <x-movienew-post :movie="$movie" />
                @endforeach
         </div>
  <!-- scrollbar -->
    <div class="swiper-scrollbar"></div>

    <!-- buttons -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>

<header><h2>Popular Series -Hdmovie2</h2> </header>
<div class="swiper horizontal_scroll_swiper featured-movies2">
         <div class="items normal swiper-wrapper">      
         @foreach ($popularSeries as $movie)
                    <x-movienew-post :movie="$movie" />
                @endforeach
         </div>
  <!-- scrollbar -->
    <div class="swiper-scrollbar"></div>

    <!-- buttons -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>

<header>
<h2 class="ml-title">Latest Uploaded Movies -Hdmovie2</h2>
<span><a href="/films" class="see-all">44,155 View more »</a></span>
</header>
<div class="items normal loadmore">
         @foreach ($latest as $movie)
                    <x-movienew-post :movie="$movie" />
                @endforeach
</div>
<a href="javascript:void(0)" id="loadmore">Load More</a>
<div class="loader2"></div>

<div class="load_blocks"></div>
@endsection