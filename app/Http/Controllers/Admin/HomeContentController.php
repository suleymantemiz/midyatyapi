<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeContent;
use Illuminate\Http\Request;

class HomeContentController extends Controller
{
    public function edit()
    {
        $homeContent = HomeContent::first();
        
        if (!$homeContent) {
            $homeContent = new HomeContent();
        }
        
        return view('admin.home-content.edit', compact('homeContent'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'hero_title' => 'required|string|max:200',
            'hero_subtitle' => 'required|string|max:500',
            'hero_button_text' => 'required|string|max:100',
            'hero_button_url' => 'required|string|max:200',
            'about_title' => 'required|string|max:200',
            'about_content' => 'required|string|max:1000',
            'about_features' => 'nullable|string',
            'statistics' => 'nullable|string',
            'home_services_title' => 'required|string|max:200',
            'home_services_subtitle' => 'required|string|max:500',
            'home_services' => 'nullable|string',
            'featured_title' => 'required|string|max:200',
            'featured_subtitle' => 'required|string|max:500',
            'testimonials_title' => 'required|string|max:200',
            'testimonials_subtitle' => 'required|string|max:500',
            'testimonials' => 'nullable|string',
            'cta_title' => 'required|string|max:200',
            'cta_content' => 'required|string|max:500',
            'cta_button_text' => 'required|string|max:100',
            'cta_button_url' => 'required|string|max:200',
        ]);

        $homeContent = HomeContent::first();
        
        if (!$homeContent) {
            $homeContent = new HomeContent();
        }

        // JSON alanları işle
        $aboutFeatures = [];
        if ($request->about_features) {
            $aboutFeatures = array_filter(explode("\n", $request->about_features));
        }

        $statistics = [];
        if ($request->statistics) {
            $statistics = array_filter(explode("\n", $request->statistics));
        }

        $homeServices = [];
        if ($request->home_services) {
            $homeServicesData = array_filter(explode("\n", $request->home_services));
            foreach ($homeServicesData as $service) {
                $parts = explode('|', trim($service));
                if (count($parts) >= 2) {
                    $homeServices[] = [
                        'title' => trim($parts[0]),
                        'description' => trim($parts[1])
                    ];
                } else {
                    $homeServices[] = [
                        'title' => trim($service),
                        'description' => 'Midyat\'ta emlak sektöründe uzun yıllar deneyimimizle, size en uygun gayrimenkulü bulmanızda yardımcı oluyoruz.'
                    ];
                }
            }
        }

        $testimonials = [];
        if ($request->testimonials) {
            $testimonials = array_filter(explode("\n", $request->testimonials));
        }

        $homeContent->fill([
            'hero_title' => $request->hero_title,
            'hero_subtitle' => $request->hero_subtitle,
            'hero_button_text' => $request->hero_button_text,
            'hero_button_url' => $request->hero_button_url,
            'about_title' => $request->about_title,
            'about_content' => $request->about_content,
            'about_features' => $aboutFeatures,
            'statistics' => $statistics,
            'home_services_title' => $request->home_services_title,
            'home_services_subtitle' => $request->home_services_subtitle,
            'home_services' => $homeServices,
            'featured_title' => $request->featured_title,
            'featured_subtitle' => $request->featured_subtitle,
            'testimonials_title' => $request->testimonials_title,
            'testimonials_subtitle' => $request->testimonials_subtitle,
            'testimonials' => $testimonials,
            'cta_title' => $request->cta_title,
            'cta_content' => $request->cta_content,
            'cta_button_text' => $request->cta_button_text,
            'cta_button_url' => $request->cta_button_url,
        ]);

        $homeContent->save();

        return redirect()->back()->with('success', 'Ana sayfa içerikleri başarıyla güncellendi.');
    }
} 