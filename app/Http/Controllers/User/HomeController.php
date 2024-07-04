<?php

namespace App\Http\Controllers\User;

use App\Models\Blog;
use App\Models\Themes;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $category = Category::where('status', 'active')->get();

        //getting most view alltime blog
        $best = Blog::orderBy('view_count', 'desc')->take(4)->get();

        //Recent
        $recent = Blog::orderBy('id', 'desc')->take(4)->get();

        return view('Themes.theme1.index', [
            'recent'    => $recent,
            'bests'     => $best,
            'cats'      => $category,
        ]);
        // }
    }

    public function category($slugs)
    {
        $categoryView = Category::where('slug', $slugs)->first();

        $category = Category::where('status', 'active')->get();

        //getting most view alltime blog
        $best = Blog::orderBy('view_count', 'desc')->take(4)->get();

        //Recent
        $recent = Blog::orderBy('id', 'desc')->take(4)->get();

        //category product
        $categoryBlog = Blog::where('category_id', $categoryView->id)->paginate(12);

        if ($categoryView) {
            return view('Themes.theme1.pages.category', [
                'catBlog'   => $categoryBlog,
                'cat'       => $categoryView,
                'recent'    => $recent,
                'bests'     => $best,
                'cats'      => $category,
            ]);
        }
    }

    public function blog()
    {
        $category = Category::where('status', 'active')->get();

        //getting most view alltime blog
        $best = Blog::orderBy('view_count', 'desc')->take(4)->get();

        //Recent
        $recent = Blog::orderBy('id', 'desc')->take(4)->get();

        //category product
        $blog = Blog::where('status', 'active')->paginate(12);

        return view('Themes.theme1.pages.blog', [
            'blogs'     => $blog,
            'recent'    => $recent,
            'bests'     => $best,
            'cats'      => $category,
        ]);
    }
}
