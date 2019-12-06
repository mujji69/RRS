<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reserve;
use App\Owner;
use App\Layout;
use Auth;


class OwnerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
          $this->middleware('auth:owner');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         $datas = Owner::find(Auth::guard('owner')->user()->id)->layouts;
        
        return view('owner.landing',compact('datas'));
    }
    public function bookings($id)
    {
        $datas = Owner::find($id)->reserves;
        
        return view('owner.bookings',compact('datas'));
    }
    

    public function kedit()
    {
        
        return view('kedit');
    }
   
    public function destroy($id)
    {
        $data = Reserve::find($id);
        $data->delete();
        return redirect()->route('bookings',$data->owner_id)
                        ->with('success', 'removed successfully');
    }

    public function storeLayout(Request $request){
        $data = $request->all();
        $model = new Layout;
        $model->owner_id = Auth::guard('owner')->user()->id;
        $model->layout = $data['content'];
        $model->save();
        return response()->json(['success'=> 'vip hogya']);
        
    }


}
