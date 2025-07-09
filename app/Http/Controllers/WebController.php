<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estate;
use App\Mail\ContactFormMail;
use App\Mail\ContactFormAutoReply;
use Illuminate\Support\Facades\Mail;

class WebController extends Controller
{
    public function index(Request $request)
    {
        // Eğer arama parametreleri varsa arama yap
        if ($request->hasAny(['type', 'status', 'price_min', 'price_max', 'neighborhood'])) {
            return $this->search($request);
        }

        // Featured estates (özel teklifler)
        $featuredEstates = Estate::where('is_featured', true)->latest()->take(6)->get();
        
        // Statistics
        $totalEstates = Estate::count();
        $saleEstates = Estate::where('status', 'Satılık')->count();
        $rentEstates = Estate::where('status', 'Kiralık')->count();
        $totalParcels = 0; // Parsel sorgulama özelliği mevcut ama sayı göstermeye gerek yok
        
        // Ana sayfa içerikleri
        $homeContent = \App\Models\HomeContent::first();
        
        // Pass featured estates to the view so section can use them
        view()->share('featuredEstates', $featuredEstates);
        view()->share('homeContent', $homeContent);
        
        return view('web.welcome', compact('featuredEstates', 'totalEstates', 'saleEstates', 'rentEstates', 'totalParcels', 'homeContent'));
    }

    public function search(Request $request)
    {
        $query = Estate::query();

        // Debug: Log the request parameters
        \Log::info('Search request parameters:', $request->all());

        // Basic filters
        if ($request->filled('type')) {
            $query->where('type', $request->type);
            \Log::info('Filtering by type: ' . $request->type);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
            \Log::info('Filtering by status: ' . $request->status);
        }

        if ($request->filled('price_min')) {
            $query->where('price', '>=', $request->price_min);
            \Log::info('Filtering by min price: ' . $request->price_min);
        }

        if ($request->filled('price_max')) {
            $query->where('price', '<=', $request->price_max);
            \Log::info('Filtering by max price: ' . $request->price_max);
        }

        // Detailed filters based on type
        if ($request->filled('gross_m2')) {
            $query->where('gross_m2', '>=', $request->gross_m2);
        }

        if ($request->filled('net_m2')) {
            $query->where('net_m2', '>=', $request->net_m2);
        }

        if ($request->filled('number_of_rooms')) {
            $query->where('number_of_rooms', $request->number_of_rooms);
        }

        if ($request->filled('heating')) {
            $query->where('heating', $request->heating);
        }

        if ($request->filled('open_area_m2')) {
            $query->where('open_area_m2', '>=', $request->open_area_m2);
        }

        if ($request->filled('title_deed_status')) {
            $query->where('title_deed_status', $request->title_deed_status);
        }

        if ($request->filled('from_person')) {
            $query->where('from_person', $request->from_person);
        }

        if ($request->filled('parking')) {
            $query->where('parking', $request->parking);
        }

        if ($request->filled('usage_status')) {
            $query->where('usage_status', $request->usage_status);
        }

        if ($request->filled('site_content')) {
            $query->where('site_content', $request->site_content);
        }

        // Mahalle filtresi
        if ($request->filled('neighborhood')) {
            $query->where('address', 'like', '%' . $request->neighborhood . '%');
        }

        // Eğer hiçbir filtre seçilmemişse tüm ilanları göster
        $estates = $query->latest()->paginate(12);
        
        // Debug: Log the results
        \Log::info('Search results count: ' . $estates->count());
        \Log::info('SQL Query: ' . $query->toSql());
        \Log::info('SQL Bindings: ' . json_encode($query->getBindings()));

        // Ana sayfa içerikleri
        $homeContent = \App\Models\HomeContent::first();
        
        // Featured estates (özel teklifler)
        $featuredEstates = Estate::where('is_featured', true)->latest()->take(6)->get();
        
        // Pass featured estates to the view so section can use them
        view()->share('featuredEstates', $featuredEstates);
        view()->share('homeContent', $homeContent);
        
        // Arama sonuçlarını ana sayfada göster
        return view('web.welcome', compact('estates', 'request', 'homeContent', 'featuredEstates'));
    }

