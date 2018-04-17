<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Respone;
use Carbon\Carbon;
use App\UserReview;
use Illuminate\Support\Facades\Input;

class UserReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $reviews = DB::table('user_review')->get();
        return \Response::json($reviews, 200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
   
        $rating = $request->input('rating');
        if ($rating < 1 || $rating > 5) {
             return response()->json("Bad Request, Rating harus diantara 1 dan 5", 400);
        }
        $review = UserReview::create($request->all());
        return response()->json($request, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $review=UserReview::find($id);
        if(is_null($review))
        {
             return \Response::json("not found",404);
        }
     
        return \Response::json($review,200);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $rating = $request->input('rating');
        $review=UserReview::find($id);
        if(is_null($review))
        {
            return \Response::json("not found",404);
        } else if ($rating != null && ($rating < 1 || $rating > 5)) {
             return response()->json("Bad Request, Rating harus diantara 1 dan 5", 400);
        }
        $review->update($request->all());

        return response()->json($review, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
            $review=UserReview::find($id);
            if(is_null($review))
            {
                return \Response::json("not found",404);
            }
         
            $success=$review->delete();
         
            if(!$success)
            {
                return \Response::json("error deleting",500);
            }
         
            return \Response::json("success",200);
    }
}
