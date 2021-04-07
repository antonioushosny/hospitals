<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactUsRequest;
use Auth;

use Modules\Admin\Models\Client;
use Modules\Admin\Models\Advertisement;
use Modules\Admin\Models\Info;
use Modules\Admin\Models\ContactUs;
use Modules\Admin\Models\Contact;
use Modules\Admin\Models\Notification;
use Carbon\Carbon;

use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\DB;
use App\Notifications\VerfiyMail;
class MainController extends Controller
{
 
 

  /**
     * Show the shop aboutUs.
     *
     * @return \Illuminate\Http\Response
     */
    public function aboutUs(Request $request)
    {
 

        $aboutText  = Info::where('infos_key','about')->first();
        $mainPageTitle = 'aboutUs' ;
        // return $aboutText ;
        $previous_url = $request->path();
        if(strpos($previous_url, 'mobile') !== false){
            $data = [] ;
            $data['aboutText'] = $aboutText;
            return response()->json($data);
        }
        return view('front.about', compact('mainPageTitle','aboutText'));
    }

    /**
     * Show the terms.
     *
     * @return \Illuminate\Http\Response
     */
    public function terms(Request $request)
    {
 
        $terms  = Info::where('infos_key','terms')->first();
        $mainPageTitle = 'terms' ;
 
        return view('front.terms', compact('mainPageTitle','terms'));
    }

    /**
     * Show the terms.
     *
     * @return \Illuminate\Http\Response
     */
    public function policy(Request $request)
    {
 
        $policy  = Info::where('infos_key','policy')->first();
        $mainPageTitle = 'policy' ;
        // return $aboutText ;
 
        return view('front.policy', compact('mainPageTitle','policy'));
    }
 

    public function ContactUs(){
        
        $contacts = Contact::first() ;
        // return $contacts ;
        $mainPageTitle = 'contactus' ;

        return view('front.contactUs', compact('mainPageTitle','contacts'));

    }

    public function addcontactus(ContactUsRequest $request)
    {
        // dd($request->all());
        ContactUs::create($request->all());

        return back()->with('success', __('lang.sendSuccessfuly'));
    }

    /**
     * Check if Slugs exist and it's
    */
    private function checkSlug($slugs_title, $slugs_key)
    {
        $currentLanguage = app()->getLocale();

        return Slug::join('slug_translations', 'slugs.slugs_id', 'slug_translations.slugs_id')
                ->where('slugs.slugs_key', $slugs_key)
                ->where('slug_translations.slugs_title', $slugs_title)
                ->where('slug_translations.languages_code', $currentLanguage)->first();
    }   

    public function switchLanguage()
    {
        $locale = app()->getLocale();
        $route = str_replace(env('REDIRECT').'/'.$locale, $locale == 'en' ? env('REDIRECT').'/ar' : env('REDIRECT').'/en', \URL::full());
        $route = preg_replace('/\W\w+\s*(\W*)$/', '$1', $route);
        // dd($route);
        return redirect($route);
    }


    /**
    *   Switch between languages
    */
    public function lang(Request $request, $lang)
    {

        // dd($lang);
        // Get all Url
        $previous_url = url()->previous();
        // Remove DOmain from URL, just route path
        $previous_url = str_replace($request->root(), '', $previous_url);

        // Transform it into a correct request instance
        $previous_request = app('request')->create($previous_url);

        // Get Query Parameters if applicable
        $query = $previous_request->query();

        // In case the route name was translated
        $route_name = app('router')->getRoutes()->match($previous_request)->getName();
        // return $route_name ;

        // Store the segments of the last request as an array
        $segments = $previous_request->segments();
        // dd($segments) ;

        // Check if the first segment matches a language code
        if (in_array($lang, config('translatable.locales'))) {
            // return $segments ;
             // If it was indeed a translated route name
            if ($route_name && \Lang::has('routes.' . $route_name, $lang)) {

                // return $route_name ;
                // Translate the route name to get the correct URI in the required language, and redirect to that URL.
                if (count($query)) {

                    return redirect()->to($lang . '/' .  \Lang::get('routes.' . $route_name, [], $lang) . '?' . http_build_query($query));
                }
               if (count($segments) >= 2) {

                    // Get Opposite langugae
                    $tempLang = $lang == 'ar' ? 'en' : 'ar';

                    // Get first parameter and translate it
                    $firstLevel = \Lang::get('routes.' . $route_name, [], $lang);

                    // Get Key for the given value from lang/routes for previouse language
                    /**
                     * en:-  'project_name'     =>  'Project Name'   ==> then we will get 'project_name'
                     * ar:-  'project_name'     =>  'اسم المشروع'   ==> then we will get 'project_name'
                     */
                     $redirectURL = '' ;
                    // $keySlug = array_search($segments[2], \Lang::get('routes', [], $tempLang));
                    $i = 1 ;
                    // dd(current($segments)) ;
                    $lastIndex = count($segments) - 1 ;
                    $keySlug = array_search($segments[$lastIndex], \Lang::get('routes', [], $tempLang));
                    // dd($keySlug);
                    // return $segments[$lastIndex] ;
                    if($keySlug){
                        $secondLevel = \Lang::get('routes.' . $keySlug, [], $lang);
                        $segments[$lastIndex] = $secondLevel ;
                        $segments[0] = $lang ;
                        $redirectURL  = implode("/", $segments);
                        return redirect()->to($redirectURL);
                    }

                }


            }

            // Replace the first segment by the new language code
            $segments[0] = $lang;
            // return $segments;
            // Redirect to the required URL
            if (count($query)) {
                return redirect()->to(implode('/', $segments) . '?' . http_build_query($query));
            }

            return redirect()->to(implode('/', $segments));
        }

        return redirect()->back();
    }

 }
