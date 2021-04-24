<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Modules\Admin\Models\Advertisement;
use Modules\Admin\Models\News;
use Carbon\Carbon;
use Module ;
class HomeController extends Controller
{
  
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {   
        $mainPageTitle = 'home' ;
        $last_news = News::active()->limit(9)->get();
        return view('front.home',compact('mainPageTitle','last_news'));
    }

    public function news(Request $request)
    {   
        $news = News::active()->paginate(9);
        $mainPageTitle = 'news' ;
        return view('front.news',compact('mainPageTitle','news'));
    }
    public function showNews(News $news)
    {   
        $mainPageTitle = 'news' ;
        return view('front.showNews',compact('mainPageTitle','news'));
    }
 
}
