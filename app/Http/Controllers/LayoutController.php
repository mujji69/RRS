<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Owner;
use Request; 
use App\Reserve;
use DateTime;
class LayoutController extends Controller
{
    public function layout(){
        // $datas = $request->all();
        $datas= Request::all(); 
    
        // dd($owner);
        $content  = Owner::find($datas['id'])->layouts;
        // $lay = $content->layout;
        $all = Owner::find($datas['id'])->reserves;
        //  $tables = $all['table_no'];
       //  dd($all[0]->table_no);
       $array[] = null; 
    
       $b = 0;
       $count = 0;
       for($i=1;$i<=$content->total_tables;$i++){
           for($j=0;$j<$all->count();$j++){
               if($i == $all[$j]->table_no){
                
                $timestamp = strtotime($all[$j]->time) + 60*60;
                $after = date('H:i:s', $timestamp);

                $timestamp2 = strtotime($all[$j]->time) - 60*60;
                $before = date('H:i:s', $timestamp2);

                if($datas['time'] == $all[$j]->time 
                || ($datas['time'] > $all[$j]->time && $datas['time'] < $after) 
                || ($datas['time'] < $all[$j]->time && $datas['time'] > $before)){

                    $count = 1;
                
                }
               
                
               }
           }
           if($count == 0){
               $array[$b] = $i;
               $b = $b + 1;
           }
           $count = 0 ;
       }
       $all = Owner::find($datas['id']);

       $booking_time = $datas['time'];
$from = $all->open_from;
$to = $all->open_to;
// $date1 = DateTime::createFromFormat('H\h i\m s\s', $current_time);
// $date2 = DateTime::createFromFormat('H\h i\m s\s', $sunrise);
// $date3 = DateTime::createFromFormat('H\h i\m s\s', $sunset);
if ($booking_time > $from && $booking_time < $to)
{

   
}
else {
    return redirect()->back()->withInput(Request::only('date','persons'))
    ->with('message','please check the timings in details button first');
}
    //    dd($array);

        return view('customer.layout',compact('datas','content','array'));;
    }
}
