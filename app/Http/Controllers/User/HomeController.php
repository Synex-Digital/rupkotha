<?php

namespace App\Http\Controllers\User;

use App\Models\Seo;
use App\Models\Blog;
use App\Models\Config;
use App\Models\Themes;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class HomeController extends Controller
{
    public function index()
    {
        //seo
        $img = null;
        $url = null;
        $name = null;
        $config = Config::where('status', 'active')->first();

        if ($config) {
            $img = url('/') . '/' . $config->logo;
            $url = $config->url;
            $name = $config->name;
            //Canonical
            SEOMeta::setCanonical($config->url . request()->getPathInfo());
        }

        $seo = Seo::where('page', 'home')->first();
        if ($seo) {
            // Set SEO meta tags
            SEOTools::setTitle($seo->seo_title);
            SEOTools::setDescription($seo->seo_description);
            SEOTools::metatags()->setKeywords($seo->seo_tags); // Set keywords
            SEOTools::opengraph()->setUrl(url()->current());

            //Open graph
            OpenGraph::addImage($img); // add image url
            OpenGraph::setTitle($seo->seo_title); // define title
            OpenGraph::setDescription($seo->seo_description);  // define description
            OpenGraph::setType('website');
            OpenGraph::setUrl(url()->current()); // define url
            OpenGraph::setSiteName($config ? $config->name : ''); //define site_name

            //twitter
            TwitterCard::setUrl(url()->current()); // url of twitter card tag
            TwitterCard::setImage($img);

            //JsonLd

            JsonLd::setType('WebPage');
            JsonLd::setTitle($seo->seo_title);
            JsonLd::setDescription($seo->seo_description);
            JsonLd::setUrl(url()->current());
            JsonLd::addValue('datePublished', $seo->created_at);
            JsonLd::addValue('dateModified', $seo->updated_at);
            JsonLd::addValue('inLanguage', 'bn-BD');
            JsonLd::addValue('isPartOf', [
                "@type" => "WebSite",
                "@id" => $url,
                "url" => $url
            ]);
            JsonLd::addValue('publisher', [
                '@id' => "$url/#organization",
                '@type' => 'Organization',
                'name' => $name,
                'url' => $url,
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => $img,
                    'caption' => $seo->seo_description,
                    'inLanguage' => 'bn-BD',
                    'contentUrl' => url()->current(),
                ],
            ]);
        }

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

            $img = url('/') . '/' . $categoryView->image;
            $url = null;
            $name = null;
            $config = Config::where('status', 'active')->first();

            if ($config) {
                $url = $config->url;
                $name = $config->name;
                //Canonical
                SEOMeta::setCanonical($config->url . request()->getPathInfo());
            }
            // Set SEO meta tags
            SEOTools::setTitle($categoryView->seo_title);
            SEOTools::setDescription($categoryView->seo_description);
            SEOTools::metatags()->setKeywords($categoryView->seo_tags); // Set keywords
            SEOTools::opengraph()->setUrl(url()->current());

            //Open graph
            OpenGraph::addImage($img); // add image url
            OpenGraph::setTitle($categoryView->seo_title); // define title
            OpenGraph::setDescription($categoryView->seo_description);  // define description
            OpenGraph::setType('website');
            OpenGraph::setUrl(url()->current()); // define url
            OpenGraph::setSiteName($config->name); //define site_name

            //twitter
            TwitterCard::setUrl(url()->current()); // url of twitter card tag
            TwitterCard::setImage($img);

            //JsonLd

            JsonLd::setType('WebPage');
            JsonLd::setTitle($categoryView->seo_title);
            JsonLd::setDescription($categoryView->seo_description);
            JsonLd::setUrl(url()->current());
            JsonLd::addValue('datePublished', $categoryView->created_at);
            JsonLd::addValue('dateModified', $categoryView->updated_at);
            JsonLd::addValue('inLanguage', 'bn-BD');
            JsonLd::addValue('isPartOf', [
                "@type" => "WebSite",
                "@id" => $url,
                "url" => $url
            ]);
            JsonLd::addValue('publisher', [
                '@id' => "$url/#organization",
                '@type' => 'Organization',
                'name' => $name,
                'url' => $url,
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => $img,
                    'caption' => $categoryView->seo_description,
                    'inLanguage' => 'bn-BD',
                    'contentUrl' => url()->current(),
                ],
            ]);

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

        //seo
        $img = null;
        $url = null;
        $name = null;
        $config = Config::where('status', 'active')->first();

        if ($config) {
            $img = url('/') . '/' . $config->logo;
            $url = $config->url;
            $name = $config->name;
            //Canonical
            SEOMeta::setCanonical($config->url . request()->getPathInfo());
        }

        $seo = Seo::where('page', 'blogs')->first();
        if ($seo) {
            // Set SEO meta tags
            SEOTools::setTitle($seo->seo_title);
            SEOTools::setDescription($seo->seo_description);
            SEOTools::metatags()->setKeywords($seo->seo_tags); // Set keywords
            SEOTools::opengraph()->setUrl(url()->current());

            //Open graph
            OpenGraph::addImage($img); // add image url
            OpenGraph::setTitle($seo->seo_title); // define title
            OpenGraph::setDescription($seo->seo_description);  // define description
            OpenGraph::setType('website');
            OpenGraph::setUrl(url()->current()); // define url
            OpenGraph::setSiteName($config ? $config->name : ''); //define site_name

            //twitter
            TwitterCard::setUrl(url()->current()); // url of twitter card tag
            TwitterCard::setImage($img);

            //JsonLd

            JsonLd::setType('WebPage');
            JsonLd::setTitle($seo->seo_title);
            JsonLd::setDescription($seo->seo_description);
            JsonLd::setUrl(url()->current());
            JsonLd::addValue('datePublished', $seo->created_at);
            JsonLd::addValue('dateModified', $seo->updated_at);
            JsonLd::addValue('inLanguage', 'bn-BD');
            JsonLd::addValue('isPartOf', [
                "@type" => "WebSite",
                "@id" => $url,
                "url" => $url
            ]);
            JsonLd::addValue('publisher', [
                '@id' => "$url/#organization",
                '@type' => 'Organization',
                'name' => $name,
                'url' => $url,
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => $img,
                    'caption' => $seo->seo_description,
                    'inLanguage' => 'bn-BD',
                    'contentUrl' => url()->current(),
                ],
            ]);
        }

        return view('Themes.theme1.pages.blog', [
            'blogs'     => $blog,
            'recent'    => $recent,
            'bests'     => $best,
            'cats'      => $category,
        ]);
    }
}