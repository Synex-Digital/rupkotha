@php
    function convert_to_bengali($number)
    {
        $englishDigits = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        $bengaliDigits = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
        return str_replace($englishDigits, $bengaliDigits, $number);
    }
@endphp
@extends('Themes.theme1.layout.app')

@section('content')
    {{ config('config') }}
    <!-- hero section -->
    <section id="hero">
        <div class="container-xl">

            <div class="row gy-4">

                <div class="col-lg-8">

                    <!-- featured post large -->
                    <div class="post featured-post-lg">
                        <div class="details clearfix">
                            <a href="#" class="category-badge bd-font">সারপ্রাইজ</a>
                            <h2 class="post-title bd-font" style="letter-spacing: 2px;"><a href="#">নিশোর
                                    সারপ্রাইজ দ্বিতীয় পর্ব বউকে
                                    ন্যাংটো দিলাম পর্ব ১</a>
                            </h2>
                            <ul class="meta list-inline mb-0">
                                <li class="list-inline-item"><a href="#">Katen Doe</a></li>
                                <li class="list-inline-item">29 March 2021</li>
                            </ul>
                        </div>
                        <a href="#">
                            <div class="thumb rounded">
                                <div class="inner data-bg-image"
                                    data-bg-image="{{ asset('Themes/Theme1/images/posts/featured-lg.jpg') }}"></div>
                            </div>
                        </a>
                    </div>

                </div>

                <div class="col-lg-4">

                    <!-- post tabs -->
                    <div class="post-tabs rounded bordered">
                        <!-- tab navs -->
                        <ul class="nav nav-tabs nav-pills nav-fill bd-font" id="postsTab" role="tablist">
                            <li class="nav-item" role="presentation"><button aria-controls="popular" aria-selected="true"
                                    class="nav-link active" data-bs-target="#popular" data-bs-toggle="tab" id="popular-tab"
                                    role="tab" type="button">জনপ্রিয়</button></li>
                            <li class="nav-item" role="presentation"><button aria-controls="recent" aria-selected="false"
                                    class="nav-link" data-bs-target="#recent" data-bs-toggle="tab" id="recent-tab"
                                    role="tab" type="button">নতুন</button></li>
                        </ul>
                        <!-- tab contents -->
                        <div class="tab-content" id="postsTabContent">
                            <!-- loader -->
                            <div class="lds-dual-ring"></div>
                            <!-- popular posts -->
                            <div aria-labelledby="popular-tab" class="tab-pane fade show active" id="popular"
                                role="tabpanel">
                                @foreach ($bests as $key => $blog)
                                    <x-blog-list :blog="$blog" key="{{ convert_to_bengali($key + 1) }}" />
                                @endforeach
                            </div>
                            <!-- recent posts -->
                            <div aria-labelledby="recent-tab" class="tab-pane fade" id="recent" role="tabpanel">
                                @foreach ($recent as $key => $blog)
                                    <x-blog-list :blog="$blog" key="{{ convert_to_bengali($key + 1) }}" />
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- section main content -->
    <section class="main-content">
        <div class="container-xl">

            <div class="row gy-4">

                <div class="col-lg-8">

                    <!-- section header -->
                    <div class="section-header">
                        <h3 class="section-title bd-font">জনপ্রিয়</h3>
                        <img src="{{ asset('themes/Theme1/images/wave.svg') }}" class="wave" alt="wave" />
                    </div>

                    <div class="row gy-5">
                        {{-- item --}}
                        @foreach ($bests as $blog)
                            <div class="col-lg-6 mb-2">
                                <x-blog-main :blog="$blog" />
                            </div>
                        @endforeach
                    </div>

                    <div class="spacer" data-height="50"></div>

                    <!-- horizontal ads -->
                    <div class="ads-horizontal text-md-center">
                        <span class="ads-title">- Sponsored Ad -</span>
                        <a href="#">
                            <img src="{{ asset('Themes/Theme1/images/ads/bannerads1.png') }}" alt="Advertisement" />
                        </a>
                    </div>

                    <div class="spacer" data-height="50"></div>

                    <!-- section header -->
                    {{-- <div class="section-header">
                            <h3 class="section-title">বিখ্যাত</h3>
                                <img src="{{ asset('Themes/Theme1/images/wave.svg') }}" class="wave" alt="wave" />
                            </div>

                            <div class="row gy-5">
                            @foreach ($bests as $blog)
                                <div class="col-lg-6 mb-2">
                                    <x-blog-main :blog="$blog" />
                                </div>
                            @endforeach
                        </div> --}}


                    <div class="spacer" data-height="50"></div>

                    <!-- section header -->
                    <div class="section-header">
                        <h3 class="section-title bd-font">অনুপ্রেরণা</h3>
                        <img src="{{ asset('themes/Theme1/images/wave.svg') }}" class="wave" alt="wave" />
                        <div class="slick-arrows-top">
                            <button type="button" data-role="none" class="carousel-topNav-prev slick-custom-buttons"
                                aria-label="Previous"><i class="icon-arrow-left"></i></button>
                            <button type="button" data-role="none" class="carousel-topNav-next slick-custom-buttons"
                                aria-label="Next"><i class="icon-arrow-right"></i></button>
                        </div>
                    </div>

                    <div class="row post-carousel-twoCol post-carousel">
                        @foreach ($recent as $blog)
                            {{-- item --}}
                            <div class="card bd-card p-1 position-relative shadow-sm rounded bd-font">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="fw-bolder bd-font" style="color: #C60B0D !important;">
                                                {{ $blog->title }}</h5>
                                            <p class="text-secondary mt-3">
                                                {{ $blog->seo_description }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row" style="font-size: 13px">
                                        <div class="col-6 text-secondary">
                                            by <span class="text-uppercase fw-bolder">{{ $blog->author }}</span>
                                        </div>
                                        <div class="col-6 fw-bolder" style="text-align: end">
                                            <p class="text-secondary"><span style="padding-right: 3px"><img
                                                        src="{{ asset('Themes/Theme1/images/eyebig.svg') }}"
                                                        alt=""></span>156 view</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="spacer" data-height="50"></div>

                    <!-- section header -->
                    <div class="section-header">
                        <h3 class="section-title bd-font">নতুন</h3>
                        <img src="{{ asset('Themes/Theme1/images/wave.svg') }}" class="wave" alt="wave" />
                        <div class="slick-arrows-top">
                            <a href="#" class="btn btn-sm btn-default">View all</a>
                        </div>
                    </div>

                    <div class="row gy-5">
                        @foreach ($recent as $blog)
                            <div class="col-lg-6 mb-2">
                                <x-blog-main :blog="$blog" />
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-4">
                    <!-- sidebar -->
                    <div class="sidebar">
                        <!-- widget about -->
                        <div class="widget rounded">
                            <div class="widget-about data-bg-image text-center"
                                data-bg-image="{{ asset('Themes/Theme1/images/map-bg.png') }}">
                                <p class="mb-4 bd-font">প্লিজ বস, আপনার ধোনের পানি ফেলে দিচ্ছি আমি, তাও আমার ক্ষতি করেন না
                                    আপনি।
                                    যেভাবে বলবেন সেভাবেই আপনার পানি বের করে দিচ্ছি
                                </p>
                                <ul class="social-icons list-unstyled list-inline mb-0">
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a>
                                    </li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a>
                                    </li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- widget popular posts -->
                        <div class="widget rounded">
                            <div class="widget-header text-center">
                                <h3 class="widget-title bd-font">চিরকাল বিখ্যাত</h3>
                                <img src="{{ asset('themes/Theme1/images/wave.svg') }}" class="wave" alt="wave" />
                            </div>
                            <div class="widget-content">
                                @foreach ($bests as $key => $blog)
                                    <x-blog-list :blog="$blog" key="{{ convert_to_bengali($key + 1) }}" />
                                @endforeach
                            </div>
                        </div>

                        <!-- widget categories -->
                        <div class="widget rounded bd-font">
                            <div class="widget-header text-center">
                                <h3 class="widget-title bd-font">বিভাগ</h3>
                                <img src="{{ asset('themes/Theme1/images/wave.svg') }}" class="wave" alt="wave" />
                            </div>
                            <div class="widget-content">
                                <ul class="list">
                                    @foreach ($cats as $cat)
                                        <li><a
                                                href="{{ route('category.view', $cat->slug) }}">{{ $cat->name }}</a><span>({{ $cat->blogs ? $cat->blogs->count() : '0' }})</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>

                        <!-- widget newsletter -->
                        <div class="widget rounded">
                            <div class="widget-header text-center">
                                <h3 class="widget-title bd-font">সংযুক্ত থাকুন</h3>
                                <img src="{{ asset('themes/Theme1/images/wave.svg') }}" class="wave" alt="wave" />
                            </div>
                            <div class="widget-content">
                                <span class="newsletter-headline text-center mb-3">Join ৭০,০০০ subscribers!</span>
                                <form>
                                    <div class="mb-2">
                                        <input class="form-control w-100 text-center" placeholder="Email address…"
                                            type="email" aria-label="Descriptive Name" name="email">
                                    </div>
                                    <button class="btn btn-default btn-full" type="submit">Sign Up</button>
                                </form>
                                <span class="newsletter-privacy text-center mt-3">By signing up, you agree to our <a
                                        href="#">Privacy Policy</a></span>
                            </div>
                        </div>

                        <!-- widget post carousel -->
                        <div class="widget rounded">
                            <div class="widget-header text-center">
                                <h3 class="widget-title">Celebration</h3>
                                <img src="{{ asset('themes/Theme1/images/wave.svg') }}" class="wave" alt="wave" />
                            </div>
                            <div class="widget-content">
                                <div class="post-carousel-widget">
                                    @foreach ($recent as $blog)
                                        <div class="card bd-card p-1 position-relative shadow-sm rounded bd-font">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <a href="{{ route('blog.view', $blog->slug) }}">
                                                            <h5 class="fw-bolder bd-font"
                                                                style="color: #C60B0D !important;">
                                                                {{ $blog->title }}</h5>
                                                        </a>
                                                        <p class="text-secondary mt-3">{{ $blog->seo_description }}</p>
                                                    </div>
                                                </div>
                                                <div class="row" style="font-size: 13px">
                                                    <div class="col-6 text-secondary">
                                                        by <span
                                                            class="text-uppercase fw-bolder">{{ $blog->author }}</span>
                                                    </div>
                                                    <div class="col-6 fw-bolder" style="text-align: end">
                                                        <p class="text-secondary"
                                                            style="display: flex;justify-content: flex-end;"><img
                                                                src="{{ asset('Themes/Theme1/images/eyebig.svg') }}"
                                                                alt="">156 view</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <!-- carousel arrows -->
                                <div class="slick-arrows-bot">
                                    <button type="button" data-role="none"
                                        class="carousel-botNav-prev slick-custom-buttons" aria-label="Previous"><i
                                            class="icon-arrow-left"></i></button>
                                    <button type="button" data-role="none"
                                        class="carousel-botNav-next slick-custom-buttons" aria-label="Next"><i
                                            class="icon-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>

                        <!-- widget advertisement -->
                        <div class="widget no-container rounded text-md-center">
                            <span class="ads-title">- Sponsored Ad -</span>
                            <a href="#" class="widget-ads">
                                <img src="{{ asset('themes/Theme1/images/wave.svg') }}" alt="Advertisement" />
                            </a>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
