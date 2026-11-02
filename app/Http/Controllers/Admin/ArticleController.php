<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::withCount('comments')->latest()->get();
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
        ]);

        $coverPath = null;
        if ($request->hasFile('cover_image')) {
            $coverPath = '/storage/' . $request->file('cover_image')->store('articles', 'public');
        }

        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $counter = 1;
        while (Article::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }

        Article::create([
            'title' => $request->title,
            'slug' => $slug,
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'cover_image' => $coverPath,
            'is_published' => $request->has('is_published'),
        ]);

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil dipublikasikan!');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
        ]);

        $data = [
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'is_published' => $request->has('is_published'),
        ];

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = '/storage/' . $request->file('cover_image')->store('articles', 'public');
        }

        $article->update($data);

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil dihapus!');
    }
}

