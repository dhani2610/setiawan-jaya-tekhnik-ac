<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::firstOrCreate(['id' => 1]);
        return view('admin.settings.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_name' => 'required|string|max:255',
            'whatsapp_number' => 'required|string|max:50',
            'phone_number' => 'required|string|max:50',
            'address' => 'required|string',
            'google_maps_iframe' => 'nullable|string',
            'instagram_url' => 'nullable|url|max:255',
            'facebook_url' => 'nullable|url|max:255',
            'youtube_url' => 'nullable|url|max:255',
            'tiktok_url' => 'nullable|url|max:255',
            'site_logo' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
            'site_favicon' => 'nullable|image|mimes:jpeg,png,jpg,webp,ico|max:1024',
        ]);

        $setting = Setting::firstOrCreate(['id' => 1]);

        $data = [
            'site_name' => $request->site_name,
            'whatsapp_number' => $request->whatsapp_number,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'google_maps_iframe' => $request->google_maps_iframe,
            'instagram_url' => $request->instagram_url,
            'facebook_url' => $request->facebook_url,
            'youtube_url' => $request->youtube_url,
            'tiktok_url' => $request->tiktok_url,
        ];

        if ($request->hasFile('site_logo')) {
            $data['site_logo'] = '/storage/' . $request->file('site_logo')->store('settings', 'public');
        }

        if ($request->hasFile('site_favicon')) {
            $data['site_favicon'] = '/storage/' . $request->file('site_favicon')->store('settings', 'public');
        }

        $setting->update($data);

        return redirect()->back()->with('success', 'Pengaturan website berhasil diperbarui!');
    }
}

