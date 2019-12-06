<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

use Auth;
use App\Menu;
use App\Day;
use App\Photo;

use App\Owner;
class RegController extends Controller
{
  
    use RegistersUsers;

    public function showform(){
        return view('owner.rest-register');
    }

    
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/owner';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:owner');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    public function register(Request $request)
    {
        //  dd($request->all());
        
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);
      
        if($request->hasFile('file')){
        
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
        if($request->hasFile('photo')){
        
            // Get filename with the extension
            foreach ($request->photo as $photo){

            $filenameWithExt = $photo->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $photo->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
           // Upload Image
           
           $path = $photo->storeAs('public/photos', $fileNameToStore);

           $photoModel = new Photo;
           $photoModel->owner_id = Auth::guard('owner')->user()->id;
           $photoModel->photo = $fileNameToStore;
           $photoModel->save();
       
        }
        } 
       
      
         $data = $request->all();
          for($i=1; $i<=7; $i++){
              if(isset($data[$i]) && !is_null($data[$i])){
                  $Model = new Day;
                  $Model->owner_id = Auth::guard('owner')->user()->id;
                  $Model->day = $data[$i];
                  $Model->save();
              }    
          }

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('owner');
    }



    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:owners'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'string', 'max:255','unique:owners'],
            'city' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'from' => 'required',
            'to' => 'required',
            

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Owner
     */
    protected function create(array $data)
    {
        
        return Owner::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'city' => $data['city'],
            'address' => $data['address'],
            'open_from' => $data['from'],
            'open_to' => $data['to'],

        ]);

    }

 
}


    