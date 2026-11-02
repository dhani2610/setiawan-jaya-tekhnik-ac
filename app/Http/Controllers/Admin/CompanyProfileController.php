<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;

class CompanyProfileController extends Controller
{
    public function index()
    {
        $profile = CompanyProfile::first() ?? new CompanyProfile();
        return view('admin.company_profile.index', compact('profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'about_content' => 'required|string',
            'vision_mission_content' => 'required|string',
            'about_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
        ]);

        $profile = CompanyProfile::firstOrCreate(['id' => 1]);

        $data = [
            'about_content' => $request->about_content,
            'vision_mission_content' => $request->vision_mission_content,
        ];

        if ($request->hasFile('about_image')) {
            $data['about_image'] = '/storage/' . $request->file('about_image')->store('company', 'public');
        }

        $profile->update($data);

        return redirect()->back()->with('success', 'Profil Tentang Kami & Visi Misi berhasil diperbarui!');
    }
}

