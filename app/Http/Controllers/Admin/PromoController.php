<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    public function index()
    {
        $promos = Promo::latest()->get();
        return view('admin.promos.index', compact('promos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = '/storage/' . $request->file('image')->store('promos', 'public');
        }

        Promo::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $imagePath,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->back()->with('success', 'Promo berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $promo = Promo::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'is_active' => $request->has('is_active'),
        ];

        if ($request->hasFile('image')) {
            $data['image_path'] = '/storage/' . $request->file('image')->store('promos', 'public');
        }

        $promo->update($data);

        return redirect()->back()->with('success', 'Promo berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $promo = Promo::findOrFail($id);
        $promo->delete();

        return redirect()->back()->with('success', 'Promo berhasil dihapus!');
    }
}

