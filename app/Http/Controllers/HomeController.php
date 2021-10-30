<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Modules\Admin\Models\Advertisement;
use Modules\Admin\Models\News;
use Modules\Admin\Models\Hospital;
use Modules\Admin\Models\City;
use Modules\Admin\Models\Area;
use Modules\Admin\Models\Department;
use Modules\Admin\Models\Specialty;
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
        $hospitals = Hospital::active()->limit(9)->get();
        $cities = City::get()->pluck('cities_title','cities_id') ;
        $areas = Area::get()->pluck('areas_title','areas_id') ;
        $departments = Department::get()->pluck('departments_title','departments_id') ;
        $specialties = Specialty::get()->pluck('specialties_title','specialties_id') ;

        return view('front.home',compact('mainPageTitle','last_news','advertisements','hospitals','cities','areas','departments','specialties'));
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
        
    public function hospitals(Request $request)
    {   
        $searchArray = [
            'hospital_translations.hospitals_title' => [request('name'), 'like'], 
            'hospital_translations.hospitals_address' => [request('address'), 'like'], 
            'hospitals.hospitals_phone' => [request('phone'), '='], 
            'hospitals.countries_id' => [request('countries_id'), '='], 
            'hospitals.cities_id' => [request('cities_id'), '='], 
            'hospitals.hospitals_status' => [request('status'), '='],
            
        ];
        request()->flash();

        $query = Hospital::join('hospital_translations', 'hospitals.hospitals_id', 'hospital_translations.hospitals_id')
        ->groupBy('hospitals.hospitals_id')->sorted();
        
        $searchQuery = $this->searchIndex($query, $searchArray);
 
        if($request->areas_id){
            $areas_id = $request->areas_id ;
            $searchQuery = $searchQuery->whereHas('hospitals_areas', function($query) use ($areas_id) {
                $query->where('areas_id', $areas_id);
            });
        }
        if($request->departments_id){
            $departments_id = $request->departments_id ;
            $searchQuery = $searchQuery->whereHas('hospitals_departments', function($query) use ($departments_id) {
                $query->where('departments_id', $departments_id);
            });
        }
        if($request->specialties_id){
            $specialties_id = $request->specialties_id ;
            $searchQuery = $searchQuery->whereHas('hospitals_specialties', function($query) use ($specialties_id) {
                $query->where('specialties_id', $specialties_id);
            });
        }

 
        $hospitals = $searchQuery->paginate(9);
        $cities = City::get()->pluck('cities_title','cities_id') ;
        $areas = Area::get()->pluck('areas_title','areas_id') ;
        $departments = Department::get()->pluck('departments_title','departments_id') ;
        $specialties = Specialty::get()->pluck('specialties_title','specialties_id') ;       
        // $hospitals = Hospital::active()->paginate(9);
        $mainPageTitle = 'hospitals' ;
        return view('front.hospitals',compact('mainPageTitle','hospitals','cities','areas','departments','specialties'));
    }
    public function showHospital(Hospital $hospital)
    {   
        $mainPageTitle = 'hospitals' ;
        return view('front.showHospital',compact('mainPageTitle','hospital'));
    }
 
}
