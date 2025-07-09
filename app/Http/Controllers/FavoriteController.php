<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estate;

class FavoriteController extends Controller
{
    public function addToFavorites(Request $request)
    {
        \Log::info('Favori ekleme isteği:', $request->all());
        
        $estateId = $request->input('estate_id');
        \Log::info('Estate ID:', ['id' => $estateId]);
        
        // Estate'in var olduğunu kontrol et
        $estate = Estate::find($estateId);
        if (!$estate) {
            \Log::error('Estate bulunamadı:', ['id' => $estateId]);
            return response()->json([
                'success' => false,
                'message' => 'İlan bulunamadı'
            ]);
        }

        // Session'dan favorileri al
        $favorites = session('favorites', []);
        
        // Eğer zaten favorilerde varsa çıkar, yoksa ekle
        if (in_array($estateId, $favorites)) {
            $favorites = array_diff($favorites, [$estateId]);
            $message = 'Favorilerden çıkarıldı';
            $isFavorite = false;
        } else {
            $favorites[] = $estateId;
            $message = 'Favorilere eklendi';
            $isFavorite = true;
        }
        
        // Session'a kaydet
        session(['favorites' => array_values($favorites)]);
        
        return response()->json([
            'success' => true,
            'message' => $message,
            'isFavorite' => $isFavorite,
            'favoritesCount' => count($favorites),
            'favorites' => $favorites // Frontend'e favori listesini gönder
        ]);
    }

    public function getFavorites()
    {
        $favorites = session('favorites', []);
        $estates = Estate::whereIn('id', $favorites)->get();
        
        return view('web.favorites', compact('estates'));
    }

    public function removeFromFavorites(Request $request)
    {
        $estateId = $request->estate_id;
        
        $favorites = session('favorites', []);
        $favorites = array_diff($favorites, [$estateId]);
        session(['favorites' => array_values($favorites)]);
        
        return response()->json([
            'success' => true,
            'message' => 'Favorilerden çıkarıldı',
            'favoritesCount' => count($favorites),
            'favorites' => array_values($favorites)
        ]);
    }

    public function getFavoritesCount()
    {
        $favorites = session('favorites', []);
        return response()->json([
            'count' => count($favorites)
        ]);
    }

    // LocalStorage'dan favorileri senkronize et
    public function syncFavorites(Request $request)
    {
        $localStorageFavorites = $request->input('favorites', []);
        
        // Session'daki favorileri güncelle
        session(['favorites' => $localStorageFavorites]);
        
        return response()->json([
            'success' => true,
            'message' => 'Favoriler senkronize edildi',
            'favoritesCount' => count($localStorageFavorites)
        ]);
    }

    // Tüm favorileri temizle
    public function clearFavorites()
    {
        // Session'dan favorileri temizle
        session()->forget('favorites');
        
        // Log ekle
        \Log::info('Tüm favoriler temizlendi');
        
        return response()->json([
            'success' => true,
            'message' => 'Tüm favoriler temizlendi',
            'favoritesCount' => 0,
            'favorites' => []
        ]);
    }
} 