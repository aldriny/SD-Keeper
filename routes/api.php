<?php

use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('board/reads',function(Request $request){
    $validator = Validator::make($request->all(),[
        'numin' => 'required',
        'api_key' => 'required',
    ]);

    if($validator->fails()){
        return response()->json([
            'message' => $validator->errors(),
        ]);
    }

    $data = explode('|',$request->api_key);
    if(count($data) != 2){
        return response()->json([
            'message' => 'Unauthorized.'
        ]);
    }

    $place_id = $data[0];
    $token = $data[1];

    $place = Place::where('id',$place_id)->where('access_token',$token)->first();

    if(!$place){
        return response()->json(['message' => 'Unauthorized']);
    }

    $area = $place->area;

    $total_people = ($request->numin > 0)? $request->numin:1;

    if($area / $total_people >= 2){
        if($place->safety != 'safe'){
            $place->update([
                'safety' => 'safe',
            ]);
            $place->notify('Your Place is safe now!');

        }
    }else{
        if($place->safety != 'not safe'){
            $place->update([
                'safety' => 'not safe',
            ]);

            $place->notify('Alert, your place is at maximum capacity! Place is marked as not safe.');
        }
    }

    return response()->json([
        'message' => 'success'
    ]);
});
