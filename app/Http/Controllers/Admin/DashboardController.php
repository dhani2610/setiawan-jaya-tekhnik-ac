<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Promo;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Setting;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalServices = Service::count();
        $totalPromos = Promo::where('is_active', true)->count();
        $totalArticles = Article::count();
        $totalComments = Comment::count();
        $recentComments = Comment::with('article')->latest()->take(5)->get();
        $setting = Setting::first();

        return view('admin.dashboard', compact(
            'totalServices',
            'totalPromos',
            'totalArticles',
            'totalComments',
            'recentComments',
            'setting'
        ));
    }

    public function quickUpdateWhatsapp(Request $request)
    {
        $request->validate([
            'whatsapp_number' => 'required|string|max:50',
        ]);

        $setting = Setting::first();
        if ($setting) {
            $setting->update([
                'whatsapp_number' => $request->whatsapp_number,
            ]);
        }

        return redirect()->back()->with('success', 'Nomor WhatsApp berhasil diperbarui!');
    }
}

