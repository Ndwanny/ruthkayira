<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::orderBy('key')->get()->keyBy('key');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'home_hero_image' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('home_hero_image')) {
            $path = $request->file('home_hero_image')->store('heroes', 's3');
            SiteSetting::updateOrCreate(
                ['key' => 'home_hero_image'],
                ['value' => Storage::disk('s3')->url($path)]
            );
        }

        $inputs = $request->except(['_token', '_method', 'home_hero_image']);

        foreach ($inputs as $key => $value) {
            SiteSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        return redirect()->route('admin.settings.index')->with('success', 'Settings saved successfully.');
    }
}
