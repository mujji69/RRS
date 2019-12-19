<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reserve;
use App\Owner;
use App\Layout;
use App\Day;
use App\Menu;
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

    public function editLayout(){
        $data = Owner::find(Auth::guard('owner')->user()->id)->layouts;
        return view('owner.editLayout',compact('data'));
    }

    public function updateLayout(Request $request){
        $model = Owner::find(Auth::guard('owner')->user()->id)->layouts;
        $data = $request->all();
        $model->layout =  $request['content'];
        $model->save();
        return response()->json(['success'=> 'vip hogya jani']);
     
    }
   
    public function editProfile(){
        $data = Owner::find(Auth::guard('owner')->user()->id);
        $days = Owner::find(Auth::guard('owner')->user()->id)->days;
        return view('owner.editProfile',compact('data','days'));
    }

    public function updateProfile(Request $request){
        $model = Owner::find(Auth::guard('owner')->user()->id);
        $days = Owner::find(Auth::guard('owner')->user()->id)->days;

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        //    'email' => ['required', 'string', 'email', 'max:255', 'unique:owners'],
          //  'phone' => ['required', 'string', 'max:255','unique:owners'],
            'city' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'from' => 'required',
            'to' => 'required',
            
        ]);

        $model->name = $request->name;
       // $model->email = $request->email;
       // $model->phone = $request->phone;
        $model->city = $request->city;
        $model->address = $request->address;
        $model->open_from = $request->from;
        $model->open_to = $request->to;

        $model->save();

        $data = $request->all();
        $days->each->delete();
          for($i=1; $i<=7; $i++){
              if(isset($data[$i]) && !is_null($data[$i])){
                  $Model1 = new Day;
                  $Model1->owner_id = Auth::guard('owner')->user()->id;
                  $Model1->day = $data[$i];
                  $Model1->save();
              }    
          }

        return redirect()->route('owner');
      
    }
   
    public function editMenu(){
        $datas = Owner::find(Auth::guard('owner')->user()->id)->menus;
        return view('owner.editMenu',compact('datas'));
    }

    public function updateMenu(Request $request){
        if($request->hasFile('file')){
           // dd($request->all());
        
            // Get filename with the extension
            foreach ($request->file as $file){

            $filenameWithExt = $file->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $file->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
           // Upload Image
           
           $path = $file->storeAs('public/menus', $fileNameToStore);

           $fileModel = new Menu;
           $fileModel->owner_id = Auth::guard('owner')->user()->id;
           $fileModel->images = $fileNameToStore;
           $fileModel->save();
       
        }
        }

        return redirect()->route('owner')->with('success','Added Seccesfull');
    }

    public function removeMenu($id){
        //dd($menu);
      //  $data = Owner::find(Auth::guard('owner')->user()->id)->menus->where('images',$menu);
        $data = Menu::find($id); 
      // dd($data);
      $data->delete();
      return redirect()->back()
      ->with('success', 'removed successfully');
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
