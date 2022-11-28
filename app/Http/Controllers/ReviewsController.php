<?php

namespace App\Http\Controllers;

use App\Models\Review;
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

    public function search(Request $request)
    {

        $reviews = Review::where('content', 'like', '%' . $request->search . '%')
            ->get();
        return view('reviews.index', compact('reviews'));
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('reviews.index')->with('success', 'Build has been deleted successfully');
    }
}
