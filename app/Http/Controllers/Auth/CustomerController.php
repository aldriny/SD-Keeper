<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Place;
use App\Models\Edit;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    function show_login_form(){
        return view('Dashboards.CustomersLoginSystem.login');
    }

    function show_signup_form(){
        return view('Dashboards.CustomersLoginSystem.register');
    }

    function process_admin_login(Request $request){   
        //Validate Requests
        $credentials = $request-> validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12',
        ]);

        $myPlace = Place::whereEmail($request->email)->first();
        Session::put('myPlace', $myPlace);


        if(Auth::guard('customers')->attempt($credentials)){
            return redirect('customer/dashboard');
        }else{
            return back()->with('fail','Invalid Input');
        }
    }

    function admin_dashboard(){        
        return view('Dashboards.Customers.index');
    }

    
    function admin_logout(Request $request){
        Auth::guard('customers')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('customer.login1');
    }
////////////////////////////////////////////////////////////////////////////////////////////////////////
    function view_place(){
        $myPlace = Session::get('myPlace');
        return view('Dashboards.Customers.view-place', ['myPlace'=>$myPlace]);
    }
////////////////////////////////////////////////////////////////////////////////////////////////////////
    function edit_place(Request $request){
        $myPlace = Session::get('myPlace');

        return view('Dashboards.Customers.edit-myplace',['myPlace'=>$myPlace]);
    }

    function edit_myplace(Request $request){

        //Validate requests
        $request -> validate([
            'name'=>'required',
            'area'=>'required',
            'email'=>'required|email',
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
        $myEdit = new Edit;
        $myEdit->name = $request->name;
        $myEdit->area = $request->area;
        $myEdit->email = $request->email;
        $myEdit->long = $request->long;
        $myEdit->lat = $request->lat;
        $myEdit->type = $request->type;
        $myEdit->filenames = $files;
        $myEdit->phone_number = $request->phone;

        $save = $myEdit->save();
        if($save){
            return redirect()->route('customer.view.place')->with('success','Edit request has been sent successfuly!');
        }
        else{
            return back()->with('fail','something went wrong, please try again');
        }       
    }
////////////////////////////////////////////////////////////////////////////////////////////////////////
    function show_change_password()
    {
        return view('Dashboards.Customers.change-password');
    } 

    function change_password(Request $request)
    {
        $myPlace = Session::get('myPlace');
        $request->validate([
            'current_password' => 'required',
            'password'=>'required|min:5|max:12',
            'password_confirmation'=>'required|same:password|min:5|max:12',
        ]);     
        $current_confirm = Hash::check($request->current_password, $myPlace->password);
        if($current_confirm){
            $myPlace->password = Hash::make($request->password);
            $save = $myPlace->save();
            return redirect()->route('show.change.password')->with('success','Password changed successfully!');

        }
        else{
            return back()->with('fail','something went wrong, please try again');
        }
}

}
