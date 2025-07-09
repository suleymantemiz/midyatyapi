<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceContent;
use Illuminate\Http\Request;

class ServiceContentController extends Controller
{


    public function edit()
    {
        $serviceContent = ServiceContent::first();
        return view('admin.service-content.edit', compact('serviceContent'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'main_content' => 'required|string',
        ]);

        $serviceContent = ServiceContent::first();
        
        if (!$serviceContent) {
            $serviceContent = new ServiceContent();
        }

        $serviceContent->title = $request->title;
        $serviceContent->main_content = $request->main_content;
        
        // Hizmetler
        $services = [];
        for ($i = 0; $i < 6; $i++) {
            if ($request->filled("service_title_$i") && $request->filled("service_description_$i")) {
                $services[] = [
                    'title' => $request->input("service_title_$i"),
                    'description' => $request->input("service_description_$i"),
                    'icon' => $request->input("service_icon_$i", 'ion-ios-home'),
                    'features' => array_filter(explode("\n", $request->input("service_features_$i", "")))
                ];
            }
        }
        $serviceContent->services = $services;

        // Süreç adımları
        $processSteps = [];
        for ($i = 0; $i < 4; $i++) {
            if ($request->filled("process_title_$i") && $request->filled("process_description_$i")) {
                $processSteps[] = [
                    'number' => $i + 1,
                    'title' => $request->input("process_title_$i"),
                    'description' => $request->input("process_description_$i")
                ];
            }
        }
        $serviceContent->process_steps = $processSteps;

        // Fiyatlandırma planları
        $pricingPlans = [];
        for ($i = 0; $i < 3; $i++) {
            if ($request->filled("pricing_title_$i") && $request->filled("pricing_price_$i")) {
                $pricingPlans[] = [
                    'title' => $request->input("pricing_title_$i"),
                    'price' => $request->input("pricing_price_$i"),
                    'features' => array_filter(explode("\n", $request->input("pricing_features_$i", ""))),
                    'featured' => $request->has("pricing_featured_$i")
                ];
            }
        }
        $serviceContent->pricing_plans = $pricingPlans;

        $serviceContent->save();

        return redirect()->route('admin.service-content.edit')
            ->with('success', 'Hizmetler içeriği başarıyla güncellendi.');
    }
} 