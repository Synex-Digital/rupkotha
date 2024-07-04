<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;

class BlogSingleController extends Controller
{
    public function index($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        $category = Category::where('status', 'active')->get();

        //getting related blog
        $related = Blog::where('category_id', $blog->category_id)->where('id', '!=', $blog->id)->orderBy('created_at', 'desc')->take(4)->get();

        //getting most view alltime blog
        $best = Blog::orderBy('view_count', 'desc')->take(4)->get();

        //Recent
        $recent = Blog::orderBy('id', 'desc')->take(4)->get();


        if ($blog) {
            //incerement view count
            $blog->increment('view_count');
            $blog->save();

            return view('Themes.theme1.pages.blog-single', [
                'blog'      => $blog,
                'related'   => $related,
                'recent'    => $recent,
                'bests'     => $best,
                'cats'      => $category,
            ]);
        } else {
            return back();
        }
    }
}