@extends('layouts.html')

@section('head')
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('wp-content/themes/moviewp/assets/js/modal.js?ver=3.8.8') }}" id="modal-js"></script>
<script type="text/javascript" src="https://static.addtoany.com/menu/page.js?ver=6.4.3" id="addtoany-js"></script>
@endsection

@section('body_class')
post-template-default single single-post postid-552 single-format-standard custom detail
@endsection

@section('content')
<article id="post-552" class="post-552 post type-post status-publish format-standard hentry category-action">
  <section id="content">
    <div itemscope="itemscope" itemtype="http://schema.org/Movie" class="inner-container">
      <meta itemprop="url" content="{{ $meta['url'] }}" />
      <meta itemprop="datePublished" content="2024-03-27T02:57:59+00:00" />
      <div class="movie-image">
        <span class='favorite'>
          <i data-content='Favorite' id='552' class='fa fa-heart-o'></i>
        </span>
        <img itemprop="image" class="noad" src="{{ $movie['field_image_urls'] }}" alt="{{ $movie['title'] }}">
      </div>
      <div class="movie-info">
        <span class="rating">
          
      @if(@$movie['field_right']['IMDb'])
        @php
        $rate = @$movie['field_right']['IMDb'];
        $rate_v = str_replace('.','',round(@$movie['field_right']['IMDb'],'1'));
        $rate_name = 'IMDb';
        @endphp
      @endif
        @if(@$movie['field_right']['TMDb'])
               @php
               $rate = round(@$movie['field_right']['TMDb'],'1');
               $rate_v = str_replace('.','',round(@$movie['field_right']['TMDb'],'1'));
               $rate_name = 'TMDb';
               @endphp
           @endif

              
          <div class="progress progress-circle" data-percentage="{{ @$rate_v }}">
            <span class="progress-left">
              <span class="progress-bar progress-"></span>
            </span>
            <span class="progress-right">
              <span class="progress-bar progress-"></span>
            </span>
            <span class="progress-value">{{ @$rate }}</span>
          </div>
        </span>
        <h1 itemprop="name" class="entry-title">{{ $movie['title'] }}</h1>
        <em class="tagline"></em>
        <div itemscope itemprop="aggregateRating" itemtype="http://schema.org/AggregateRating">
          <meta itemprop="bestRating" content="10" />
          <meta itemprop="worstRating" content="1" />
          <meta itemprop="ratingValue" content="{{ @$rate }}" />
          <meta itemprop="ratingCount" content="35" />
        </div>
        <div class="movie-data">
          <div class="details">
            <span itemprop='contentRating' id='Rated'>{{$rate_name}}</span>
            <span>
              <a href="/years/{{ @$movie['field_year'] }}/" rel="tag">{{ @$movie['field_year'] }}</a>
            </span>
            <span itemprop="genre">
              @foreach($movie['tags'] as $tag)
                  <a href="{{ $tag['slug'] }}">{{ $tag['name'] }}</a>, 
              @endforeach

            </span>
            <span itemprop="duration">{{ @$movie['field_right']['Duration'] }}</span>
          </div>
        </div>
        <p class="movie-description">
          <span itemprop="description" class="trama">{!! html_entity_decode(@$movie['body']) !!} <br />
           </span>
           <br>
        <div class="left">
          
          @if(@$movie['field_left']['Director'])
          @php
            $Director = explode(",",$movie['field_left']['Director']);
          @endphp
          <strong>Director: </strong>
          @foreach($Director as $value)
          <span itemprop="director" itemscope="itemscope" itemtype="http://schema.org/Person">
            <span itemprop="name">
              <a href="/director/{{ Str::slug($value) }}/" rel="tag">{{ $value }}</a>,
            </span>
          </span>
          
          @endforeach
          <br>
          @endif
          
          @if(@$movie['field_left']['Actors'])
          @php
            $Actors = explode(",",$movie['field_left']['Actors']);
          @endphp
          <strong>Actors: </strong>
          @foreach($Actors as $value)
          <span itemprop="director" itemscope="itemscope" itemtype="http://schema.org/Person">
            <span itemprop="name">
              <a href="/actor/{{ Str::slug($value) }}/" rel="tag">{{ $value }}</a>,
            </span>
          </span>
          @endforeach
          <br>
          @endif
          
          @if(@$movie['field_left']['Country'])
          @php
            $Country = explode(",",$movie['field_left']['Country']);
          @endphp
          <strong>Country: </strong>
          @foreach($Country as $value)
          <span itemprop="director" itemscope="itemscope" itemtype="http://schema.org/Person">
            <span itemprop="name">
              <a href="/country/{{ Str::slug($value) }}/" rel="tag">{{ $value }}</a>,
            </span>
          </span>
          @endforeach
          <br>
          @endif
          
          @if(@$movie['field_right']['Country'])
          @php
            $Country = explode(",",$movie['field_right']['Country']);
          @endphp
          <strong>Country: </strong>
          @foreach($Country as $value)
          <span itemprop="director" itemscope="itemscope" itemtype="http://schema.org/Person">
            <span itemprop="name">
              <a href="/country/{{ Str::slug($value) }}/" rel="tag">{{ $value }}</a>,
            </span>
          </span>
          @endforeach
          <br>
          @endif

          @if(@$movie['field_right']['Networks'])
          <strong>Networks: </strong>
          <span itemprop="director" itemscope="itemscope" itemtype="http://schema.org/Person">
            <span itemprop="name">
              <a href="/networks/{{ Str::slug($movie['field_right']['Networks']) }}/" rel="tag">{{ $movie['field_right']['Networks'] }}</a>
            </span>
          </span>
          <br>
          @endif
          
          @if(@$movie['field_right']['Quality'])
          <strong>Quality: </strong>
          <span>{{ $movie['field_right']['Quality'] }}</span>
          <br>
          @endif
        </div>
        </p>
      </div>
      <div class="movie-actions">
        <ul class="extra">
        @if(@$movie['field_view'])
          <li id="views">
            <i class="fa fa-eye"></i>
            <span>{{ $movie['field_view'] }} Views</span>
          </li>
        @endif
          <li id="share">
            <a id="hover" class="a2a_dd" href="#">
              <i style="padding-right:15px;" class="fa fa-retweet"></i>
              <span>Share</span>
            </a>
          </li>
          @if(@$movie['field_trailer'])
          <li id="trailer">
            <a id="hover" href="{{ @$movie['field_trailer'] }}" rel="modal" data-modal-type="iframe">
              <i class="fa fa-youtube-play"></i>
              <span>Trailer</span>
            </a>
          </li>
          @endif
          <li id="multiplayer">
            <a class="blue" rel="modal" data-modal-type="iframe" href="{{ $meta['url'] }}?player_movie=1&embed=true">
              <i class="fa fa-window-restore"></i>
              <span>Watch & Download</span>
            </a>
          </li>
        </ul>
        <ul></ul>
      </div>
      <section class="similar">
        <h4>You might also like..</h4>
        <ul>
          <li id="post-70">
            <a href="https://moviewp.com/me-myself-irene/">
              <img class="lazy" src="data:image/webp;base64,UklGRhoAAABXRUJQVlA4TA4AAAAv20BSAAcQEf0PRET/Aw==" data-src="https://image.tmdb.org/t/p/w220_and_h330_face/rvRrcbLbpn7UJGRH1JupgHOeJFq.jpg" alt="Me, Myself &#038; Irene">
            </a>
          </li>
          <!-- #post-70 -->
          <li id="post-534">
            <a href="https://moviewp.com/the-green-mile/">
              <img class="lazy" src="data:image/webp;base64,UklGRhoAAABXRUJQVlA4TA4AAAAv20BSAAcQEf0PRET/Aw==" data-src="https://image.tmdb.org/t/p/w220_and_h330_face/o0lO84GI7qrG6XFvtsPOSV7CTNa.jpg" alt="The Green Mile">
            </a>
          </li>
          <!-- #post-534 -->
          <li id="post-151">
            <a href="https://moviewp.com/rocky-v/">
              <img class="lazy" src="data:image/webp;base64,UklGRhoAAABXRUJQVlA4TA4AAAAv20BSAAcQEf0PRET/Aw==" data-src="https://image.tmdb.org/t/p/w220_and_h330_face/qCARerjCFZOEeLiVdomhwRYlDSn.jpg" alt="Rocky V">
            </a>
          </li>
          <!-- #post-151 -->
          <li id="post-260">
            <a href="https://moviewp.com/godzilla-the-planet-eater/">
              <img class="lazy" src="data:image/webp;base64,UklGRhoAAABXRUJQVlA4TA4AAAAv20BSAAcQEf0PRET/Aw==" data-src="https://image.tmdb.org/t/p/w220_and_h330_face/fOA44BITFth0u4hMSOUgpK0kM6t.jpg" alt="Godzilla: The Planet Eater">
            </a>
          </li>
          <!-- #post-260 -->
          <li id="post-272">
            <a href="https://moviewp.com/the-matrix-resurrections/">
              <img class="lazy" src="data:image/webp;base64,UklGRhoAAABXRUJQVlA4TA4AAAAv20BSAAcQEf0PRET/Aw==" data-src="https://image.tmdb.org/t/p/w220_and_h330_face/8c4a8kE7PizaGQQnditMmI1xbRp.jpg" alt="The Matrix Resurrections">
            </a>
          </li>
          <!-- #post-272 -->
          <li id="post-323">
            <a href="https://moviewp.com/prey/">
              <img class="lazy" src="data:image/webp;base64,UklGRhoAAABXRUJQVlA4TA4AAAAv20BSAAcQEf0PRET/Aw==" data-src="https://image.tmdb.org/t/p/w220_and_h330_face/ujr5pztc1oitbe7ViMUOilFaJ7s.jpg" alt="Prey">
            </a>
          </li>
          <!-- #post-323 -->
          <li id="post-154">
            <a href="https://moviewp.com/terminator-salvation/">
              <img class="lazy" src="data:image/webp;base64,UklGRhoAAABXRUJQVlA4TA4AAAAv20BSAAcQEf0PRET/Aw==" data-src="https://image.tmdb.org/t/p/w220_and_h330_face/gw6JhlekZgtKUFlDTezq3j5JEPK.jpg" alt="Terminator Salvation">
            </a>
          </li>
          <!-- #post-154 -->
          <li id="post-254">
            <a href="https://moviewp.com/uncharted/">
              <img class="lazy" src="data:image/webp;base64,UklGRhoAAABXRUJQVlA4TA4AAAAv20BSAAcQEf0PRET/Aw==" data-src="https://image.tmdb.org/t/p/w220_and_h330_face/rJHC1RUORuUhtfNb4Npclx0xnOf.jpg" alt="Uncharted">
            </a>
          </li>
          <!-- #post-254 -->
          <li id="post-476">
            <a href="https://moviewp.com/chupa/">
              <img class="lazy" src="data:image/webp;base64,UklGRhoAAABXRUJQVlA4TA4AAAAv20BSAAcQEf0PRET/Aw==" data-src="https://image.tmdb.org/t/p/w220_and_h330_face/ra3xm8KFAkwK0CdbPRkfYADJYTB.jpg" alt="Chupa">
            </a>
          </li>
          <!-- #post-476 -->
          <li id="post-187">
            <a href="https://moviewp.com/minions/">
              <img class="lazy" src="data:image/webp;base64,UklGRhoAAABXRUJQVlA4TA4AAAAv20BSAAcQEf0PRET/Aw==" data-src="https://image.tmdb.org/t/p/w220_and_h330_face/vlOgaxUiMOA8sPDG9n3VhQabnEi.jpg" alt="Minions">
            </a>
          </li>
          <!-- #post-187 -->
        </ul>
      </section>
      <!-- .similar -->
      <div id="disqus_thread"></div>
    </div>
    <div id="slideshow"></div>
  </section>
</article>
<!-- #post-552 -->
@endsection