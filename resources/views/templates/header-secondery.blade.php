<div id="header-secondary">
	<div class="inner-container">
		<nav class="filters">
			<ul>
				<li class="dropdown genre-filter">
					<div class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Genre<i class="fa fa-angle-down"></i></div>
					<ul class="dropdown-menu dropdown-menu-large ps-display">
					@foreach ($genres as $genre)
                    <li class="cat-item cat-item-4"><a href="{{ $genre['view_taxonomy_term'] }}">{{ $genre['name']}} ({{ $genre['count']}})</a></li> 
                    @endforeach

					</ul>
				</li>
				<li class="dropdown genre-filter">
					<div class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Hot Movies<i class="fa fa-angle-down"></i></div>
					<ul class="dropdown-menu dropdown-menu-large ps-display">
					<li id="menu-item-406300" class="menu-item menu-item-level-2 menu-item-406300">
    <a href="/director/besharams-originals/">Besharams</a>
  </li>
  <li id="menu-item-406299" class="menu-item menu-item-level-2 menu-item-406299">
    <a href="/director/primeplay-originals/">PrimePlay</a>
  </li>
  <li id="menu-item-406298" class="menu-item menu-item-level-2 menu-item-406298">
    <a href="/director/voovi-originals/">VooVi</a>
  </li>
  <li id="menu-item-406297" class="menu-item menu-item-level-2 menu-item-406297">
    <a href="/director/moodx-originals/">MoodX</a>
  </li>
  <li id="menu-item-406295" class="menu-item menu-item-level-2 menu-item-406295">
    <a href="/director/hunters-originals/">Hunters</a>
  </li>
  <li id="menu-item-209006" class="menu-item menu-item-level-2 menu-item-209006">
    <a href="/director/uncut">Uncut</a>
  </li>
  <li id="menu-item-99911" class="menu-item menu-item-level-2 menu-item-99911">
    <a href="/director/fliz-movies/">Fliz Movies</a>
  </li>
  <li id="menu-item-190471" class="menu-item menu-item-level-2 menu-item-190471">
    <a href="/director/nuefliks-exclusive/">Nuefliks</a>
  </li>
  <li id="menu-item-99932" class="menu-item menu-item-level-2 menu-item-99932">
    <a href="/director/hotshots/">Hotshots</a>
  </li>
  <li id="menu-item-99912" class="menu-item menu-item-level-2 menu-item-99912">
    <a href="/director/ullu">Ullu Originals</a>
  </li>
  <li id="menu-item-402434" class="menu-item menu-item-level-2 menu-item-402434">
    <a href="/director/hunters-originals/">Hunters</a>
  </li>
  <li id="menu-item-402435" class="menu-item menu-item-level-2 menu-item-402435">
    <a href="/director/moodx-originals/">MoodX</a>
  </li>
  <li id="menu-item-402436" class="menu-item menu-item-level-2 menu-item-402436">
    <a href="/director/voovi-originals/">VooVi</a>
  </li>
  <li id="menu-item-402437" class="menu-item menu-item-level-2 menu-item-402437">
    <a href="/director/primeplay-originals/">PrimePlay</a>
  </li>
  <li id="menu-item-402438" class="menu-item menu-item-level-2 menu-item-402438">
    <a href="/director/besharams-originals/">Besharams</a>
  </li>
  <li id="menu-item-101650" class="menu-item menu-item-level-2 menu-item-101650">
    <a href="/director/kooku-originals/">Kooku</a>
  </li>
  <li id="menu-item-105513" class="menu-item menu-item-level-2 menu-item-105513">
    <a href="/director/gupchup-exclusive/">Gupchup</a>
  </li>
  <li id="menu-item-101649" class="menu-item menu-item-level-2 menu-item-101649">
    <a href="/director/feneomovies/">Feneomovies</a>
  </li>
  <li id="menu-item-101648" class="menu-item menu-item-level-2 menu-item-101648">
    <a href="/director/cinemadosti/">Cinemadosti</a>
  </li>
  <li id="menu-item-106277" class="menu-item menu-item-level-2 menu-item-106277">
    <a href="/director/primeflix/">Primeflix</a>
  </li>
  <li id="menu-item-141568" class="menu-item menu-item-level-2 menu-item-141568">
    <a href="/director/gemplex/">Gemplex</a>
  </li>
  <li id="menu-item-190467" class="menu-item menu-item-level-2 menu-item-190467">
    <a href="/director/rabbit-original/">Rabbit</a>
  </li>
  <li id="menu-item-190468" class="menu-item menu-item-level-2 menu-item-190468">
    <a href="/director/hotmasti-originals/">HotMasti</a>
  </li>
  <li id="menu-item-190469" class="menu-item menu-item-level-2 menu-item-190469">
    <a href="/director/boommovies-original/">BoomMovies</a>
  </li>
  <li id="menu-item-190470" class="menu-item menu-item-level-2 menu-item-190470">
    <a href="/director/cliff-movies/">CliffMovies</a>
  </li>
  <li id="menu-item-190472" class="menu-item menu-item-level-2 menu-item-190472">
    <a href="/director/masti-prime-originals/">MastiPrime</a>
  </li>
  <li id="menu-item-190473" class="menu-item menu-item-level-2 menu-item-190473">
    <a href="/director/ek-night-show/">Ek Night Show</a>
  </li>
  <li id="menu-item-190474" class="menu-item menu-item-level-2 menu-item-190474">
    <a href="/director/flixsksmovies/">Flixsksmovies</a>
  </li>
  <li id="menu-item-190475" class="menu-item menu-item-level-2 menu-item-190475">
    <a href="/director/lootlo-original/">Lootlo</a>
  </li>
  <li id="menu-item-190476" class="menu-item menu-item-level-2 menu-item-190476">
    <a href="/director/hootzy-channel/">Hootzy</a>
  </li>
  <li id="menu-item-190477" class="menu-item menu-item-level-2 menu-item-190477">
    <a href="/director/balloons-originals/">Balloons</a>
  </li>
  <li id="menu-item-190478" class="menu-item menu-item-level-2 menu-item-190478">
    <a href="/director/big-movie-zoo-originals/">Big Movie Zoo</a>
  </li>
  <li id="menu-item-190479" class="menu-item menu-item-level-2 menu-item-190479">
    <a href="/director/bambooflix/">Bambooflix</a>
  </li>
  <li id="menu-item-190480" class="menu-item menu-item-level-2 menu-item-190480">
    <a href="/director/piliflix-originals/">Piliflix</a>
  </li>
  <li id="menu-item-190481" class="menu-item menu-item-level-2 menu-item-190481">
    <a href="/director/11upmovies-originals/">11upmovies</a>
  </li>
  <li id="menu-item-190482" class="menu-item menu-item-level-2 menu-item-190482">
    <a href="/director/eightshots-originals/">Eightshots</a>
  </li>
  <li id="menu-item-190483" class="menu-item menu-item-level-2 menu-item-190483">
    <a href="/director/i-entertainment-exclusive/">I-Entertainment</a>
  </li>
  <li id="menu-item-190484" class="menu-item menu-item-level-2 menu-item-190484">
    <a href="/director/hotprime-originals/">Hotprime</a>
  </li>
  <li id="menu-item-190485" class="menu-item menu-item-level-2 menu-item-190485">
    <a href="/director/banana-prime/">BananaPrime</a>
  </li>
  <li id="menu-item-190488" class="menu-item menu-item-level-2 menu-item-190488">
    <a href="/director/hothitfilms/">HotHitFilms</a>
  </li>
  <li id="menu-item-190487" class="menu-item menu-item-level-2 menu-item-190487">
    <a href="/director/chikooflix-originals">Chikooflix</a>
  </li>
  <li id="menu-item-101652" class="menu-item menu-item-level-2 menu-item-101652">
    <a href="/director/lamheart">Glamheart</a>
  </li>
  <li id="menu-item-190486" class="menu-item menu-item-level-2 menu-item-190486">
    <a href="/director/worldprime-originals/">Worldprime</a>
  </li>

					</ul>
				</li>
				<li class="dropdown quality-filter">
					<div class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Year<i class="fa fa-angle-down"></i></div>
					<ul class="dropdown-menu year ps-display">
					@foreach ($years as $year)
                    <li><a href="/release-year/{{ $year['field_year'] }}">{{ $year['field_year'] }}</a></li>
                    @endforeach
					</ul>
				</li>
				<li class="dropdown quality-filter">
					<div class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Country<i class="fa fa-angle-down"></i></div>
					<ul class="dropdown-menu country ps-display">
					<li>
  <a href="/country/usa">USA</a>
