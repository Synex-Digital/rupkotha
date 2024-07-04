<?php

namespace App\Http\Controllers;

use App\Models\Config;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function about()
    {
        $config = Config::where('status', 'active')->first();
        return view('Themes.theme1.pages.about', [
            'config' => $config
        ]);
    }

    public function contact()
    {
        $config = Config::where('status', 'active')->first();
        return view('Themes.theme1.pages.contact', [
            'config' => $config
        ]);
    }

    public function privacy()
    {
        $config = Config::where('status', 'active')->first();
        return view('Themes.theme1.pages.privacy', [
            'config' => $config
        ]);
    }
}
