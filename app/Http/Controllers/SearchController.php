<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $searchTerm = $request->search;
        $results = Blog::select('id', 'title', 'created_at', 'slug')->where(function ($query) use ($searchTerm) {
            $query->where('title', 'like', '%' . $searchTerm . '%')
                ->orWhere('seo_tags', 'like', '%' . $searchTerm . '%');
        })->take(12)
            ->get();
        return response()->json([
            's' => $results,
        ]);
    }
}
