@php
$rand = 'h34fgjf3';
@endphp
@if($page[0]==1)
<script type="text/javascript">
$(document).ready(function() {
swipercall('front-latest-block-5','front_latest','block_5');
});
</script>
<header><h2>Bollywood Movies</h2> 
<span><a href="/genre/bollywood" class="see-all">View more »</a></span>
</header>
<div class="swiper horizontal_scroll_swiper front-latest-block-5">
         <div class="items normal swiper-wrapper">      
         @foreach ($bollywood as $movie)
                    <x-movienew-post :movie="$movie" />
                @endforeach
         </div>
  <!-- scrollbar -->
    <div class="swiper-scrollbar"></div>

    <!-- buttons -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>



<script type="text/javascript">
$(document).ready(function() {
swipercall('front-latest-block-4','front_latest','block_4');
});
</script>

<header><h2>Web Series</h2> 
<span><a href="/genre/bollywood" class="see-all">View more »</a></span>
</header>
<div class="swiper horizontal_scroll_swiper front-latest-block-4">
         <div class="items normal swiper-wrapper">      
         @foreach ($bollywood as $movie)
                    <x-movienew-post :movie="$movie" />
                @endforeach
         </div>
  <!-- scrollbar -->
    <div class="swiper-scrollbar"></div>

    <!-- buttons -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>

<header><h2>Latest English Series</h2> 
<span><a href="/tv-series" class="see-all">View more »</a></span>
</header>
<div class="swiper horizontal_scroll_swiper">
         <div class="items normal swiper-wrapper">      
         @foreach ($tvshows as $movie)
                    <x-movienew-post :movie="$movie" />
                @endforeach
         </div>
  <!-- scrollbar -->
    <div class="swiper-scrollbar"></div>

    <!-- buttons -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>

<header><h2>Marvel Universe</h2> 
</header>
<div class="swiper horizontal_scroll_swiper">
         <div class="items normal swiper-wrapper">      
         @foreach ($marvel as $movie)
                    <x-movienew-post :movie="$movie" />
                @endforeach
         </div>
  <!-- scrollbar -->
    <div class="swiper-scrollbar"></div>

    <!-- buttons -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>






@include('templates.collection')
@endif
@if($page[0]==2)

<header><h2>Hollywood Hindi Dubbed</h2> 
<span><a href="/genre/dual-audio" class="see-all">View more »</a></span>
</header>
<div class="swiper horizontal_scroll_swiper ">
         <div class="items normal swiper-wrapper">      
         @foreach ($hindiDubbed as $movie)
                    <x-movienew-post :movie="$movie" />
                @endforeach
         </div>
  <!-- scrollbar -->
    <div class="swiper-scrollbar"></div>

    <!-- buttons -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>

<header><h2>South Hindi Dubbed</h2> 
<span><a href="/genre/south-special" class="see-all">View more »</a></span>
</header>
<div class="swiper horizontal_scroll_swiper ">
         <div class="items normal swiper-wrapper">      
         @foreach ($southDubbed as $movie)
                    <x-movienew-post :movie="$movie" />
                @endforeach
         </div>
  <!-- scrollbar -->
    <div class="swiper-scrollbar"></div>

    <!-- buttons -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>

<header><h2>Hot Shows</h2> 
<span><a href="/genre/hot-series" class="see-all">View more »</a></span>
</header>
<div class="swiper horizontal_scroll_swiper ">
         <div class="items normal swiper-wrapper">      
         @foreach ($hotSeries as $movie)
                    <x-movienew-post :movie="$movie" />
                @endforeach
         </div>
  <!-- scrollbar -->
    <div class="swiper-scrollbar"></div>

    <!-- buttons -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>



@endif