</li>
<li>
  <a href="/country/india">India</a>
</li>
<li>
  <a href="/country/china">China</a>
</li>
<li>
  <a href="/country/Canada">Canada</a>
</li>
<li>
  <a href="/country/united-states">United States</a>
</li>
<li>
  <a href="/country/france">France</a>
</li>
<li>
  <a href="/country/pakistan">Pakistan</a>
</li>
<li>
  <a href="/country/australia">Australia</a>
</li>
<li>
  <a href="/country/uk">UK</a>
</li>
<li>
  <a href="/country/japan">Japan</a>
</li>
<li>
  <a href="/country/united-kingdom">United Kingdom</a>
</li>
<li>
  <a href="/country/south-korea">South Korea</a>
</li>
<li>
  <a href="/country/ireland">Ireland</a>
</li>
<li>
  <a href="/country/belgium">Belgium</a>
</li>
<li>
  <a href="/country/germany">Germany</a>
</li>
<li>
  <a href="/country/russia">Russia</a>
</li>
<li>
  <a href="/country/italy">Italy</a>
</li>
<li>
  <a href="/country/hong-kong">Hong kong</a>
</li>
					</ul>
				</li>
								
<li class="dropdown sortby" style="display:none;">
	<form method="get" action="" class="filter-form">
		<select name="order" class="custom-select category-filter dropdown-toggle" data-toggle="dropdown" tabindex="-2" aria-label="select_sortby" id="select_sortby">
			<option value="date-desc">Sort by</option>
			<option value="rating">Rating</option>
						<option value="views">Views</option>
									<option value="like">Like</option>
									<option value="random">Random</option>
			<option value="years-asc">Date ↓</option>
			<option value="years-desc">Date ↑</option>
			<option value="title-asc">Title →</option>
			<option value="title-desc">Title ←</option>
		</select>
	</form>
</li>

<li class="search"><form method="get" role="form" id="searchform" autocomplete="off" action="/search"><i class="fa fa-search"></i><input aria-label="Search..." id="search" name="s" type="search" class="search-input" value="" placeholder="Search..."></form><div class="live-search"></div></li>			</ul>
		</nav>
		<p id="slogan">Plz Use Hdmovie2 new domain <a href="https://hdmovie2.wiki/">Hdmovie2.wiki</a></p>
	</div>
</div>