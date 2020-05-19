<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Owner;
use App\Menu;
use App\Reserve;
use Auth;
// use Request;

class RestaurantController extends Controller
{
 
    public function list(){
        $datas = Owner::all();
        return view('customer.list',compact('datas'));
    }

    public function book($id){
        $data = Owner::find($id);
        $images = Owner::find($id)->menus;
        $photos = Owner::find($id)->photos;
        $content = Owner::find($id)->layouts;
        $days = Owner::find($id)->days;
        $reserves = Owner::find($id)->reserves;
        $lay = $content->layout;
        //$images = DB::table('menus')->where('rest_id',$id);
        //dd($images[0]->images);
        return view('customer.book',compact('data','images','photos','lay','days','reserves'));
    }

    public function myBookings(){
        $datas = User::find(Auth::user()->id)->reserves;
        
        return view('customer.myBookings',compact('datas'));
    }

    public function papi(){
        $content  = Owner::find(51,'id')->layouts;
        $lay = $content->layout;
         return view('customer.lay',compact('lay'));
    }

    public function reserve(Request $request, $id){
        
        $data = $request->all();

        $model = new Reserve;
        $model->user_id = Auth::user()->id;
        $model->owner_id = $id;
        $model->date = $data['date'];
        $model->time = $data['time'];
        $model->no_of_persons = $data['persons'];
        $model->table_no = $data['tableNo'];
        $model->save();
        return redirect()->route('home')->with('success','Reserved Successfully');
    }

    public function jani(){
        return view('customer.jani');
    }

    public function chus(Request $request){
        $data = $request->file[1];
        dd($data);
    }

    public function total(Request $request)
    {
        $model = Owner::find($request->id)->layouts;
        $model->total_tables = $request->total;
        $model->save();

        return response()->json(['success'=> 'vip jawan']);
    }
}
