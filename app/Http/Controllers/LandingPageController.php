<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Slider;
use App\Models\Service;
use App\Models\Promo;
use App\Models\Advantage;
use App\Models\CompanyProfile;
use App\Models\Statistic;
use App\Models\Testimonial;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $setting = Setting::first() ?? new Setting();
        $sliders = Slider::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        $services = Service::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        $promos = Promo::where('is_active', true)->latest()->get();
        $advantages = Advantage::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        $companyProfile = CompanyProfile::first();
        $statistics = Statistic::orderBy('sort_order', 'asc')->get();
        $testimonials = Testimonial::where('is_active', true)->latest()->get();
        $articles = Article::where('is_published', true)->latest()->take(3)->get();

        return view('landing.index', compact(
            'setting',
            'sliders',
            'services',
            'promos',
            'advantages',
            'companyProfile',
            'statistics',
            'testimonials',
            'articles'
        ));
    }

    public function articles(Request $request)
    {
        $setting = Setting::first() ?? new Setting();
        $query = Article::where('is_published', true)->withCount('comments');

        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $articles = $query->latest()->paginate(6)->withQueryString();
        $popularArticles = Article::where('is_published', true)->orderBy('views_count', 'desc')->take(4)->get();

        return view('landing.articles', compact('setting', 'articles', 'popularArticles'));
    }

    public function articleShow($slug)
    {
        $setting = Setting::first() ?? new Setting();
        $article = Article::with(['comments' => function ($q) {
            $q->where('is_approved', true)->latest();
        }])->where('slug', $slug)->firstOrFail();

        $article->increment('views_count');
        $relatedArticles = Article::where('is_published', true)->where('id', '!=', $article->id)->latest()->take(3)->get();

        return view('landing.article_detail', compact('setting', 'article', 'relatedArticles'));
    }

    public function getArticleDetail($slug)
    {
        $article = Article::with(['comments' => function ($q) {
            $q->where('is_approved', true)->latest();
        }])->where('slug', $slug)->firstOrFail();

        $article->increment('views_count');

        return response()->json([
            'status' => 'success',
            'data' => $article,
            'comments' => $article->comments,
            'formatted_date' => $article->created_at->translatedFormat('d F Y'),
        ]);
    }

    public function likeArticle(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->increment('likes_count');

        return response()->json([
            'status' => 'success',
            'likes_count' => $article->likes_count,
        ]);
    }

    public function postComment(Request $request, $id)
    {
        $request->validate([
            'author_name' => 'required|string|max:100',
            'author_email' => 'nullable|email|max:150',
            'comment_text' => 'required|string|max:1000',
        ]);

        $article = Article::findOrFail($id);

        $comment = Comment::create([
            'article_id' => $article->id,
            'author_name' => $request->author_name,
            'author_email' => $request->author_email,
            'comment_text' => $request->comment_text,
            'is_approved' => true,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Komentar Anda berhasil dikirim dan ditayangkan!',
            'data' => [
                'author_name' => $comment->author_name,
                'comment_text' => $comment->comment_text,
                'created_at' => $comment->created_at->diffForHumans(),
            ]
        ]);
    }
}
