@extends('Themes.theme1.layout.app')

@section('content')
    <section class="page-header">
        <div class="container-xl">
            <div class="text-center">
                <h1 class="mt-0 mb-2">About Us</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">About Usfbcvfg</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <section class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <div class="page-content bordered rounded padding-30">
                    <h2>Welcome to Rupkootha</h2>
                    <p>
                        Rupkootha is your ultimate guide to the latest in fashion, lifestyle trends, and cultural insights. Founded with a passion for creativity and a commitment to quality content, we aim to inspire and inform our audience through engaging articles and features.
                    </p>
                    <p>
                        At Rupkootha, we believe in the power of storytelling. Our team of experienced writers and editors curate content that not only showcases the latest trends in fashion and lifestyle but also explores the deeper meanings and influences behind them. Whether it's a deep dive into sustainable fashion, a profile of emerging designers, or a commentary on cultural phenomena, Rupkootha strives to deliver content that resonates with our diverse readership.
                    </p>
                    <p>
                        Our mission is to foster a community of like-minded individuals who appreciate creativity, individuality, and the ever-evolving nature of modern living. Through our articles, interviews, and features, we invite you to join us on a journey of exploration and discovery.
                    </p>
                    <p>
                        Explore Rupkootha and immerse yourself in a world of style, culture, and inspiration. Whether you're seeking practical fashion tips, insightful lifestyle advice, or simply looking to stay informed about the latest trends, Rupkootha is your trusted companion.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="widget rounded">
                    <div class="widget-about data-bg-image text-center" data-bg-image="images/map-bg.png"
                        style="background-image: url(&quot;images/map-bg.png&quot;);">
                        <img src="{{ asset($config ? $config->logo : '') }}" alt="Rupkootha Logo" class="mb-4">
                        <p class="mb-4">Hello, we're content creators who are passionate about fashion, lifestyle, and cultural insights. We are here to bring you engaging and informative content that reflects the spirit of Rupkootha.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
