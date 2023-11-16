<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;


use Illuminate\Http\Request;
use App\Models\Place;
use App\Models\User;
use App\Models\Partner;
use App\Models\Rating;


class UserController extends Controller
{
    function show_login_form(){
        return view('FrontEnd.UsersLoginSystem.login');
    }

    function show_signup_form(){
        return view('FrontEnd.UsersLoginSystem.register');
    }

    function process_user_signup(Request $request){
        //Validate requests
        $request -> validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:12',
            'password_confirmation'=>'required|same:password|min:5|max:12',
            'country'=>'required|not_in:0',
            'birth_date'=>'required',
            'image'=>'sometimes|image|mimes:jpg,jpeg,bmp,svg,png'
        ]);

        if ($request->has('image')){
            $fileUploaded = request()->file('image');
            $fileName = time().'.'.$fileUploaded->getClientOriginalExtension();
            $filePath = public_path('files');
            $fileUploaded->move($filePath,$fileName);

                    //Insert data into DB
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->country = $request->country;
        $user->birth_date = $request->birth_date;
        $user->image = $fileName;
         }


        $save = $user->save();
        if($save){
            return redirect()->route('user.login1')->with('success','New user has been created, please login');
        }
        else{
            return back()->with('fail','something went wrong, please try again later');
        }
    }

    function process_user_login(Request $request){
        //Validate Requests
        $credentials = $request-> validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12',
        ]);

        $getLong = $request->input('userLong');
        $getLat = $request->input('userLat');
        $getAcc = $request->input('userAcc');
        if($getLong === null || $getLat === null || $getAcc === null){
            return back()->with('fail','Please allow location');
        }
        $latitude1 = $getLat;
        $longitude1 = $getLong;
        Session::put('long', $getLong);
        Session::put('lat', $getLat);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('user/dashboard');
        }else{
            return back()->with('fail','Invalid Input');
        }
    }

    function user_dashboard(Request $request){
        return view('FrontEnd.Users.index');
    }

    
    function user_logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('user.login1');
    }


    function show_become_partner(){
        return view('FrontEnd.UsersLoginSystem.become-partner');
    }

    function become_partner2(Request $request){

        //Validate requests
        $request -> validate([
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required|regex:/(01)[0-9]{9}/',
            'msg'=>'required|min:3|max:1000',
        ]);
        $partner = new Partner;
        $partner->name = $request->name;
        $partner->email = $request->email;
        $partner->phone = $request->phone;
        $partner->msg = $request->msg;
    
        $save = $partner->save();
        if($save){
            return redirect()->route('user.become.partner')->with('success','Your request has been sent!');
        }
        else{
            return back()->with('fail','something went wrong, please try again');
        }
    
    }
//////////////////////////////////////////////////////////////////////////////////////////////////////// 
function become_partner(Request $request){

    //Validate requests
    $request -> validate([
        'name'=>'required',
        'email'=>'required|email',
        'phone'=>'required|regex:/(01)[0-9]{9}/',
        'msg'=>'required|min:3|max:1000',
    ]);
    $partner = new Partner;
    $partner->name = $request->name;
    $partner->email = $request->email;
    $partner->phone = $request->phone;
    $partner->msg = $request->msg;

    $save = $partner->save();
    if($save){
        return redirect()->route('user.dashboard')->with('success','Your request has been sent successfully!');
    }
    else{
        return back()->with('fail','something went wrong, please try again');
    }

}
//////////////////////////////////////////////////////////////////////////////////////////////////////// 

function show_user_place(){
    $get_id = request('id');
    $get_distance = request('distance');
    $show_place = Place::where('id','=',$get_id)->first();

    $total_rating = $show_place->rating()->sum('rating');
    $total_people = count($show_place->rating);
    if($total_people > 0){
        $rating = intval($total_rating / $total_people);

    }else{
        $rating = 0;
    }

    $user_rating = 0;

    if($show_place->rating){
        foreach($show_place->rating as $rate){
            if($rate->user_id == Auth::id()){
                $user_rating = $rate->rating;
            }
        }
    }

    return view('FrontEnd.Users.show-place_info', ['show_place'=>$show_place, 'distance'=>$get_distance,'rating' => $rating,'total_people' => $total_people, 'user_rating' => $user_rating]);
}

