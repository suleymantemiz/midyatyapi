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
            'type' => 'required',
            'status' => 'required',
            'name' => 'required',
            'price' => 'required|numeric',
            'main_image' => 'required|image',
            'gallery_images.*' => 'image',
            'parcel_number' => 'nullable|string',
            'features' => 'nullable|string',
        ]);

        // Ana resmi kaydet
        $mainImagePath = $request->file('main_image')->store('estates', 'public');

        // İlanı kaydet
        $estate = Estate::create([
            'type' => $validated['type'],
            'status' => $validated['status'],
            'name' => $validated['name'],
            'price' => $validated['price'],
            'main_image' => $mainImagePath,
            'parcel_number' => $validated['parcel_number'] ?? null,
            'features' => $validated['features'] ?? null,
        ]);

        // Galeri resimlerini kaydet
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $galleryImage) {
                $galleryImagePath = $galleryImage->store('estates/gallery', 'public');
                EstateImage::create([
                    'estate_id' => $estate->id,
                    'image' => $galleryImagePath,
                ]);
            }
        }

        return redirect()->route('estate.index')->with('success', 'İlan başarıyla eklendi.');
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
            'parcel_number' => 'nullable|string',
            'main_image' => 'nullable|image',
        ]);

        $estate = Estate::findOrFail($id);
        if ($request->hasFile('main_image')) {
            // Eski görseli silmek istersen buraya ekle
            $mainImagePath = $request->file('main_image')->store('estates', 'public');
            $estate->main_image = $mainImagePath;
        }

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
