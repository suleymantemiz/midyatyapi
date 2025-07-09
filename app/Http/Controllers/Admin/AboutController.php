<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutContent;

class AboutController extends Controller
{
    public function edit()
    {
        $about = AboutContent::first();
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $about = AboutContent::first();
        if (!$about) {
            $about = new AboutContent();
        }
        $about->title = $request->input('title');
        $about->main_content = $request->input('main_content');
        $about->features = $request->input('features');
        $about->stats = $request->input('stats');
        $about->contact = $request->input('contact');
        $about->save();

        return redirect()->back()->with('success', 'Hakkımızda içeriği başarıyla güncellendi!');
    }
} 