<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Estate;
use App\Models\EstateImage;
use Illuminate\Support\Facades\Storage;

class EstateController extends Controller
{

    public function index()
    {
        $estates = Estate::all();
        return view('admin.estate.index', compact('estates'));
    }
    public function create()
    {
        return view('admin.estate.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'features' => 'nullable|string',
            'price' => 'required|numeric',
            'type' => 'required|string|max:50',
            'status' => 'required|string',
            'parcel_number' => 'nullable|string|max:100',
            'address' => 'nullable|string|max:500',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'main_image' => 'nullable|image',
            'gross_m2' => 'nullable|integer|min:0',
            'net_m2' => 'nullable|integer|min:0',
            'open_area_m2' => 'nullable|integer|min:0',
            'number_of_rooms' => 'nullable|string|max:50',
            'building_age' => 'nullable|integer|min:0',
            'number_of_floors' => 'nullable|integer|min:0',
            'heating' => 'nullable|string|max:100',
            'number_of_bathrooms' => 'nullable|integer|min:0',
            'kitchen' => 'nullable|string|max:100',
            'parking' => 'nullable|string|max:100',
            'furnished' => 'nullable|string|max:10',
            'usage_status' => 'nullable|string|max:100',
            'site_content' => 'nullable|string|max:255',
            'site_name' => 'nullable|string|max:255',
            'help_tl' => 'nullable|numeric|min:0',
            'available_for_credit' => 'nullable|string|max:10',
            'title_deed_status' => 'nullable|string|max:100',
            'from_person' => 'nullable|string|max:100',
            'exchange' => 'nullable|string|max:10',
            'is_featured' => 'nullable|boolean',
        ]);

        // Ana resmi yükle
        $mainImagePath = null;
        if ($request->hasFile('main_image')) {
            $mainImagePath = $request->file('main_image')->store('estates/main', 'public');
        }

        // Estate kaydı oluştur
        $estate = Estate::create([
            'type' => $validated['type'],
            'status' => $validated['status'],
            'name' => $validated['name'],
            'price' => $validated['price'],
            'main_image' => $mainImagePath,
            'parcel_number' => $validated['parcel_number'] ?? null,
            'address' => $validated['address'] ?? null,
            'latitude' => $validated['latitude'] ?? null,
            'longitude' => $validated['longitude'] ?? null,
            'features' => $validated['features'] ?? null,
            'gross_m2' => $validated['gross_m2'] ?? null,
            'net_m2' => $validated['net_m2'] ?? null,
            'open_area_m2' => $validated['open_area_m2'] ?? null,
            'number_of_rooms' => $validated['number_of_rooms'] ?? null,
            'building_age' => $validated['building_age'] ?? null,
            'number_of_floors' => $validated['number_of_floors'] ?? null,
            'heating' => $validated['heating'] ?? null,
            'number_of_bathrooms' => $validated['number_of_bathrooms'] ?? null,
            'kitchen' => $validated['kitchen'] ?? null,
            'parking' => $validated['parking'] ?? null,
            'furnished' => $validated['furnished'] ?? null,
            'usage_status' => $validated['usage_status'] ?? null,
            'site_content' => $validated['site_content'] ?? null,
            'site_name' => $validated['site_name'] ?? null,
            'help_tl' => $validated['help_tl'] ?? null,
            'available_for_credit' => $validated['available_for_credit'] ?? null,
            'title_deed_status' => $validated['title_deed_status'] ?? null,
            'from_person' => $validated['from_person'] ?? null,
            'exchange' => $validated['exchange'] ?? null,
            'is_featured' => $validated['is_featured'] ?? false,
        ]);

        // Galeri resimlerini kaydet
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                if ($image && $image->isValid()) {
                    $galleryPath = $image->store('estates/gallery', 'public');
                    $estate->gallery()->create([
                        'image_path' => $galleryPath,
                    ]);
                }
            }
        }

        return redirect()->route('estate.index')->with('success', 'İlan başarıyla kaydedildi.');
    }


    public function edit($id)
    {
        $estate = Estate::findOrFail($id);
        return view('admin.estate.edit', compact('estate'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
           'name' => 'required|string|max:255',
            'features' => 'nullable|string',
            'price' => 'required|numeric',
            'type' => 'required|string|max:50',
            'status' => 'required|string',
            'parcel_number' => 'nullable|string|max:100',
            'address' => 'nullable|string|max:500',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'main_image' => 'nullable|image',
            'gross_m2' => 'nullable|integer|min:0',
            'net_m2' => 'nullable|integer|min:0',
            'open_area_m2' => 'nullable|integer|min:0',
            'number_of_rooms' => 'nullable|string|max:50',
            'building_age' => 'nullable|integer|min:0',
            'number_of_floors' => 'nullable|integer|min:0',
            'heating' => 'nullable|string|max:100',
            'number_of_bathrooms' => 'nullable|integer|min:0',
            'kitchen' => 'nullable|string|max:100',
            'parking' => 'nullable|string|max:100',
            'furnished' => 'nullable|string|max:10',
            'usage_status' => 'nullable|string|max:100',
            'site_content' => 'nullable|string|max:255',
            'site_name' => 'nullable|string|max:255',
            'help_tl' => 'nullable|numeric|min:0',
            'available_for_credit' => 'nullable|string|max:10',
            'title_deed_status' => 'nullable|string|max:100',
            'from_person' => 'nullable|string|max:100',
            'exchange' => 'nullable|string|max:10',
            'is_featured' => 'nullable|boolean',
        ]);
 $estate = Estate::findOrFail($id);

/*
       
        if ($request->hasFile('main_image')) {
            // Eski görseli silmek istersen buraya ekle
            $mainImagePath = $request->file('main_image')->store('estates', 'public');
            $estate->main_image = $mainImagePath;
        }
*/
        $estate->update($validated);

        return redirect()->route('estate.index')->with('success', 'İlan başarıyla güncellendi.');
    }

    public function destroy($id)
    {
        $estate = Estate::findOrFail($id);
        $estate->delete();
        return redirect()->route('estate.index')->with('success', 'İlan başarıyla silindi.');
    }
}
