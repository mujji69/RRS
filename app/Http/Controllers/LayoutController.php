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
      
      // available tables
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
       // end of available tables

       // check days
       $count1 = 0 ;
       $ts = strtotime($datas['date']);
    
       $d = date('l', $ts);
       $days = Owner::find($datas['id'])->days;
        // dd($days[0]->day);

       for($k=0; $k<$days->count(); $k++){
        
           if(strtolower($d) == $days[$k]->day){
            // dd('jani');   
            $count1 = 1;
           }
       }

       // end of check days

       $allData = Owner::find($datas['id']);

        $booking_time = $datas['time'];
        $from = $allData->open_from;
        $to = $allData->open_to;
        if($this->checkTime($booking_time,$from,$to) && $count1 == 1)
        return view('customer.layout',compact('datas','content','array'));
        else {
            return redirect()->back()->withInput(Request::only('persons'))
            ->with('message','Invalid Date or Time, please check the details');
        
        }
    }
    
    protected function checkTime($booking_time,$from,$to){

        $times = strtotime($booking_time);
        $booking_time = date('H:i:s', $times);
        $booking_time = DateTime::createFromFormat('!H:i:s', $booking_time);
        $from = DateTime::createFromFormat('!H:i:s', $from);
        $to = DateTime::createFromFormat('!H:i:s', $to);
        
        if($from > $to)
         $to->modify('+1 day');
        
         if (($booking_time >= $from && $booking_time <= $to)  || ($booking_time->modify('+1 day') >= $from && $booking_time <= $to))
        {
        return true;
        
        }
        else 
        return false;
        
    }

}
