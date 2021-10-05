<?php

namespace App\Http\Controllers\Admin;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Visitor;
use DB;
use App\User;
use App\Feed;
use Activity;

class AdminController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function range2($unit)
    {
    	$array ='[';
        for ($i=8;$i>-1;$i--) {
            if ($unit == 'day') {
                $date2 = date('Y-m-d',strtotime('-'.$i.' day'));
                $date1 = date('Y-m-d', strtotime($date2));               
            } elseif ($unit == 'week') {
                $date2 = date('Y-m-d',strtotime('-'.$i.' week'));
                $date1 = date('Y-m-d', strtotime($date2 .'- 6 days'));
            } elseif ($unit == 'month') {
                $date1 = date('Y-m-01',strtotime('-'. $i .' month'));
                $date2 = date('Y-m-01', strtotime($date1 .'+ 1 month'));
            }            

            $array .= "[". strtotime($date2 ."UTC") * 1000 .",".Visitor::range($date1,$date2)."],";
        }
        $array = rtrim($array,",");

        $array .=']';

        return $array;
    }

    public function index()
    {

    	$visitor_stuts['yesterday_visitor'] = Visitor::range(date('y-m-d',strtotime('-1 day')),date('y-m-d',strtotime('-1 day')));
    	$visitor_stuts['today_visitor'] = Visitor::range(date('y-m-d'),date('y-m-d'));
    	$visitor_stuts['count'] = Visitor::count();

    	$day = $this->range2('day');
    	$week = $this->range2('week');
    	$month = $this->range2('month');

        $geo = DB::table('visitor_registry')
                ->groupBy('country')
                ->selectRaw('count(clicks) as clicks, LOWER(country) as country')
                ->pluck('clicks','country');

        $geo_country = DB::table('visitor_registry')
                ->groupBy('country_name')
                ->selectRaw('count(clicks) as clicks, country_name')
                ->pluck('clicks','country_name');

        $geo = json_encode($geo);
        $geo_country = json_encode($geo_country);        

        $activities = Activity::users()->get();
        $users_count = Activity::users()->count();
        $numberOfGuests = Activity::guests()->count();
    	
        return view('admin.dashboard')->with(['day'=> $day , 'week' => $week , 'month' => $month, 'visitor_stuts' => $visitor_stuts, 'geo' => $geo, 'country_name' => $geo_country, 'users_count' => $users_count, 'activities' => $activities, 'numberOfGuests' => $numberOfGuests ]);
    }

    public function upload_img(Request $request)
    {     
        $path = $request->file('file')->storeAs('files', $request->file('file')->getClientOriginalName(),'public_uploads');

        return json_encode(['location' => $path]);
    }


    public function feedback($type= '')
    {
        if($type == 'users') {
            $data = User::whereNotIn('id', [1,2])->get();
        } else {
            $data = Feed::where('type', $type)->get();
        }

        return view('admin.feedback', compact('data' , 'type'));
    }

}
