<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advantage;
use Illuminate\Http\Request;

class AdvantageController extends Controller
{
    public function index()
    {
        $advantages = Advantage::orderBy('sort_order', 'asc')->get();
        return view('admin.advantages.index', compact('advantages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon_class' => 'required|string|max:100',
            'sort_order' => 'nullable|integer',
        ]);

        Advantage::create([
            'title' => $request->title,
            'description' => $request->description,
            'icon_class' => $request->icon_class,
            'sort_order' => $request->sort_order ?? 0,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->back()->with('success', 'Keunggulan berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $advantage = Advantage::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon_class' => 'required|string|max:100',
            'sort_order' => 'nullable|integer',
        ]);

        $advantage->update([
            'title' => $request->title,
            'description' => $request->description,
            'icon_class' => $request->icon_class,
            'sort_order' => $request->sort_order ?? 0,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->back()->with('success', 'Keunggulan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $advantage = Advantage::findOrFail($id);
        $advantage->delete();

        return redirect()->back()->with('success', 'Keunggulan berhasil dihapus!');
    }
}

