<div id="dt_contenedor">
    <header id="header" class="main" style="opacity: 1;">
<div class="hbox">
<div class="fix-hidden">
<div class="logo"><a href="{{ $meta['site_url'] }}"><img src="/themes/custom/hdmovie2/asset/logo-2-1.webp" alt="Hdmovie2"></a></div>
<div class="head-main-nav">
  <div class="menu-header-container">
@include('templatesnew.primary_menu')
  </div>
</div>
</div>
</div>
</header>
<div class="fixheadresp">
<header class="responsive">
<div class="nav"><a class="aresp nav-resp"></a></div>
<div class="search"><a class="aresp search-resp"></a></div>
<div class="logo"> <a href="{{ $meta['site_url'] }}"><img src="/themes/custom/hdmovie2/asset/logo-2-1.webp" alt="Hdmovie2"></a> </div>
</header>
<div class="search_responsive">
<form id="form-search-resp" action="/search" class="searchact form-resp-ab">
<input type="text" placeholder="Search..." name="title" class="search-input2" id="story" value="" autocomplete="off">
<button class="search-button" type="button"><span class="fas fa-search"></span></button>
<div class="selection-ajax"></div>
</form>
</div>
<div id="arch-menu" class="menuresp">
<div class="menu">
<div class="menu-header-container">
@include('templatesnew.primary_menu')
</div>
</div>
</div>
</div>