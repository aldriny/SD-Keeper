<?php

namespace App\Http\Controllers\Auth;

use App\Models\Admin;
use App\Models\Place;
use App\Models\Edit;
use App\Models\Partner;
use Illuminate\Support\Str;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\Mail\MailSend;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{  

    function show_login_form(){
        return view('Dashboards.AdminsLoginSystem.login');
    }

    function show_signup_form(){
        return view('Dashboards.AdminsLoginSystem.register');
    }

    function process_admin_signup(Request $request){
        //Validate requests
        $request -> validate([
            'name'=>'required',
            'email'=>'required|email|unique:admins',
            'password'=>'required|min:5|max:12',
            'password_confirmation'=>'required|same:password|min:5|max:12',
        ]);

        //Insert data into DB
        $admin = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
    
        $save = $admin->save();
        if($save){
            return redirect()->route('admin.login1')->with('success','New user has been created, please login');
        }
        else{
            return back()->with('fail','something went wrong, please try again later');
        }
    }

    function process_admin_login(Request $request){
        //Validate Requests
        $credentials = $request-> validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12',
        ]);

        if(Auth::guard('admins')->attempt($credentials)){
            $request->session()->regenerate();
            return redirect('admin/dashboard');
        }else{
            return back()->with('fail','Invalid Input');
        }
    }

    function admin_dashboard(){
        return view('Dashboards.Admins.index');
    }

    
    function admin_logout(Request $request){
        Auth::guard('admins')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login1');
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////
    function show_add_place(){
        return view('Dashboards.Admins.add-place');
    }
    function add_place(Request $request){
                //Validate requests
                $request -> validate([
                    'name'=>'required',
                    'area'=>'required',
                    'email'=>'required|email:filter|unique:places',
                    'long'=>'required|between:-180,180|numeric|between:0,99.99',
                    'lat'=>'required|between:-90,90|numeric|between:0,99.99',
                    'type'=>'required|not_in:0',
                    'filenames' => 'required',
                    'filenames.*' => 'image',
                    'phone' => 'required|regex:/(20)[0-9]{9}/|min:12'
                ]);
                $files = [];
                if($request->hasfile('filenames'))
                 {
                    foreach($request->file('filenames') as $file)
                    {
                        $name = time().rand(1,100).'.'.$file->extension();
                        $file->move(public_path('files'), $name);  
                        $files[] = $name;  
                    }
                 }   

                $access_token = Str::random(30);
                $password = Str::random(10);
                //Insert data into DB
                $place = new Place;
                $place->name = $request->name;
                $place->area = $request->area;
                $place->email = $request->email;
                $place->password = Hash::make($password);
                $place->phone_number = $request->phone;
                $place->long = $request->long;
                $place->lat = $request->lat;
                $place->type = $request->type;
                $place->filenames = $files;
                $place->access_token = $access_token;
                $save = $place->save();

                Mail::to($request->email)->send(new MailSend(['password' => $password]));
                if($save){
                    return redirect()->route('admin.view.places')->with('success','New place has been added successfuly');
                }
                else{
                    return back()->with('fail','something went wrong, please try again');
                }
    }
////////////////////////////////////////////////////////////////////////////////////////////////////////
    function view_places(){
        $places = Place::all();
        return view('Dashboards.Admins.view-places', ['places'=>$places]);
    }
    function show_place($id, Request $request){

    $places = Place::find($id);
        return view('Dashboards.Admins.edit-place',['places'=>$places]);
    }

    function edit_place($id, Request $request){
        $places = Place::find($id);
        //Validate requests
        $request -> validate([
            'name'=>'required',
            'area'=>'required',
            'long'=>'required|between:-180,180|numeric|between:0,99.99',
            'lat'=>'required|between:-90,90|numeric|between:0,99.99',
            'type'=>'required|not_in:0',
            'filenames' => 'required',
            'filenames.*' => 'image',
            'phone' => 'required|regex:/(20)[0-9]{9}/|min:12'
        ]);
        $files = [];
        if($request->hasfile('filenames'))
            {
            foreach($request->file('filenames') as $file)
            {
                $name = time().rand(1,100).'.'.$file->extension();
                $file->move(public_path('files'), $name);  
                $files[] = $name;  
            }
            }   
        //Insert data into DB
        $places->name = $request->name;
        $places->phone_number = $request->phone;
        $places->area = $request->area;
        $places->long = $request->long;
        $places->lat = $request->lat;
        $places->type = $request->type;
        $places->filenames = $files;
        $save = $places->save();
        if($save){
            return redirect()->route('admin.view.places')->with('success','place has been edited successfully');
        }
        else{
            return back()->with('fail','something went wrong, please try again');
        }       
    }
    
    function delete_place($id, Request $request){
        $places = Place::find($id);
        $places->delete();
        return redirect()->route('admin.view.places');
    }
////////////////////////////////////////////////////////////////////////////////////////////////////////
    function partner_req(){

        $become_partner = Partner::all();
        return view('Dashboards.Admins.partner-req',['become_partner'=>$become_partner]);        
    }
////////////////////////////////////////////////////////////////////////////////////////////////////////
    function partner_rep(){
    
        $edits = Edit::all();
        return view('Dashboards.Admins.partner-rep', ['edits'=>$edits]);        
    }
}
////////////////////////////////////////////////////////////////////////////////////////////////////////
