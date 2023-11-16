<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Place;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'place_id' => 'required',
            'user_id' => 'required',
            'star' => 'required',
        ]);

        $result = Rating::where('place_id',$request->place_id)->where('user_id',$request->user_id)->first();

        if(!$result){
            Rating::create([
                'place_id' => $request->place_id,
                'user_id' => $request->user_id,
                'rating' => $request->star,
            ]);
        }else{
            $result->update([
                'rating' => $request->star,
            ]);
        }

        return back();
    } 

    public function read($place_id)
    {
        $place_rating = Place::find($place_id);
        $total_rating = $place_rating->rating()->sum('rating');
        $total_people = count($place_rating->rating);
        $rating = intval($total_rating / $total_people);

        return response()->json(
            $rating
        );
    }
}
