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
				<li class="dropdown quality-filter">
					<div class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Year<i class="fa fa-angle-down"></i></div>
					<ul class="dropdown-menu year ps-display">
					@foreach ($years as $year)
                    <li><a href="/years/{{ $year['field_year'] }}">{{ $year['field_year'] }}</a></li>
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
<li class="dropdown abc-filter">
	<div class="dropdown-toggle abc" data-toggle="dropdown"><i class="fa fa-sort-alpha-asc"></i></div>
	<ul class="dropdown-menu">
					<li class="abc"><a href="/letter/0">0</a></li>
					<li class="abc"><a href="/letter/1">1</a></li>
					<li class="abc"><a href="/letter/2">2</a></li>
					<li class="abc"><a href="/letter/3">3</a></li>
					<li class="abc"><a href="/letter/4">4</a></li>
					<li class="abc"><a href="/letter/5">5</a></li>
					<li class="abc"><a href="/letter/6">6</a></li>
					<li class="abc"><a href="/letter/7">7</a></li>
					<li class="abc"><a href="/letter/8">8</a></li>
					<li class="abc"><a href="/letter/9">9</a></li>
					<li class="abc"><a href="/letter/A">A</a></li>
					<li class="abc"><a href="/letter/B">B</a></li>
					<li class="abc"><a href="/letter/C">C</a></li>
					<li class="abc"><a href="/letter/D">D</a></li>
					<li class="abc"><a href="/letter/E">E</a></li>
					<li class="abc"><a href="/letter/F">F</a></li>
					<li class="abc"><a href="/letter/G">G</a></li>
					<li class="abc"><a href="/letter/H">H</a></li>
					<li class="abc"><a href="/letter/I">I</a></li>
					<li class="abc"><a href="/letter/J">J</a></li>
					<li class="abc"><a href="/letter/K">K</a></li>
					<li class="abc"><a href="/letter/L">L</a></li>
					<li class="abc"><a href="/letter/M">M</a></li>
					<li class="abc"><a href="/letter/N">N</a></li>
					<li class="abc"><a href="/letter/O">O</a></li>
					<li class="abc"><a href="/letter/P">P</a></li>
					<li class="abc"><a href="/letter/Q">Q</a></li>
					<li class="abc"><a href="/letter/R">R</a></li>
					<li class="abc"><a href="/letter/S">S</a></li>
					<li class="abc"><a href="/letter/T">T</a></li>
					<li class="abc"><a href="/letter/U">U</a></li>
					<li class="abc"><a href="/letter/V">V</a></li>
					<li class="abc"><a href="/letter/W">W</a></li>
					<li class="abc"><a href="/letter/X">X</a></li>
					<li class="abc"><a href="/letter/Y">Y</a></li>
					<li class="abc"><a href="/letter/Z">Z</a></li>
			</ul>
</li>

<li class="search"><form method="get" role="form" id="searchform" autocomplete="off" action="/search"><i class="fa fa-search"></i><input aria-label="Search..." id="search" name="s" type="search" class="search-input" value="" placeholder="Search..."></form><div class="live-search"></div></li>			</ul>
		</nav>
		<p id="slogan">Movies &amp; TV Shows On MoviesFlix.hair</p>
	</div>
</div>