@extends('layouts.html')

@section('head')
@endsection

@section('script')
@endsection

@section('body_class')
genre blog custom overview
@endsection



@section('content')
@include('templates.header-secondery')
<section id="content" class="inner-container" style="padding-bottom: 30px!important;">

@if(@$network[0])
@include('templates.network')
@endif

@if(@$network_english[0])
@include('templates.network-english')
@endif

@if(@$collection[0])
@include('templates.collection-all')

@endif

@if(@$pager['total_results'])
<div class="item-container loadmore">
<div class="app-heading">
<div class="text">{{ ucfirst($meta['title']) }} : Total {{ @$pager['total_results'] }}</div>
</div>
               @foreach ($latest as $movie)
                    <x-movie-post :movie="$movie" />
                @endforeach
                
</div>
<div class="loader2"></div>
</section>
@endif
@endsection