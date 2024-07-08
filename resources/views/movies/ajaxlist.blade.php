@foreach ($latest as $movie)
                    <x-movie-post :movie="$movie" />
                @endforeach
