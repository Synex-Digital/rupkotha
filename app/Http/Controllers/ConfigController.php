<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Config;
use Illuminate\Support\Facades\File;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $config = Config::all();
        return view('dashboard.config.index', [
            'config' => $config,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $config = Config::all();
        return view('dashboard.config.create', [
            'config' => $config,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'favicon'          => 'required|image|mimes:jpeg,png,jpg,webp,jfif|max:2048',
            'logo'             => 'required|image|mimes:jpeg,png,jpg,webp,jfif|max:2048',
            'name'             => 'required',
            'address'          => 'required',
            'url'            => 'required',
            'email'            => 'required',
            'phone'            => 'required',
        ]);
        $configOld = Config::query();
        if ($configOld->count() != 0) {
            $configOld->delete();
        }

        $config = new Config();
        $config->favicon        = self::uploadFavicon($request);
        $config->logo           = self::uploadLogo($request);
        $config->name           = $request->name;
        $config->address        = $request->address;
        $config->email          = $request->email;
        $config->phone          = $request->phone;
        $config->url            = $request->url;
        $config->status         = $configOld->count() == 0 ? 'active' : 'inactive';
        $config->save();
        return back()->with('success', 'Config created successfully');
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
        $config = Config::find($id);
        return view('dashboard.config.edit', [
            'config' => $config,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, config $config)
    {
        $request->validate([
            'name'              => 'required',
            'email'             => 'required',
            'address'           => 'required',
            'phone'             => 'required',
            'status'            => 'required',
        ]);

        $config->name           = $request->name;
        $config->email          = $request->email;
        $config->address        = $request->address;
        $config->phone          = $request->phone;
        $config->status         = $request->status;

        $oldFav = $config->favicon;
        $oldLogo = $config->logo;
        if (file_exists($oldFav)) {
            unlink($oldFav);
            File::delete($oldFav);
        }

        if (file_exists($oldLogo)) {
            unlink($oldLogo);
            File::delete($oldLogo);
        }

        if ($request->has('favicon')) {
            $config->favicon = Self::uploadFavicon($request);
        }

        if ($request->has('logo')) {
            $config->logo = Self::uploadLogo($request);
        }
        $config->save();
        return back()->with('success', 'Config updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $config = Config::find($id);
        $config->delete();
        return back()->with('danger', 'Blog deleted!!');
    }

    static function uploadLogo($request)
    {
        $imageName = 'dashboards/Theme1/images/config_pics/logo/' . time() . '.' . $request->logo->extension();
        $request->logo->move(public_path('dashboards/Theme1/images/config_pics/logo'), $imageName);
        return $imageName;
    }

    static function uploadFavicon($request)
    {
        $imageName = 'dashboards/Theme1/images/config_pics/favicon/' . time() . '.' . $request->favicon->extension();
        $request->favicon->move(public_path('dashboards/Theme1/images/config_pics/favicon'), $imageName);
        return $imageName;
    }
}