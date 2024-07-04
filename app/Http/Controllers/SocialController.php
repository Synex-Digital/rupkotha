<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Social;
use Illuminate\Support\Facades\File;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $social = Social::all();
        return view('dashboard.social.index', [
            'social' => $social,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'link' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,webp,jfif|max:2048',
        ]);

        $social = new Social();
        $social->logo          = Self::upload($request);
        $social->link          = $request->link;
        $social->status        = $request->status;
        $social->save();
        return back()->with('success', 'Social Link created successfully');
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
        $social = Social::find($id);
        return view('dashboard.social.edit', [
            'social' => $social,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Social $social)
    {
        $request->validate([
            'link'          => 'required',
        ]);

        $social->link         = $request->link;
        $social->status       = $request->status;

        $oldImage = $social->logo;
        if (file_exists($oldImage)) {
            unlink($oldImage);
            File::delete($oldImage);
        }

        if ($request->has('logo')) {
            $social->logo = Self::upload($request);
        }
        $social->save();
        return back()->with('success', 'Social Link updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $social = Social::find($id);
        $social->delete();
        return back()->with('danger', 'Link deleted successfully!!');
    }

    static function upload($request){
        $imageName ='dashboards/Theme1/images/social/'. time() . '.' . $request->logo->extension();
        $request->logo->move(public_path('dashboards/Theme1/images/social'), $imageName);
        return $imageName;
    }
}
