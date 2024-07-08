<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $latest = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/films')
            ->json();

        $tvshows = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/films?field_url_value=series&tag_id_not[]=106')
        ->json();
        $bollywood = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/films?tag_id=86')
        ->json();
        $popularMovies = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/featured-movies')
        ->json();

        $genresResponse = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/tags')
        ->json();

        $years = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/years')
        ->json();
        $pager = isset($latest['pager']) ? $latest['pager'] : [];
        $latest = isset($latest['results']) ? $latest['results'] : [];
        $popularMovies = isset($popularMovies['results']) ? $popularMovies['results'] : [];
        $tvshows = isset($tvshows['results']) ? $tvshows['results'] : [];
        $bollywood = isset($bollywood['results']) ? $bollywood['results'] : [];
        $genres = isset($genresResponse['results']) ? $genresResponse['results'] : [];
        $years = isset($years['results']) ? $years['results'] : [];
        $meta['meta-title']='Movieflix';
        $meta['description']='Movieflix';
        $meta['og-title']='Movieflix';
        $meta['canonical']='Movieflix';
        $meta['url']=URL::current();
        $meta['image']=asset('wp-content/uploads/2023/01/moviewp_3.8.8.jpg');

        // $viewModel = new MoviesViewModel(
        //     $popularMovies,
        //     $nowPlayingMovies,
        //     $genres
        // );

        return view('movies.front', compact('meta','latest','years','popularMovies','tvshows','bollywood','genres','pager'));
    }

    public function tag($tag)
    {   
       // $tag = str_replace('-',' ',$tag);
       // $tag = str_replace('amp',' & ',$tag);
        //print $tag;
        $tag_detail = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/term_detail?alias=/genre/'.$tag)
            ->json();
        
        $tag_detail = isset($tag_detail['results']) ? $tag_detail['results'] : [];
        $latest = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/allfilms?tag_id='.@$tag_detail[0]['tid'].'&page='.@$_REQUEST['page'])
            ->json();
            $pager = isset($latest['pager']) ? $latest['pager'] : [];
        $latest = isset($latest['results']) ? $latest['results'] : [];

        if(@$_REQUEST['ajax']==1){
            return view('movies.ajaxlist', compact('latest'));
        }

        $genresResponse = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/tags')
        ->json();

        $years = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/years')
        ->json();
        
       // $latest = isset($latest['results']) ? $latest['results'] : [];
        $genres = isset($genresResponse['results']) ? $genresResponse['results'] : [];
        $years = isset($years['results']) ? $years['results'] : [];
        $meta['meta-title']=@$tag_detail[0]['name'];
        $meta['title']=@$tag_detail[0]['name'];
        $meta['description']='Movieflix';
        $meta['og-title']='Movieflix';
        $meta['canonical']='Movieflix';
        $meta['url']=URL::current();
        $meta['image']=asset('wp-content/uploads/2023/01/moviewp_3.8.8.jpg');

        // $viewModel = new MoviesViewModel(
        //     $popularMovies,
        //     $nowPlayingMovies,
        //     $genres
        // );
        $network =[];
        if($tag=='web-series'){
            $network[0]=1; 
        }

        return view('movies.page', compact('network','meta','latest','tag_detail','years','genres','pager'));
    }

    public function movies()
    {   
        
        $latest = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/allfilms?field_url_value_not=/series&tag_id_not[]=113&tag_id_not[]=106&tag_id_not[]=91&page='.@$_REQUEST['page'])
            ->json();
            $pager = isset($latest['pager']) ? $latest['pager'] : [];
        $latest = isset($latest['results']) ? $latest['results'] : [];

        if(@$_REQUEST['ajax']==1){
            return view('movies.ajaxlist', compact('latest'));
        }

        $genresResponse = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/tags')
        ->json();

        $years = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/years')
        ->json();
        
       // $latest = isset($latest['results']) ? $latest['results'] : [];
        $genres = isset($genresResponse['results']) ? $genresResponse['results'] : [];
        $years = isset($years['results']) ? $years['results'] : [];
        $meta['meta-title']='Latest Movies';
        $meta['title']='All Movies';
        $meta['description']='Movieflix';
        $meta['og-title']='Movieflix';
        $meta['canonical']='Movieflix';
        $meta['url']=URL::current();
        $meta['image']=asset('wp-content/uploads/2023/01/moviewp_3.8.8.jpg');

        // $viewModel = new MoviesViewModel(
        //     $popularMovies,
        //     $nowPlayingMovies,
        //     $genres
        // );

        return view('movies.page', compact('meta','latest','years','genres','pager'));
    }

    public function letter($letter)
    {   
        
        $latest = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/allfilms?start_with='.$letter.'&page='.@$_REQUEST['page'])
            ->json();
            $pager = isset($latest['pager']) ? $latest['pager'] : [];
        $latest = isset($latest['results']) ? $latest['results'] : [];

        if(@$_REQUEST['ajax']==1){
            return view('movies.ajaxlist', compact('latest'));
        }

        $genresResponse = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/tags')
        ->json();

        $years = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/years')
        ->json();
        
       // $latest = isset($latest['results']) ? $latest['results'] : [];
        $genres = isset($genresResponse['results']) ? $genresResponse['results'] : [];
        $years = isset($years['results']) ? $years['results'] : [];
        $meta['meta-title']='Latter '.$letter.' Movies & Shows';
        $meta['title']='Latter '.$letter.' Movies & Shows';
        $meta['description']='Movieflix';
        $meta['og-title']='Movieflix';
        $meta['canonical']='Movieflix';
        $meta['url']=URL::current();
        $meta['image']=asset('wp-content/uploads/2023/01/moviewp_3.8.8.jpg');

        return view('movies.page', compact('meta','latest','years','genres','pager'));
    }

    public function collection_search($collection)
    {   
        $collection = str_replace("-",' ',$collection);
        $collection = str_replace(" collection",'',$collection);
        $latest = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/allfilms?title_contain_all='.$collection.'&page='.@$_REQUEST['page'])
            ->json();
            $pager = isset($latest['pager']) ? $latest['pager'] : [];
        $latest = isset($latest['results']) ? $latest['results'] : [];

        if(@$_REQUEST['ajax']==1){
            return view('movies.ajaxlist', compact('latest'));
        }

        $genresResponse = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/tags')
        ->json();

        $years = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/years')
        ->json();
        
       // $latest = isset($latest['results']) ? $latest['results'] : [];
        $genres = isset($genresResponse['results']) ? $genresResponse['results'] : [];
        $years = isset($years['results']) ? $years['results'] : [];
        $meta['meta-title']=$collection.' Collections';
        $meta['title']=$collection.' Collections';
        $meta['description']='Movieflix';
        $meta['og-title']='Movieflix';
        $meta['canonical']='Movieflix';
        $meta['url']=URL::current();
        $meta['image']=asset('wp-content/uploads/2023/01/moviewp_3.8.8.jpg');

        return view('movies.page', compact('meta','latest','years','genres','pager'));
    }


    public function networks()
    {   
        
        

        $genresResponse = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/tags')
        ->json();

        $years = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/years')
        ->json();
        
       // $latest = isset($latest['results']) ? $latest['results'] : [];
        $genres = isset($genresResponse['results']) ? $genresResponse['results'] : [];
        $years = isset($years['results']) ? $years['results'] : [];
        $meta['meta-title']='Networks';
        $meta['title']='Networks';
        $meta['description']='Movieflix';
        $meta['og-title']='Movieflix';
        $meta['canonical']='Movieflix';
        $meta['url']=URL::current();
        $meta['image']=asset('wp-content/uploads/2023/01/moviewp_3.8.8.jpg');
        $network[0]=1; 
        $network_english[0]=1; 
        return view('movies.page', compact('network','network_english','meta','years','genres'));
    }

    public function collection()
    {   
        
        

        $genresResponse = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/tags')
        ->json();

        $years = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/years')
        ->json();
        
       // $latest = isset($latest['results']) ? $latest['results'] : [];
        $genres = isset($genresResponse['results']) ? $genresResponse['results'] : [];
        $years = isset($years['results']) ? $years['results'] : [];
        $meta['meta-title']='Collection';
        $meta['title']='Collection';
        $meta['description']='Movieflix';
        $meta['og-title']='Movieflix';
        $meta['canonical']='Movieflix';
        $meta['url']=URL::current();
        $meta['image']=asset('wp-content/uploads/2023/01/moviewp_3.8.8.jpg');
        $collection[0]=1;
        return view('movies.page', compact('collection','meta','years','genres'));
    }



    public function series()
    {   
        
        $latest = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/allfilms?field_url_value=series&tag_id_not[]=106&page='.@$_REQUEST['page'])
            ->json();
            $pager = isset($latest['pager']) ? $latest['pager'] : [];
        $latest = isset($latest['results']) ? $latest['results'] : [];

        if(@$_REQUEST['ajax']==1){
            return view('movies.ajaxlist', compact('latest'));
        }

        $genresResponse = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/tags')
        ->json();

        $years = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/years')
        ->json();
        
       // $latest = isset($latest['results']) ? $latest['results'] : [];
        $genres = isset($genresResponse['results']) ? $genresResponse['results'] : [];
        $years = isset($years['results']) ? $years['results'] : [];
        $meta['meta-title']='Latest Series';
        $meta['title']='All Series';
        $meta['description']='Movieflix';
        $meta['og-title']='Movieflix';
        $meta['canonical']='Movieflix';
        $meta['url']=URL::current();
        $meta['image']=asset('wp-content/uploads/2023/01/moviewp_3.8.8.jpg');

        $network_english =[];
        
        $network_english[0]=1; 
        

        return view('movies.page', compact('network_english','meta','latest','years','genres','pager'));
    }

    public function year($year)
    {   
        
        $latest = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/allfilms?year='.$year.'&page='.@$_REQUEST['page'])
            ->json();
            $pager = isset($latest['pager']) ? $latest['pager'] : [];
        $latest = isset($latest['results']) ? $latest['results'] : [];

        if(@$_REQUEST['ajax']==1){
            return view('movies.ajaxlist', compact('latest'));
        }

        $genresResponse = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/tags')
        ->json();

        $years = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/years')
        ->json();
        
       // $latest = isset($latest['results']) ? $latest['results'] : [];
        $genres = isset($genresResponse['results']) ? $genresResponse['results'] : [];
        $years = isset($years['results']) ? $years['results'] : [];
        $meta['meta-title']=$year.' Movies & Series';
        $meta['title']=$year.' Movies & Series';
        $meta['description']='Movieflix';
        $meta['og-title']='Movieflix';
        $meta['canonical']='Movieflix';
        $meta['url']=URL::current();
        $meta['image']=asset('wp-content/uploads/2023/01/moviewp_3.8.8.jpg');

        // $viewModel = new MoviesViewModel(
        //     $popularMovies,
        //     $nowPlayingMovies,
        //     $genres
        // );

        return view('movies.page', compact('meta','latest','years','genres','pager'));
    }

    public function country($country)
    {   
        
        $latest = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/allfilms?left_contain='.$country.'&left_start_with=Country&page='.@$_REQUEST['page'])
            ->json();
            $pager = isset($latest['pager']) ? $latest['pager'] : [];
        $latest = isset($latest['results']) ? $latest['results'] : [];
        
       // print_r($pager);

        if(@$_REQUEST['ajax']==1){
            return view('movies.ajaxlist', compact('latest'));
        }

        $genresResponse = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/tags')
        ->json();

        $years = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/years')
        ->json();
        
       // $latest = isset($latest['results']) ? $latest['results'] : [];
        $genres = isset($genresResponse['results']) ? $genresResponse['results'] : [];
        $years = isset($years['results']) ? $years['results'] : [];
        $meta['meta-title']=$country.' Movies & Series';
        $meta['title']=$country.' Movies & Series';
        $meta['description']='Movieflix';
        $meta['og-title']='Movieflix';
        $meta['canonical']='Movieflix';
        $meta['url']=URL::current();
        $meta['image']=asset('wp-content/uploads/2023/01/moviewp_3.8.8.jpg');

        // $viewModel = new MoviesViewModel(
        //     $popularMovies,
        //     $nowPlayingMovies,
        //     $genres
        // );

        return view('movies.page', compact('meta','latest','years','genres','pager'));
    }

    public function actor($actor)
    {   
        $actor = str_replace('-',' ',$actor);
        $latest = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/allfilms?left_contain='.$actor.'&left_start_with=Actors&page='.@$_REQUEST['page'])
            ->json();
            $pager = isset($latest['pager']) ? $latest['pager'] : [];
        $latest = isset($latest['results']) ? $latest['results'] : [];
        
       // print_r($pager);

        if(@$_REQUEST['ajax']==1){
            return view('movies.ajaxlist', compact('latest'));
        }

        $genresResponse = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/tags')
        ->json();

        $years = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/years')
        ->json();
        
       // $latest = isset($latest['results']) ? $latest['results'] : [];
        $genres = isset($genresResponse['results']) ? $genresResponse['results'] : [];
        $years = isset($years['results']) ? $years['results'] : [];
        $meta['meta-title']=$actor.' Movies & Series';
        $meta['title']=$actor.' Movies & Series';
        $meta['description']='Movieflix';
        $meta['og-title']='Movieflix';
        $meta['canonical']='Movieflix';
        $meta['url']=URL::current();
        $meta['image']=asset('wp-content/uploads/2023/01/moviewp_3.8.8.jpg');

        // $viewModel = new MoviesViewModel(
        //     $popularMovies,
        //     $nowPlayingMovies,
        //     $genres
        // );

        return view('movies.page', compact('meta','latest','years','genres','pager'));
    }

    public function director($director)
    {   
        $director = str_replace('-',' ',$director);
        $latest = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/allfilms?left_contain='.$director.'&left_start_with=Director&page='.@$_REQUEST['page'])
            ->json();
            $pager = isset($latest['pager']) ? $latest['pager'] : [];
        $latest = isset($latest['results']) ? $latest['results'] : [];
        
       // print_r($pager);

        if(@$_REQUEST['ajax']==1){
            return view('movies.ajaxlist', compact('latest'));
        }

        $genresResponse = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/tags')
        ->json();

        $years = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/years')
        ->json();
        
       // $latest = isset($latest['results']) ? $latest['results'] : [];
        $genres = isset($genresResponse['results']) ? $genresResponse['results'] : [];
        $years = isset($years['results']) ? $years['results'] : [];
        $meta['meta-title']=$director.' Movies & Series';
        $meta['title']=$director.' Movies & Series';
        $meta['description']='Movieflix';
        $meta['og-title']='Movieflix';
        $meta['canonical']='Movieflix';
        $meta['url']=URL::current();
        $meta['image']=asset('wp-content/uploads/2023/01/moviewp_3.8.8.jpg');

        // $viewModel = new MoviesViewModel(
        //     $popularMovies,
        //     $nowPlayingMovies,
        //     $genres
        // );

        return view('movies.page', compact('meta','latest','years','genres','pager'));
    }

    public function network($network)
    {   
        $network = str_replace('-',' ',$network);
        $latest = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/allfilms?right_contain='.$network.'&right_start_with=Networks&page='.@$_REQUEST['page'])
            ->json();
            $pager = isset($latest['pager']) ? $latest['pager'] : [];
        $latest = isset($latest['results']) ? $latest['results'] : [];
        
       // print_r($pager);

        if(@$_REQUEST['ajax']==1){
            return view('movies.ajaxlist', compact('latest'));
        }

        $genresResponse = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/tags')
        ->json();

        $years = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/years')
        ->json();
        
       // $latest = isset($latest['results']) ? $latest['results'] : [];
        $genres = isset($genresResponse['results']) ? $genresResponse['results'] : [];
        $years = isset($years['results']) ? $years['results'] : [];
        $meta['meta-title']=$network.' Movies & Series';
        $meta['title']=$network.' Movies & Series';
        $meta['description']='Movieflix';
        $meta['og-title']='Movieflix';
        $meta['canonical']='Movieflix';
        $meta['url']=URL::current();
        $meta['image']=asset('wp-content/uploads/2023/01/moviewp_3.8.8.jpg');

        // $viewModel = new MoviesViewModel(
        //     $popularMovies,
        //     $nowPlayingMovies,
        //     $genres
        // );

        return view('movies.page', compact('meta','latest','years','genres','pager'));
    }







    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($url)
    {
        //print $id;
        //exit;
        $url = str_replace("-download-full-movie-and-wacth-online","",$url);
        $movie = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/movie?url_alias=/'.$url)
        ->json();
        if(@$_REQUEST['player_movie']){
            $movie = $movie[0];
            return view('movies.player_movie', compact('movie'));
        }
        $genresResponse = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/tags')
        ->json();

        $years = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/years')
        ->json();
        
       
        
        $movie = $movie[0];
        $movie['field_tags'] = explode(",", $movie['field_tags']);
        $movie['tags']=array();
        foreach($movie['field_tags'] as $key=>$value){
            $movie['tags'][$key]['slug']="/genre/".Str::slug(html_entity_decode($value))."/";
            $movie['tags'][$key]['name']=html_entity_decode($value);
           
         }
        
        $left = explode("|",$movie['field_left']);
        $right = explode("|",$movie['field_right']);
        $movie['field_right'] =array();
         foreach($right as $key=>$value){
            list($a, $b) = explode(":",$value);
            $movie['field_right'][$a]=html_entity_decode($b);
         }
        $movie['field_left'] =array();
         foreach($left as $key=>$value){
            list($a, $b) = explode(":",$value);
           if($key!=0) $movie['field_left'][$a]=html_entity_decode($b);
         }
         $genres = isset($genresResponse['results']) ? $genresResponse['results'] : [];
        $years = isset($years['results']) ? $years['results'] : [];
        // print_r($movie['field_left']);
        // exit;
        $meta['meta-title']=$movie['title'];
        $meta['title']=$movie['title'];
        $meta['description']='Movieflix';
        $meta['og-title']='Movieflix';
        $meta['canonical']='Movieflix';
        $meta['url']=URL::current();
        $meta['image']=asset('wp-content/uploads/2023/01/moviewp_3.8.8.jpg');

        return view('movies.post', compact('meta','movie','years','genres'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}