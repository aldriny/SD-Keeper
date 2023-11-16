<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\CustomerController;
use App\Http\Controllers\Auth\RatingController;
use App\Http\Controllers\Auth\UserController;


use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $latitude1 = Session::get('lat');
    $longitude1 = Session::get('long');
    if($latitude1 != null || $longitude1 != null){
        return redirect()->route('user.dashboard');
    }else{
        return view('FrontEnd.Users.user-location');
    }
});

Route::post('/', function (Request $request) {
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
    return redirect()->route('user.dashboard');
})->name('get.location');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


/////////////////////////////////////////////////////////////////////////////////////////////////////////
//-- Admins Routes --//

Route::post('/admin/check',[LoginController::class,'process_admin_login'])->name('admin.login2');
Route::post('/admin/save',[LoginController::class,'process_admin_signup'])->name('admin.register2');

Route::get('/admin/registergg5dfgjl32gk1qq',[LoginController::class,'show_signup_form'])->name('admin.register1')->middleware('guest:admins');
Route::get('/admin/login',[LoginController::class,'show_login_form'])->name('admin.login1')->middleware('guest:admins');

Route::middleware('PreventBackHistory','auth:admins')->group(function(){
    Route::get('/admin/logout',[LoginController::class,'admin_logout'])->name('admin.logout');
    Route::get('/admin/dashboard',[LoginController::class,'admin_dashboard'])->name('admin.dashboard');
    Route::get('/admin/add-place',[LoginController::class,'show_add_place'])->name('admin.add.place');
    Route::post('/admin/view-places', [LoginController::class, 'add_place'])->name('admin.add.places');
    Route::get('/admin/view-places',[LoginController::class,'view_places'])->name('admin.view.places');;
    Route::get('/admin/show-place/{id}', [LoginController::class, 'show_place'])->name('admin.show.place');
    Route::post('/admin/edit-place/{id}', [LoginController::class, 'edit_place'])->name('admin.edit.place');
    Route::get('/admin/delete-place/{id}', [LoginController::class, 'delete_place'])->name('admin.delete.place');
    
    Route::get('/admin/partner-requests', [LoginController::class, 'partner_req'])->name('admin.partner.req');
    Route::get('/admin/partner-reports', [LoginController::class, 'partner_rep'])->name('admin.partner.rep');


});
/////////////////////////////////////////////////////////////////////////////////////////////////////////
//-- Customers Routes --//


Route::post('/customer/check/',[CustomerController::class,'process_admin_login'])->name('customer.login2');
Route::get('/customer/login',[CustomerController::class,'show_login_form'])->name('customer.login1')->middleware('guest:customers');

Route::middleware('PreventBackHistory','auth:customers')->group(function(){
    Route::get('/customer/logout',[CustomerController::class,'admin_logout'])->name('customer.logout');

    Route::get('/customer/dashboard/',[CustomerController::class,'admin_dashboard'])->name('customer.dashboard');

    Route::get('/customer/view-place/',[CustomerController::class,'view_place'])->name('customer.view.place');

    Route::get('/customer/edit-place/',[CustomerController::class,'edit_place'])->name('customer.edit');

    Route::post('/customer/view-place/',[CustomerController::class,'edit_myplace'])->name('customer.edit.myplace');

    Route::get('/customer/change-password/',[CustomerController::class,'show_change_password'])->name('show.change.password');
    Route::post('/customer/change-password/',[CustomerController::class,'change_password'])->name('change.password');


});
/////////////////////////////////////////////////////////////////////////////////////////////////////////
//-- Users Routes --//



Route::middleware('PreventBackHistory','auth')->group(function(){
    Route::post('/rating',[RatingController::class,'store'])->name('rating.store');
    Route::get('/rating/read/{id}',[RatingController::class,'read'])->name('rating.read');
    Route::get('auth/logout',[UserController::class,'user_logout'])->name('user.logout');
    Route::get('/user/change-password/',[UserController::class,'show_change_password'])->name('user.change.password1');
    Route::post('/user/change-password/',[UserController::class,'change_password'])->name('user.change.password2');
    Route::get('/user/profile',[UserController::class,'user_profile'])->name('user.profile');
    Route::get('/user/profile/settings',[UserController::class,'profile_settings'])->name('profile.settings');
    Route::post('/user/profile/settings',[UserController::class,'profile_settings2'])->name('profile.settings2');
});
Route::post('/user/check/',[UserController::class,'process_user_login'])->name('user.login2');
Route::get('/user/login',[UserController::class,'show_login_form'])->name('user.login1')->middleware('guest:web');
Route::get('/user/register',[UserController::class,'show_signup_form'])->name('user.register1')->middleware('guest:web');
Route::post('/user/save',[UserController::class,'process_user_signup'])->name('user.register2')->middleware('guest:web');
Route::get('/user/become-partner',[UserController::class,'show_become_partner'])->name('user.become.partner')->middleware('guest:web');
Route::post('/user/become-partner/',[UserController::class,'become_partner2'])->name('become.partner2')->middleware('guest:web');
Route::get('/user/dashboard/',[UserController::class,'user_dashboard'])->name('user.dashboard')->middleware('CheckLocation');
Route::post('/user/dashboard/',[UserController::class,'become_partner'])->name('become.partner')->middleware('CheckLocation');
Route::get('/user/view-place/{id}/{distance}',[UserController::class,'show_user_place'])->name('user.show.place')->middleware('CheckLocation');
Route::get('/user/search/',[UserController::class,'show_search_places'])->name('user.search')->middleware('CheckLocation');
Route::get('/user/{type}',[UserController::class,'show_places'])->name('user.show.places')->middleware('CheckLocation');


