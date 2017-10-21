<?php

namespace App\Http\Controllers\TravellersInn;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Analytics;

use Spatie\Analytics\Period;
use Illuminate\Support\Facades\Cache;


class ApiController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @internal param $country_id
     */
    public function getStatesList(Request $request)
    {
        $states = DB::table("states")
            ->where("country_id",$request->country_id)
            ->pluck("name","id");
        return response()->json($states);
    }
//    public function getPageViews(Request $request)
//    {
//        $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::days(365));
////        dd($analyticsData);
//        $i = 0;
//        foreach ($analyticsData as $analytics){
//            $i += $analytics['visitors'];
//        }
//
////        dd($analyticsData[10]['visitors']);
//        return view('travellers-inn.admin.index',compact('i'));
//
//    }
    public static function getMostVisited(Request $request)
    {
        $analyticsData = Analytics::fetchMostVisitedPages(Period::days(60));
//        dd($analyticsData[7]['visitors']);
//        dd($analyticsData);
        return view('travellers-inn.admin.google-analytics.page-views',compact('analyticsData'));
    }
//    Public function googlePlus(Request $request)
//    {
//        $post_id=$request->id;
//        $route = route('post.view', $post_id);
//        dd($route);
//        Share::page('http://localhost:8080/travellers-inn/public',$route)->googlePlus();
//        return view('travellers-inn.post.show',compact('route'));
//    }
    public function getUniquePages(Request $request)
    {
        $uniquePages = Analytics::performQuery(Period::days(60),'ga:uniquePageViews',['dimensions' =>
            'ga:pagePath,ga:country'

        ]);
        return view('travellers-inn.admin.google-analytics.unique-pages-view',compact('uniquePages'));
    }

}