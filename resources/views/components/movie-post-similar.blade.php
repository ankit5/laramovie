@php
    $url = ltrim($movie['view_node'], '/');
@endphp
<li id="post-70">
            <a href="/show/{{ $url }}">
              <img class="lazyfast" src="data:image/webp;base64,UklGRhoAAABXRUJQVlA4TA4AAAAv20BSAAcQEf0PRET/Aw==" data-src="{{ $movie['field_image_urls'] }}" alt="{{ $movie['title'] }}">
            </a>
          </li>