<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::with('article')->latest()->get();
        return view('admin.comments.index', compact('comments'));
    }

    public function toggleStatus($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->is_approved = !$comment->is_approved;
        $comment->save();

        return redirect()->back()->with('success', 'Status komentar berhasil diubah!');
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->back()->with('success', 'Komentar berhasil dihapus!');
    }
}

