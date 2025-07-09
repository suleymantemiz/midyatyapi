<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Estate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'estate_id' => 'required|exists:estates,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|string|min:10',
            'rating' => 'required|integer|min:1|max:5'
        ], [
            'name.required' => 'Ad alanı zorunludur.',
            'email.required' => 'E-posta alanı zorunludur.',
            'email.email' => 'Geçerli bir e-posta adresi giriniz.',
            'comment.required' => 'Yorum alanı zorunludur.',
            'comment.min' => 'Yorum en az 10 karakter olmalıdır.',
            'rating.required' => 'Puan seçimi zorunludur.',
            'rating.min' => 'Puan 1-5 arasında olmalıdır.',
            'rating.max' => 'Puan 1-5 arasında olmalıdır.'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $review = Review::create([
                'estate_id' => $request->estate_id,
                'name' => $request->name,
                'email' => $request->email,
                'comment' => $request->comment,
                'rating' => $request->rating,
                'is_approved' => false // Admin onayı bekler
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Yorumunuz başarıyla gönderildi. Admin onayından sonra yayınlanacaktır.',
                'review' => $review
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Yorum gönderilirken bir hata oluştu.'
            ], 500);
        }
    }

    public function getReviews($estateId)
    {
        $estate = Estate::findOrFail($estateId);
        $reviews = $estate->approvedReviews()->orderBy('created_at', 'desc')->get();

        $html = view('web.partials.reviews', compact('reviews', 'estate'))->render();
        
        return response($html);
    }
} 