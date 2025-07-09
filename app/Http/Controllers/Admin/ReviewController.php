<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Estate;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with('estate')->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.reviews.index', compact('reviews'));
    }

    public function approve($id)
    {
        $review = Review::findOrFail($id);
        $review->update(['is_approved' => true]);

        return redirect()->back()->with('success', 'Yorum onaylandı.');
    }

    public function reject($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->back()->with('success', 'Yorum reddedildi ve silindi.');
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->back()->with('success', 'Yorum silindi.');
    }
} 