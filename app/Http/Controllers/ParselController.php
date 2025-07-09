<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estate;
use Illuminate\Support\Facades\Http;

class ParselController extends Controller
{
    /**
     * Parsel sorgulama sayfasını göster
     */
    public function index()
    {
        return view('web.parsel.index');
    }

    /**
     * Parsel sorgulama işlemi
     */
    public function search(Request $request)
    {
        $request->validate([
            'parcel_number' => 'required|string|max:100',
            'province' => 'required|string|max:100',
            'district' => 'required|string|max:100',
        ]);

        $parcelNumber = $request->parcel_number;
        $province = $request->province;
        $district = $request->district;

        // Burada gerçek parsel sorgulama API'si entegre edilecek
        // Şimdilik mock data döndürüyoruz
        $parcelData = $this->getMockParcelData($parcelNumber, $province, $district);

        return view('web.parsel.result', compact('parcelData', 'parcelNumber', 'province', 'district'));
    }

    /**
     * Parsel numarasına göre ilanları listele
     */
    public function estatesByParcel($parcelNumber)
    {
        $estates = Estate::where('parcel_number', $parcelNumber)->get();
        
        return view('web.parsel.estates', compact('estates', 'parcelNumber'));
    }

    /**
     * Mock parsel verisi (gerçek API entegrasyonu için hazır)
     */
    private function getMockParcelData($parcelNumber, $province, $district)
    {
        return [
            'parcel_number' => $parcelNumber,
            'province' => $province,
            'district' => $district,
            'neighborhood' => 'Örnek Mahalle',
            'block' => 'A',
            'parcel' => '123',
            'area' => '500 m²',
            'land_type' => 'Konut',
            'ownership_status' => 'Özel Mülkiyet',
            'cadastral_area' => '500.00 m²',
            'building_area' => '150.00 m²',
            'floor_count' => '2',
            'construction_year' => '2020',
            'zoning_status' => 'Konut Alanı',
            'restrictions' => 'Yok',
            'last_update' => now()->format('d.m.Y'),
        ];
    }
}
