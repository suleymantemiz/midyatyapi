<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactContent;
use Illuminate\Http\Request;

class ContactContentController extends Controller
{
    public function edit()
    {
        $contactContent = ContactContent::first();
        return view('admin.contact-content.edit', compact('contactContent'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'main_content' => 'required|string',
        ]);

        $contactContent = ContactContent::first();
        
        if (!$contactContent) {
            $contactContent = new ContactContent();
        }

        $contactContent->title = $request->title;
        $contactContent->main_content = $request->main_content;
        
        // İletişim bilgileri
        $contactInfo = [];
        for ($i = 0; $i < 3; $i++) {
            if ($request->filled("contact_title_$i") && $request->filled("contact_value_$i")) {
                $contactInfo[] = [
                    'title' => $request->input("contact_title_$i"),
                    'value' => $request->input("contact_value_$i"),
                    'icon' => $request->input("contact_icon_$i", 'ion-ios-information')
                ];
            }
        }
        $contactContent->contact_info = $contactInfo;

        // Çalışma saatleri
        $workingHours = [];
        for ($i = 0; $i < 7; $i++) {
            if ($request->filled("day_title_$i") && $request->filled("day_hours_$i")) {
                $workingHours[] = [
                    'day' => $request->input("day_title_$i"),
                    'hours' => $request->input("day_hours_$i")
                ];
            }
        }
        $contactContent->working_hours = $workingHours;

        // Sosyal medya linkleri
        $socialLinks = [];
        for ($i = 0; $i < 4; $i++) {
            if ($request->filled("social_platform_$i") && $request->filled("social_url_$i")) {
                $socialLinks[] = [
                    'platform' => $request->input("social_platform_$i"),
                    'url' => $request->input("social_url_$i"),
                    'icon' => $request->input("social_icon_$i", 'ion-social-facebook')
                ];
            }
        }
        $contactContent->social_links = $socialLinks;

        // Harita embed kodu
        $contactContent->map_embed = $request->map_embed;

        $contactContent->save();

        return redirect()->route('admin.contact-content.edit')
            ->with('success', 'İletişim içeriği başarıyla güncellendi.');
    }
} 