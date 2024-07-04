<?php

namespace App\Http\Controllers;

use App\Models\Seo;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.seo.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $seo = Seo::all();
        return view('dashboard.seo.create', [
            'seo' => $seo
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'seo_title'         => 'required',
            'seo_description'   => 'required',
            'seo_tags'          => 'required',
            'page'              => 'required',
        ]);

        $seo = new Seo();
        $seo->seo_title         = $request->seo_title;
        $seo->seo_description   = $request->seo_description;
        $seo->seo_tags          = $request->seo_tags;
        $seo->page              = $request->page;
        $seo->save();
        return back()->with('success', 'SEO created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $seo = Seo::find($id);
        return view('dashboard.seo.edit', [
            'seo' => $seo
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Seo $seo)
    {
        $request->validate([
            'seo_title'         => 'required',
            'seo_description'   => 'required',
            'seo_tags'          => 'required',
            'page'              => 'required',
        ]);

        $seo->seo_title         = $request->seo_title;
        $seo->seo_description   = $request->seo_description;
        $seo->seo_tags          = $request->seo_tags;
        $seo->page              = $request->page;
        $seo->save();
        return back()->with('success', 'SEO updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $seo = Seo::find($id);
        $seo->delete();
        return back()->with('danger', 'SEO deleted successfully');
    }
}
