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
    public function search2()
    {   
        // print $search;
        // exit;
        if(@$_REQUEST['s']){
            $_REQUEST['s'] = str_replace(" ",'-',$_REQUEST['s']);
            header('Location:/search/'.$_REQUEST['s'].'/');
            exit;
        }
    }
    public function search($search)
    {   
        // print $search;
        // exit;
        $search = str_replace("-",' ',$search);
        
        $latest = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
            ->get(config('services.basic_auth.api_url').'api/allfilms?title='.$search.'&page='.@$_REQUEST['page'])
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
                $meta['meta-title']='Search '.ucfirst($search).'|'.config('app.name');
                $meta['title']='Serach for '.ucfirst($search);
                $meta['description']='Watch and Download '.$search.' on '.config('app.name');
                $meta['og-title']='Search '.ucfirst($search).'|'.config('app.name');
                $meta['canonical']=URL::current();
                $meta['url']=URL::current();
                $meta['image']=@$latest[0]['field_image_urls'];
        
                return view('movies.page', compact('meta','latest','years','genres','pager'));
        
        }

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
        $meta['meta-title']=config('app.name').' - Watch Online And Download Free Movies & Shows, Bollywood, Hollywood, Netflix, Hindi Dubbed';
        $meta['description']=config('app.name').' is a large collection of Latest Bollywood Movies, Hollywood Movies, Hindi dubbed, Action, Adventure, Science Finction Watch Online and Free Download';
        $meta['og-title']=config('app.name').' - Watch Online And Download Free Movies & Shows, Bollywood, Hollywood, Netflix, Hindi Dubbed';
        $meta['canonical']=URL::current();
        $meta['url']=URL::current();
        //$meta['image']=asset('wp-content/uploads/2023/01/moviewp_3.8.8.jpg');
        $meta['image']=$latest[0]['field_image_urls'];

        return view('movies.front', compact('meta','latest','years','popularMovies','tvshows','bollywood','genres','pager'));
    }

    public function tag($tag)
    {   
        $tag_name = ucfirst(str_replace('-',' ',$tag));
        $tag = ($tag=='hot-series')?'tv-shows':$tag;
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
        $meta['meta-title']=@$tag_name.' Movies and Shows |'.config('app.name');
        $meta['title']=@$tag_name.' Movies and Shows';
        $meta['description']='All '.@$tag_name.' Movies and Shows Watch Online and Download Free Streaming now';
        $meta['og-title']=@$tag_name.' Movies and Shows';
        $meta['canonical']=URL::current();
        $meta['url']=URL::current();
        $meta['image']=$latest[0]['field_image_urls'];
 
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
        $meta['meta-title']=config('app.name').' Latest Uploaded Movies and Shows.';
        $meta['title']='Latest Movies & Shows';
        $meta['description']='Watch and Download Latest Bollywood Movies and Tamil, Hollywodd, Hot Series, Netflix, Amazon Prime , Hindi Dubbed, Tv Shows, English Series free Streaming now.';
        $meta['og-title']=config('app.name').' Latest Uploaded Movies and Shows.';
        $meta['canonical']=URL::current();
        $meta['url']=URL::current();
        $meta['image']=$latest[0]['field_image_urls'];

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
        $meta['meta-title']='Latter '.$letter.' Movies & Shows|'.config('app.name');
        $meta['title']='Latter '.$letter.' Movies & Shows';
        $meta['description']='Watch and Download Starting letter with '.$letter.' on '.config('app.name');
        $meta['og-title']='Latter '.$letter.' Movies & Shows|'.config('app.name');
        $meta['canonical']=URL::current();
        $meta['url']=URL::current();
        $meta['image']=$latest[0]['field_image_urls'];

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
        $meta['meta-title']=$collection.' Collections on '.config('app.name');
        $meta['title']=$collection.' Collections';
        $meta['description']="Watch and Download $collection Collections Free in HD Stream Now.";
        $meta['og-title']=$collection.' Collections on '.config('app.name');
        $meta['canonical']=URL::current();
        $meta['url']=URL::current();
        $meta['image']=$latest[0]['field_image_urls'];

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
        $meta['meta-title']='Networks Of Your favorite Movies and Shows|'.config('app.name');
        $meta['title']='Networks';
        $meta['description']='Watch latest Networks Of Movies and Shows on '.config('app.name');
        $meta['og-title']='Networks Of Your favorite Movies and Shows|'.config('app.name');
        $meta['canonical']=URL::current();
        $meta['url']=URL::current();
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
        $meta['meta-title']='Collection Of Your favorite Movies and Shows|'.config('app.name');
        $meta['title']='Collections';
        $meta['description']='Watch latest Collection Of Movies and Shows on '.config('app.name');
        $meta['og-title']='Collection Of Your favorite Movies and Shows|'.config('app.name');
        $meta['canonical']=URL::current();
        $meta['url']=URL::current();
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
        $meta['meta-title']='Latest Tv Shows and English Series Watch Online and free Download|'.config('app.name');
        $meta['title']='Latest Tv Shows and English Series';
        $meta['description']='English Tv Shows Watch online and Series, Action, Comedy, Drama, Science Fiction Download free on '.config('app.name') ;
        $meta['og-title']='Latest Tv Shows and English Series';
        $meta['canonical']=URL::current();
        $meta['url']=URL::current();
        $meta['image']=$latest[0]['field_image_urls'];

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
        $meta['meta-title']=$year.' Movies and Shows |'.config('app.name');
        $meta['title']=$year.' Movies and Shows';
        $meta['description']='All '.$year.' Movies and Shows Watch Online and Download Free Streaming now';
        $meta['og-title']=$year.' Movies and Shows free download |'.config('app.name');
        $meta['canonical']=URL::current();
        $meta['url']=URL::current();
        $meta['image']=$latest[0]['field_image_urls'];

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
        $meta['meta-title']=$country.' Movies and Shows |'.config('app.name');
        $meta['title']=$country.' Movies and Shows';
        $meta['description']='All '.$country.' Movies and Shows Watch Online and Download Free Streaming now';
        $meta['og-title']=$country.' Movies and Shows free download |'.config('app.name');
        $meta['canonical']=URL::current();
        $meta['url']=URL::current();
        $meta['image']=$latest[0]['field_image_urls'];


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
        $meta['meta-title']=$actor.' Movies and Shows |'.config('app.name');
        $meta['title']=$actor.' Movies and Shows';
        $meta['description']=$actor.' Movies and Shows Watch Online and Download Free Streaming now';
        $meta['og-title']=$actor.' Movies and Shows free download |'.config('app.name');
        $meta['canonical']=URL::current();
        $meta['url']=URL::current();
        $meta['image']=$latest[0]['field_image_urls'];

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
        $meta['meta-title']=$director.' Movies and Shows |'.config('app.name');
        $meta['title']=$director.' Movies and Shows';
        $meta['description']=$director.' Movies and Shows Watch Online and Download Free Streaming now';
        $meta['og-title']=$director.' Movies and Shows free download |'.config('app.name');
        $meta['canonical']=URL::current();
        $meta['url']=URL::current();
        $meta['image']=$latest[0]['field_image_urls'];

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
        $meta['image']=$latest[0]['field_image_urls'];

        return view('movies.page', compact('meta','latest','years','genres','pager'));
    }

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
        $meta['meta-title']=$movie['title'].' Watch Online and Free Download in HD|'.config('app.name');
        $meta['title']=$movie['title'];
        $meta['description']=$movie['title'].' is available now on '.config('app.name').' Moviesmad, Movie Flix, Movies Flixe';
        $meta['og-title']=$movie['title'].' Watch Online and Free Download in HD|'.config('app.name');
        $meta['canonical']=URL::current();
        $meta['url']=URL::current();
        $meta['image']=$movie['field_image_urls'];

        return view('movies.post', compact('meta','movie','years','genres'));
    }

}