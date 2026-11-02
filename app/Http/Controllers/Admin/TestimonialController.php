<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_name' => 'required|string|max:255',
            'client_role_location' => 'nullable|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'review_text' => 'required|string',
            'client_photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $photoPath = null;
        if ($request->hasFile('client_photo')) {
            $photoPath = '/storage/' . $request->file('client_photo')->store('testimonials', 'public');
        }

        Testimonial::create([
            'client_name' => $request->client_name,
            'client_role_location' => $request->client_role_location,
            'rating' => $request->rating,
            'review_text' => $request->review_text,
            'client_photo' => $photoPath,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->back()->with('success', 'Testimoni berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $request->validate([
            'client_name' => 'required|string|max:255',
            'client_role_location' => 'nullable|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'review_text' => 'required|string',
            'client_photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = [
            'client_name' => $request->client_name,
            'client_role_location' => $request->client_role_location,
            'rating' => $request->rating,
            'review_text' => $request->review_text,
            'is_active' => $request->has('is_active'),
        ];

        if ($request->hasFile('client_photo')) {
            $data['client_photo'] = '/storage/' . $request->file('client_photo')->store('testimonials', 'public');
        }

        $testimonial->update($data);

        return redirect()->back()->with('success', 'Testimoni berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();

        return redirect()->back()->with('success', 'Testimoni berhasil dihapus!');
    }
}