function show_search_places(Request $request){

    $search = $request->input('search');
    
    $latitude1 = Session::get('lat');
    $longitude1 = Session::get('long');

    $places = DB::table("places")
    ->where('name', 'LIKE', '%' . $search . '%')
    ->orWhere('type', 'LIKE', '%' . $search . '%')

    ->select('places.id','places.name','places.long','places.lat','places.type','places.safety'
        ,DB::raw("6371 * acos(cos(radians(".$latitude1.")) 
        * cos(radians(places.lat)) 
        * cos(radians(places.long) - radians(".$longitude1.")) 
        + sin(radians(".$latitude1.")) 
        * sin(radians(places.lat))) AS distance"))
        ->orderBy('safety', 'desc')
        ->orderBy('distance', 'asc')
        ->get();        
    return view('FrontEnd.Users.search',['places'=>$places]);
}

public function show_places($type)
{
    $latitude1 = Session::get('lat');
    $longitude1 = Session::get('long');
    $places = DB::table("places")
    ->where('type','=',$type)
    ->select('places.id','places.name','places.long','places.lat','places.type','places.safety'
        ,DB::raw("6371 * acos(cos(radians(".$latitude1.")) 
        * cos(radians(places.lat)) 
        * cos(radians(places.long) - radians(".$longitude1.")) 
        + sin(radians(".$latitude1.")) 
        * sin(radians(places.lat))) AS distance"))
        ->orderBy('safety', 'desc')
        ->orderBy('distance', 'asc')
        ->get();        

    return view('FrontEnd.Users.show_place', ['places'=>$places]);
}
////////////////////////////////////////////////////////////////////////////////////////////////////////

function user_profile(Request $request){
    $username = Auth::user()->name;
    return view('FrontEnd.Users.profile',['username'=>$username]);    
}

function profile_settings(){
    return view('FrontEnd.Users.profile-settings');    
}

function profile_settings2(Request $request){
    $id = Auth::user()->id;
    $user = User::find($id);
    $request -> validate([
        'name'=>'required',
        'country'=>'required|not_in:0',
        'birth_date'=>'required',
        'image'=>'sometimes|image|mimes:jpg,jpeg,bmp,svg,png'
    ]);
    if ($request->has('image')){
        $fileUploaded = request()->file('image');
        $fileName = time().'.'.$fileUploaded->getClientOriginalExtension();
        $filePath = public_path('files');
        $fileUploaded->move($filePath,$fileName);
        //Insert data into DB
        $user->name = $request->name;
        $user->country = $request->country;
        $user->birth_date = $request->birth_date;
        $user->image = $fileName;
     }
    $save = $user->save();
    if($save){
        return redirect()->route('user.profile')->with('success','Your data has been updated');
    }
    else{
        return back()->with('fail','something went wrong, please try again later');
    }


}
    function show_change_password(){
        return view('FrontEnd.Users.profile-password');
    }
    function change_password(Request $request)
    {
        $user_id = Auth::User()->id;                       
        $obj_user = User::find($user_id);
        $request->validate([
            'current_password' => 'required',
            'password'=>'required|min:5|max:12',
            'password_confirmation'=>'required|same:password|min:5|max:12',
        ]);     
        $current_confirm = Hash::check($request->current_password, $obj_user->password);
        if($current_confirm){
            $obj_user->password = Hash::make($request->password);
            $save = $obj_user->save();
            return redirect()->route('user.change.password1')->with('success','Password changed successfully!');
        }
        else{
            return back()->with('fail','something went wrong, please try again');
        }
}
}
