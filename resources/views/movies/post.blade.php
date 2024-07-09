@extends('layouts.html')

@section('head')
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('wp-content/themes/moviewp/assets/js/modal.js?dfg') }}" id="modal-js"></script>
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
            <a class="blue" rel="modal" data-modal-type="iframe" href="{{ $meta['url'] }}?player_movie=1">
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
        @foreach ($latest as $movie)
                    <x-movie-post-similar :movie="$movie" />
                @endforeach
          
          
        </ul>
      </section>
      <!-- .similar -->
      
    </div>
   
  </section>
</article>
<!-- #post-552 -->
@endsection