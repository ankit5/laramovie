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
            header('Location:/search/'.$_REQUEST['s']);
            exit;
        }
    }
    public function search($search,$page='')
    {   
        // print $search;
        // exit;
        $search = str_replace("-",' ',$search);
        
        $latest = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
            ->get(config('services.basic_auth.api_url').'api/allfilms?title='.$search.'&page='.@$page)
                ->json();
                $pager = isset($latest['pager']) ? $latest['pager'] : [];
                $latest = isset($latest['results']) ? $latest['results'] : [];
        
                if(@$page){
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
                $meta['image']=@@$latest[0]['field_image_urls'];
        
                return view('movies.page', compact('meta','latest','years','genres','pager'));
        
        }

    public function index($page='')
    {   
        if($page==3)
      {
          return '';
      }

        $latest = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/allfilms')
            ->json();

            print_r($latest);
            exit;
        

      
        $popularMovies = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/featured-movies?block_id=4')
        ->json();

        $popularSeries = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/featured-movies?block_id=18')
        ->json();

        

        $genresResponse = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/tags')
        ->json();

        $years = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/years')
        ->json();

        $pager = isset($latest['pager']) ? $latest['pager'] : [];
    if(@$page==1){
            $tvshows = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
      ->get(config('services.basic_auth.api_url').'api/films?field_url_value=series&tag_id_not[]=106')
      ->json();
      $bollywood = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
      ->get(config('services.basic_auth.api_url').'api/films?tag_id=86')
      ->json();
      $marvel = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/marvel-movies')
        ->json();
      $tvshows = isset($tvshows['results']) ? $tvshows['results'] : [];
      $bollywood = isset($bollywood['results']) ? $bollywood['results'] : [];
      $marvel = isset($marvel['results']) ? $marvel['results'] : [];
      $page[0]=1;
          return view('movies.front-load', compact('marvel','tvshows','bollywood','page'));
      }

      if(@$page==2){
        $hindiDubbed = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
  ->get(config('services.basic_auth.api_url').'api/films?tag_id=80&tag_id_not[]=83')
  ->json();
  $southDubbed = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
  ->get(config('services.basic_auth.api_url').'api/films?tag_id=83')
  ->json();
  $hotSeries = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
    ->get(config('services.basic_auth.api_url').'api/films?tag_id=106')
    ->json();
  $hindiDubbed = isset($hindiDubbed['results']) ? $hindiDubbed['results'] : [];
  $southDubbed = isset($southDubbed['results']) ? $southDubbed['results'] : [];
  $hotSeries = isset($hotSeries['results']) ? $hotSeries['results'] : [];
  $page[0]=2;
      return view('movies.front-load', compact('hindiDubbed','southDubbed','hotSeries','page'));
  }
      
        $latest = isset($latest['results']) ? $latest['results'] : [];
        $popularMovies = isset($popularMovies['results']) ? $popularMovies['results'] : [];
        $popularSeries = isset($popularSeries['results']) ? $popularSeries['results'] : [];
       
        $genres = isset($genresResponse['results']) ? $genresResponse['results'] : [];
        $years = isset($years['results']) ? $years['results'] : [];
        $meta['meta-title']='Hdmovie2 - Watch Online Bollywood, Hollywood, Netflix, Hindi Dubbed, Hotstar Movies';
        $meta['description']='Hdmovie2, Free Watch and download Latest Bollywood Movies Online, Hindi Dubbed movies, Netflix Series and season, Hotstar Hdmovie2 Watch Latest Movies,TV Series Online for free.';
        $meta['og-title']='Hdmovie2 - Watch Online Bollywood, Hollywood, Netflix, Hindi Dubbed, Hotstar Movies';
        $meta['canonical']=URL::current();
        $meta['url']=URL::current();
        //$meta['image']=asset('wp-content/uploads/2023/01/moviewp_3.8.8.jpg');
        $meta['image']=@$latest[0]['field_image_urls'];

       

        return view('movies.front', compact('meta','popularSeries','latest','years','popularMovies','genres','pager'));
    }

    public function tag($tag,$page='')
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
        ->get(config('services.basic_auth.api_url').'api/allfilms?tag_id='.@$tag_detail[0]['tid'].'&page='.@$page)
            ->json();
            $pager = isset($latest['pager']) ? $latest['pager'] : [];
        $latest = isset($latest['results']) ? $latest['results'] : [];

        if(@$page){
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
        $meta['meta-title']=@$tag_name.' - Hdmovie2 - Movies Watch Online and Free Download HD Quality';
        $meta['title']=@$tag_name;
       // $meta['description']='All '.@$tag_name.' Movies and Shows Watch Online and Download Free Streaming now';
        $meta['og-title']=@$tag_name.' - Hdmovie2 - Movies Watch Online and Free Download HD Quality';
        $meta['canonical']=URL::current();
        $meta['url']=URL::current();
        $meta['image']=@$latest[0]['field_image_urls'];
 
        $network =[];
        if($tag=='web-series'){
            $network[0]=1; 
        }

        return view('movies.page', compact('network','meta','latest','tag_detail','years','genres','pager'));
    }

    public function movies($page='')
    {   
        
        $latest = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/allfilms?field_url_value_not=/series&tag_id_not[]=113&tag_id_not[]=106&tag_id_not[]=91&page='.@$page)
            ->json();
            $pager = isset($latest['pager']) ? $latest['pager'] : [];
        $latest = isset($latest['results']) ? $latest['results'] : [];

        if(@$page){
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
        $meta['meta-title']='Hdmovie2 - Watch Online Bollywood, Hollywood, Netflix, Hindi Dubbed, Hotstar';
        $meta['title']='Films';
        $meta['description']='Hdmovie2, Free Watch and download Latest Bollywood Movies Online, Hindi Dubbed movies, Netflix Series and season, Hotstar Hdmovie2 Watch Latest Movies,TV Series Online for free.';
        $meta['og-title']='Hdmovie2 - Watch Online Bollywood, Hollywood, Netflix, Hindi Dubbed, Hotstar';
        $meta['canonical']=URL::current();
        $meta['url']=URL::current();
        $meta['image']=@$latest[0]['field_image_urls'];

        // $viewModel = new MoviesViewModel(
        //     $popularMovies,
        //     $nowPlayingMovies,
        //     $genres
        // );

        return view('movies.page', compact('meta','latest','years','genres','pager'));
    }

    public function letter($letter,$page='')
    {   
        
        $latest = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/allfilms?start_with='.$letter.'&page='.@$page)
            ->json();
            $pager = isset($latest['pager']) ? $latest['pager'] : [];
        $latest = isset($latest['results']) ? $latest['results'] : [];

        if(@$page){
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
        $meta['meta-title']='Latter '.$letter.' Movies|'.config('app.name');
        $meta['title']='Latter '.$letter.' Movies';
        $meta['description']='Watch and Download Starting letter with '.$letter.' on '.config('app.name');
        $meta['og-title']='Latter '.$letter.' Movies|'.config('app.name');
        $meta['canonical']=URL::current();
        $meta['url']=URL::current();
        $meta['image']=@$latest[0]['field_image_urls'];

        return view('movies.page', compact('meta','latest','years','genres','pager'));
    }

    public function collection_search($collection,$page='')
    {   
        $collection = str_replace("-",' ',$collection);
        $collection = str_replace(" collection",'',$collection);
        $latest = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/allfilms?title_contain_all='.$collection.'&page='.@$page)
            ->json();
            $pager = isset($latest['pager']) ? $latest['pager'] : [];
        $latest = isset($latest['results']) ? $latest['results'] : [];

        if(@$page){
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
        $meta['image']=@$latest[0]['field_image_urls'];

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
        $meta['meta-title']='Movies Networks Free watch Online And Download |'.config('app.name');
        $meta['title']='Networks';
        //$meta['description']='Watch latest Networks Of Movies and Shows on '.config('app.name');
        $meta['og-title']='Movies Networks Free watch Online And Download |'.config('app.name');
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
        $meta['meta-title']='Free Collection Of Your favorite Movies|'.config('app.name');
        $meta['title']='Collections';
        $meta['description']='Watch latest Collection Of Movies on '.config('app.name');
        $meta['og-title']='Free Collection Of Your favorite Movies|'.config('app.name');
        $meta['canonical']=URL::current();
        $meta['url']=URL::current();
        $collection[0]=1;
        return view('movies.page', compact('collection','meta','years','genres'));
    }



    public function series($page='')
    {  
       
        
        $latest = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/allfilms?field_url_value=series&tag_id_not[]=106&page='.@$page)
            ->json();
            $pager = isset($latest['pager']) ? $latest['pager'] : [];
        $latest = isset($latest['results']) ? $latest['results'] : [];

        if(@$page){
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
        $meta['meta-title']='TV series watch free online and download|'.config('app.name');
        $meta['title']='TV Series';
        $meta['description']='TV series movies watch free online and download , prmovies, 123movies, hdmovies2';
        $meta['og-title']='TV series watch free online and download|'.config('app.name');
        $meta['canonical']=URL::current();
        $meta['url']=URL::current();
        $meta['image']=@$latest[0]['field_image_urls'];

        $network_english =[];
        
        $network_english[0]=1; 
        

        return view('movies.page', compact('network_english','meta','latest','years','genres','pager'));
    }

    public function year($year,$page='')
    {   
        
        $latest = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/allfilms?year='.$year.'&page='.@$page)
            ->json();
            $pager = isset($latest['pager']) ? $latest['pager'] : [];
        $latest = isset($latest['results']) ? $latest['results'] : [];

        if(@$page){
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
        $meta['meta-title']=$year.' Movies & Series watch online & free download|'.config('app.name');
        $meta['title']=$year.' Movies & Series';
        //$meta['description']='All '.$year.' Movies and Shows Watch Online and Download Free Streaming now';
        $meta['og-title']=$year.' Movies & Series watch online & free download|'.config('app.name');
        $meta['canonical']=URL::current();
        $meta['url']=URL::current();
        $meta['image']=@$latest[0]['field_image_urls'];

        return view('movies.page', compact('meta','latest','years','genres','pager'));
    }

    public function country($country,$page='')
    {   
        
        $latest = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/allfilms?left_contain='.$country.'&left_start_with=Country&page='.@$page)
            ->json();
            $pager = isset($latest['pager']) ? $latest['pager'] : [];
        $latest = isset($latest['results']) ? $latest['results'] : [];
        
       // print_r($pager);

        if(@$page){
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
        $meta['meta-title']='Watch '.$country.' movies on '.config('app.name');
        $meta['title']='Search for '.$country;
        $meta['description']='Watch '.$country.' movies on '.config('app.name');
        $meta['og-title']='Watch '.$country.' movies on '.config('app.name');
        $meta['canonical']=URL::current();
        $meta['url']=URL::current();
        $meta['image']=@$latest[0]['field_image_urls'];


        return view('movies.page', compact('meta','latest','years','genres','pager'));
    }

    public function actor($actor,$page='')
    {   
        $actor = str_replace('-',' ',$actor);
        $latest = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/allfilms?left_contain='.$actor.'&left_start_with=Actors&page='.@$page)
            ->json();
            $pager = isset($latest['pager']) ? $latest['pager'] : [];
        $latest = isset($latest['results']) ? $latest['results'] : [];
        
       // print_r($pager);

        if(@$page){
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
        $meta['meta-title']=$actor.' Movies |'.config('app.name');
        $meta['title']=$actor.' Movies';
        $meta['description']=$actor.' Movies Watch Online and Download Free Streaming now';
        $meta['og-title']=$actor.' Movies free download |'.config('app.name');
        $meta['canonical']=URL::current();
        $meta['url']=URL::current();
        $meta['image']=@$latest[0]['field_image_urls'];

        return view('movies.page', compact('meta','latest','years','genres','pager'));
    }

    public function director($director,$page='')
    {   
        $director = str_replace('-',' ',$director);
        $latest = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/allfilms?left_contain='.$director.'&left_start_with=Director&page='.@$page)
            ->json();
            $pager = isset($latest['pager']) ? $latest['pager'] : [];
        $latest = isset($latest['results']) ? $latest['results'] : [];
        
       // print_r($pager);

        if(@$page){
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
        $meta['meta-title']='Watch '.$director.' movies on '.config('app.name');
        $meta['title']=$director.' Movies';
        $meta['description']=$director.' Movies Watch Online and Download Free Streaming now';
        $meta['og-title']='Watch '.$director.' movies on '.config('app.name');
        $meta['canonical']=URL::current();
        $meta['url']=URL::current();
        $meta['image']=@$latest[0]['field_image_urls'];

        return view('movies.page', compact('meta','latest','years','genres','pager'));
    }

    public function network($network,$page='')
    {   
        $network = str_replace('-',' ',$network);
        $latest = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/allfilms?right_contain='.$network.'&right_start_with=Networks&page='.@$page)
            ->json();
            $pager = isset($latest['pager']) ? $latest['pager'] : [];
        $latest = isset($latest['results']) ? $latest['results'] : [];
        
       // print_r($pager);

        if(@$page){
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
        $meta['meta-title']=$network.' Movies';
        $meta['title']=$network.' Movies';
       // $meta['description']='Movieflix';
        $meta['og-title']=$network.' Movies & Series';
        $meta['canonical']=URL::current();
        $meta['url']=URL::current();
        $meta['image']=@$latest[0]['field_image_urls'];

        return view('movies.page', compact('meta','latest','years','genres','pager'));
    }

    public function show($url,$player_movie='')
    {
        //print $id;
        //exit;
        $url = str_replace("-download-full-movie-and-wacth-online","",$url);
        $movie = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/movie?url_alias=/'.$url)
        ->json();
        if(@$player_movie){
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
            $movie['tags'][$key]['slug']="/genre/".Str::slug(html_entity_decode($value));
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
            $movie['field_left'][$a]=html_entity_decode($b);
         }
         $genres = isset($genresResponse['results']) ? $genresResponse['results'] : [];
        $years = isset($years['results']) ? $years['results'] : [];
        // print_r($movie['field_left']);
        // exit;
        $meta['meta-title']=$movie['title'].' Watch Online Movies Free HD Movies Download|'.config('app.name');
        $meta['title']=$movie['title'];
        $meta['description']=$movie['title'].' is available now on '.config('app.name').' Movies HD, Movie2hd, 2hdMovies';
        $meta['og-title']=$movie['title'].' Watch Online Movies Free HD Movies Download|'.config('app.name');
        $meta['canonical']=URL::current();
        $meta['url']=URL::current();
        $meta['image']=$movie['field_image_urls'];

        $similar = explode(' ',$movie['title']);

$similar = ($similar[0]=='A' || $similar[0]=='The' || $similar[0]=='for')?$similar[1].' '.$similar[2]:$similar[0].' '.$similar[1];
// print_r($movie['field_left']);
// exit;
$similar_tag ='';
if(str_contains($movie['field_left']['Genre'],'Bollywood')){
    $similar_tag = 86;
    $similar_tag ='?tag_id='.$similar_tag;
}
if(str_contains($movie['field_left']['Genre'],'Hollywood')){
    $similar_tag = 64;
    $similar_tag ='?tag_id='.$similar_tag;
}
if(str_contains($movie['field_left']['Genre'],'South Special')){
    $similar_tag = 82;
    $similar_tag ='?tag_id='.$similar_tag;
}
if(str_contains($movie['field_left']['Genre'],'TV Shows')){
    $similar_tag = 106;
    $similar_tag ='?tag_id='.$similar_tag;
}
if(str_contains($movie['field_left']['Genre'],'TV Shows')){
    $similar_tag = 106;
    $similar_tag ='?tag_id='.$similar_tag;
}
if(str_contains($movie['field_url'],'/series')){
    $similar_tag = '?field_url_value=series&tag_id_not[]=106';
}

   


        $latest = Http::withBasicAuth(config('services.basic_auth.user'), config('services.basic_auth.pwd'))
        ->get(config('services.basic_auth.api_url').'api/films'.$similar_tag)
            ->json();
           
            $latest = isset($latest['results']) ? $latest['results'] : [];
    

        return view('movies.post', compact('meta','movie','years','genres','latest'));
    }

}