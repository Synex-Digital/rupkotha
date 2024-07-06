<?php

namespace App\Http\Controllers\User;

use App\Models\Blog;
use App\Models\Config;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

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
            // Set SEO meta tags
            SEOTools::setTitle($blog->seo_title);
            SEOTools::setDescription($blog->seo_description);
            SEOTools::metatags()->setKeywords($blog->seo_tags); // Set keywords
            SEOTools::opengraph()->setUrl(url()->current());

            //Open graph
            OpenGraph::addImage($img); // add image url
            OpenGraph::setTitle($blog->seo_title); // define title
            OpenGraph::setDescription($blog->seo_description);  // define description
            OpenGraph::setType('website');
            OpenGraph::setUrl(url()->current()); // define url
            OpenGraph::setSiteName($config ? $config->name : ''); //define site_name

            //twitter
            TwitterCard::setUrl(url()->current()); // url of twitter card tag
            TwitterCard::setImage($img);

            //JsonLd

            // Add parts of the blog post
            $partsArray = [];
            if ($blog->parts) {
                # code...
                foreach ($blog->parts as $part) {
                    if ($part->part) {
                        $partsArray[] = [
                            '@type' => 'BlogPosting',
                            'headline' => $part->part->title,
                            'url' => route('blog.view', $part->part->slug),
                            'mainEntityOfPage' => [
                                '@type' => 'WebPage',
                                '@id' => route('blog.view', $part->part->slug)
                            ]
                        ];
                    }
                }
            }

            JsonLd::setType('BlogPosting');
            JsonLd::addValue('@id', url()->current());
            JsonLd::setTitle($blog->seo_title);
            JsonLd::setDescription($blog->seo_description);
            JsonLd::setUrl(url()->current());
            JsonLd::addImage(url('/') . '/' . $blog->image);
            JsonLd::addValue('datePublished', $blog->created_at);
            JsonLd::addValue('dateModified', $blog->updated_at);
            JsonLd::addValue('inLanguage', 'bn-BD');
            JsonLd::addValue('isPartOf', [
                "@type" => "WebSite",
                "@id" => $url,
                "url" => $url
            ]);
            JsonLd::addValue('hasPart', $partsArray);
            JsonLd::addValue('publisher', [
                '@id' => "$url/#organization",
                '@type' => 'Organization',
                'name' => $name,
                'url' => $url,
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => $img,
                    'caption' => $blog->seo_description,
                    'inLanguage' => 'bn-BD',
                    'contentUrl' => url()->current(),
                ],
            ]);
            JsonLd::addValue('keywords', $blog->seo_tags);
            JsonLd::addValue('articleSection', $blog->category->name);

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