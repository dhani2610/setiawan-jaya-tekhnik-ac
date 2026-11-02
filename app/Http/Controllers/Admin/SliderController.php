<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('sort_order', 'asc')->get();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:3072',
            'cta_text' => 'nullable|string|max:100',
            'cta_link' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = '/storage/' . $request->file('image')->store('sliders', 'public');
        }

        Slider::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'image_path' => $imagePath,
            'cta_text' => $request->cta_text ?? 'Hubungi Kami',
            'cta_link' => $request->cta_link ?? '#kontak',
            'sort_order' => $request->sort_order ?? 0,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->back()->with('success', 'Banner Slider berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
            'cta_text' => 'nullable|string|max:100',
            'cta_link' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        $data = [
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'cta_text' => $request->cta_text ?? 'Hubungi Kami',
            'cta_link' => $request->cta_link ?? '#kontak',
            'sort_order' => $request->sort_order ?? 0,
            'is_active' => $request->has('is_active'),
        ];

        if ($request->hasFile('image')) {
            $data['image_path'] = '/storage/' . $request->file('image')->store('sliders', 'public');
        }

        $slider->update($data);

        return redirect()->back()->with('success', 'Banner Slider berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();

        return redirect()->back()->with('success', 'Banner Slider berhasil dihapus!');
    }
}

