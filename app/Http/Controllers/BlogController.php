<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogParts;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blog = Blog::select('id', 'slug')->get();
        $category = Category::all();
        return view('dashboard.blog.index', [
            'blogs'         => $blog,
            'categories'    => $category,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blog = Blog::all();
        $category = Category::all();
        return view('dashboard.blog.create', [
            'blog'          => $blog,
            'categories'    => $category,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'category_id'       => 'required',
            'title'             => 'required',
            'author'            => 'required',
            'content'           => 'required',
            'slug'             => 'required|unique:blogs',
        ]);

        // try {
        $blog = new Blog();

        $blog->category_id      = $request->category_id;
        $blog->author           = $request->author;
        $blog->title            = $request->title;
        $blog->content          = $request->content;
        $blog->image            = $request->has('image') ? Self::upload($request) : '';
        $blog->seo_title        = $request->seo_title;
        $blog->seo_description  = $request->seo_description;
        $blog->seo_tags         = $request->seo_tags;
        $blog->slug             = $request->slug != null ? $request->slug : Str::slug($request->title, '-');
        $blog->save();


        if ($request->blog_id != null) {
            $part = new BlogParts();
            $part->blog_id = $request->blog_id;
            $part->part_id = $blog->id;
            $part->save();
        }

        return back()->with('success', 'Blog created successfully');
        // } catch (\Throwable $th) {
        //     return back()->with('success', "Something is wrong with, $th");
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blog = Blog::find($id);
        $category = Category::all();
        return view('dashboard.blog.show', [
            'blog'          => $blog,
            'categories'    => $category,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = Blog::find($id);
        $category = Category::all();
        return view('dashboard.blog.edit', [
            'blog'          => $blog,
            'categories'    => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title'             => 'required',
            'author'            => 'required',
            'content'           => 'required',
            'seo_title'         => 'required',
            'seo_description'   => 'required',
            'seo_tags'          => 'required',
            'slug'              => 'required|min:3|max:255|unique:blogs',
        ]);

        $blog->category_id      = $request->category_id;
        $blog->author           = $request->author;
        $blog->title            = $request->title;
        $blog->content          = $request->content;
        $blog->seo_title        = $request->seo_title;
        $blog->seo_description  = $request->seo_description;
        $blog->seo_tags         = $request->seo_tags;
        $blog->status           = $request->status;
        $blog->slug             = Str::slug($request->title, '-');

        $oldImage = $blog->image;
        if (file_exists($oldImage)) {
            unlink($oldImage);
            File::delete($oldImage);
        }

        if ($request->has('image')) {
            $blog->image = Self::upload($request);
        }
        $blog->save();
        return back()->with('success', 'Blog updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        return back()->with('danger', 'Blog deleted!!');
    }

    static function upload($request)
    {
        $imageName = 'dashboards/Theme1/images/blog/' . time() . '.' . $request->image->extension();
        $request->image->move(public_path('dashboards/Theme1/images/blog'), $imageName);
        return $imageName;
    }
}