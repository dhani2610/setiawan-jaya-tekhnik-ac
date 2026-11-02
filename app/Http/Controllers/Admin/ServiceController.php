<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('sort_order', 'asc')->get();
        return view('admin.services.index', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price_range' => 'required|string|max:100',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
            'sort_order' => 'nullable|integer',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = '/storage/' . $request->file('image')->store('services', 'public');
        }

        Service::create([
            'name' => $request->name,
            'price_range' => $request->price_range,
            'description' => $request->description,
            'image_path' => $imagePath,
            'has_warranty' => $request->has('has_warranty'),
            'sort_order' => $request->sort_order ?? 0,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->back()->with('success', 'Layanan berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'price_range' => 'required|string|max:100',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
            'sort_order' => 'nullable|integer',
        ]);

        $data = [
            'name' => $request->name,
            'price_range' => $request->price_range,
            'description' => $request->description,
            'has_warranty' => $request->has('has_warranty'),
            'sort_order' => $request->sort_order ?? 0,
            'is_active' => $request->has('is_active'),
        ];

        if ($request->hasFile('image')) {
            $data['image_path'] = '/storage/' . $request->file('image')->store('services', 'public');
        }

        $service->update($data);

        return redirect()->back()->with('success', 'Layanan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->back()->with('success', 'Layanan berhasil dihapus!');
    }
}

