<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Tip;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function index(){
        $reviews = Review::all();

        return view('reviews.index', compact('reviews'));
    }

    public function show($id){
        $review = Review::find($id);
        return view('reviews.show', compact('review'));
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('reviews.index')->with('success', 'Build has been deleted successfully');

    }
}
