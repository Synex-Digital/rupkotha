<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Carbon\Carbon;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Support\Facades\File;

class SitemapController extends Controller
{
    public function sitemap()
    {
        $blogs      = Blog::where('status', 'active')->get();
        $categories = Category::where('status', 'active')->get();

        $sitemap = Sitemap::create();
        $sitemap->add(Url::create('/')
            ->setLastModificationDate(Carbon::now())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
            ->setPriority(0.1))
            ->add(Url::create('/about')
                ->setLastModificationDate(Carbon::now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                ->setPriority(0.1))
            ->add(Url::create('/privacy')
                ->setLastModificationDate(Carbon::now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                ->setPriority(0.1))
            ->add(Url::create('/contact')
                ->setLastModificationDate(Carbon::now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                ->setPriority(0.1));

        //Dynamic Blog
        foreach ($blogs as $blog) {
            $sitemap->add(Url::create('/view' . '/' . $blog->slug)
                ->setLastModificationDate(Carbon::now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.1));
        }
        //Dynamic Category
        foreach ($categories as $category) {
            $sitemap->add(Url::create('/categories' . '/' . $category->slug)
                ->setLastModificationDate(Carbon::now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.1));
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));

        File::copy(public_path('sitemap.xml'), base_path('sitemap.xml'));

        return response()->download(public_path('sitemap.xml'), 'sitemap.xml');
    }
}