    public function show($id)
    {
        $estate = Estate::with('gallery')->findOrFail($id);
        
        // Debug bilgisi
        \Log::info('Estate ID: ' . $estate->id);
        \Log::info('Gallery Count: ' . ($estate->gallery ? $estate->gallery->count() : 'NULL'));
        if ($estate->gallery) {
            foreach ($estate->gallery as $image) {
                \Log::info('Gallery Image: ' . $image->image);
                \Log::info('Full Image URL: ' . asset('storage/' . $image->image));
            }
        }
        
        $relatedEstates = Estate::where('type', $estate->type)
                               ->where('id', '!=', $estate->id)
                               ->take(4)
                               ->get();

        return view('web.estate-detail', compact('estate', 'relatedEstates'));
    }

    public function properties()
    {
        $estates = Estate::latest()->paginate(3); // Her sayfada 3 ilan göster
        return view('web.properties', compact('estates'));
    }

    public function advancedSearch()
    {
        return view('web.advanced-search');
    }

    public function about()
    {
        $aboutContent = \App\Models\AboutContent::first();
        return view('web.about', compact('aboutContent'));
    }

    public function services()
    {
        $serviceContent = \App\Models\ServiceContent::first();
        return view('web.services', compact('serviceContent'));
    }

    public function contact()
    {
        $contactContent = \App\Models\ContactContent::first();
        return view('web.contact', compact('contactContent'));
    }

    public function sendContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'required|string|max:20',
            'subject' => 'required|string|max:200',
            'message' => 'required|string|max:1000',
        ]);

        $data = $request->all();

        try {
            // Admin'e mail gönder
            Mail::to('info@midyatyapi.com.tr')->send(new ContactFormMail($data));

            // Kullanıcıya otomatik yanıt gönder
            Mail::to($data['email'])->send(new ContactFormAutoReply($data));
            
            // Mail bilgilerini log'a yaz
            \Log::info('İletişim formu gönderildi:', $data);

            return response()->json([
                'success' => true,
                'message' => 'Mesajınız başarıyla gönderildi. En kısa sürede size dönüş yapacağız.'
            ]);
        } catch (\Exception $e) {
            \Log::error('Mail gönderme hatası: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Mesaj gönderilirken bir hata oluştu. Lütfen daha sonra tekrar deneyin.'
            ], 500);
        }
    }

    /**
     * TKGM Parsel Sorgulama API Entegrasyonu
     */
    public function tkgmParselSorgula(Request $request)
    {
        $request->validate([
            'ada' => 'required|numeric',
            'parsel' => 'required|numeric',
        ]);

        try {
            $parsel = new \ParselSorgulama();
            $sonuc = $parsel->parselBilgiGetir($request->ada, $request->parsel);

            return response()->json([
                'success' => true,
                'data' => $sonuc
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Parsel sorgulama başarısız: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * TKGM Parsel Sorgu Web API'sine doğrudan cURL ile istek (eğitim amaçlı)
     */
    public function tkgmParselSorguCurl(Request $request)
    {
        $request->validate([
            'il' => 'required|string',
            'ilce' => 'required|string',
            'mahalle' => 'required|string',
            'ada' => 'required|string',
            'parsel' => 'required|string',
        ]);

        $payload = [
            "il" => $request->il,
            "ilce" => $request->ilce,
            "mahalle" => $request->mahalle,
            "ada" => $request->ada,
            "parsel" => $request->parsel
        ];

        $ch = curl_init('https://parselsorgu.tkgm.gov.tr/api/parsel/');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Accept: application/json'
        ]);
        $response = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        curl_close($ch);

        return response()->json([
            'httpcode' => $httpcode,
            'error' => $error,
            'response' => json_decode($response, true)
        ]);
    }
}
