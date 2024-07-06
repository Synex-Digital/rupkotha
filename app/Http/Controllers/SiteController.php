<?php

namespace App\Http\Controllers;

use App\Models\Seo;
use App\Models\Config;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class SiteController extends Controller
{
    public function about()
    {
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

        $seo = Seo::where('page', 'about')->first();
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

        return view('Themes.theme1.pages.about', [
            'config' => $config
        ]);
    }

    public function contact()
    {
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

        $seo = Seo::where('page', 'contact')->first();
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
        return view('Themes.theme1.pages.contact', [
            'config' => $config
        ]);
    }

    public function privacy()
    {
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

        $seo = Seo::where('page', 'privacy')->first();
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

        return view('Themes.theme1.pages.privacy', [
            'config' => $config
        ]);
    }
}