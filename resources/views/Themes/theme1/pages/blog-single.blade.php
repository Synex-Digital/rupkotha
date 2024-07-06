@php
    $tags = explode(',', $blog->seo_tags);

    function convert_to_bengali($number)
    {
        $englishDigits = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        $bengaliDigits = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
        return str_replace($englishDigits, $bengaliDigits, $number);
    }
@endphp
@extends('Themes.theme1.layout.app')
@section('content')
    <section class="main-content mt-3">
        <div class="container-xl">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-items"><a href="#">Home</a></li><span class="breadcrumb-breaker">/</span>
                    <li class="breadcrumb-items"><a href="#">Inspiration</a></li><span
                        class="breadcrumb-breaker">/</span>
                    <li class="breadcrumb-items active" aria-current="page">{{ $blog->title }}</li>
                </ol>
            </nav>

            <div class="row gy-4">

                <div class="col-lg-8">
                    <!-- post single -->
                    <div class="post post-single">
                        <!-- post header -->
                        <div class="post-header">
                            <h1 class="title mt-0 mb-3 bd-font">{{ $blog->title }}</h1>
                            <ul class="meta list-inline mb-0">
                                <li class="list-inline-item"><a href="#">{{ $blog->category->name }}</a></li>
                                <li class="list-inline-item">{{ $blog->created_at->format('d M y') }}</li>
                                <li class="list-inline-item"><img src="{{ asset('Themes/Theme1/images/eyebig.svg') }}"
                                        alt=""> <a href="#">{{ number_format($blog->view_count) }}</a></li>
                            </ul>
                        </div>
                        <!-- post content -->
                        <div class="post-content clearfix">
                            <div class="entry-content bd-font" itemprop="text">
                                {!! $blog->content !!}
                            </div>
                        </div>
                        <!-- post bottom section -->
                        <div class="post-bottom">
                            <div class="row d-flex align-items-center">
                                <div class="col-md-6 col-12 text-center text-md-start">
                                    <!-- tags -->
                                    @foreach ($tags as $key => $tag)
                                        <a href="#" class="tag">#{{ $tag }}</a>
                                    @endforeach
                                </div>
                                <div class="col-md-6 col-12">
                                    <!-- social icons -->
                                    <ul class="social-icons list-unstyled list-inline mb-0 float-md-end">
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li class="list-inline-item"><a href="#"><i
                                                    class="fab fa-linkedin-in"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a>
                                        </li>
                                        <li class="list-inline-item"><a href="#"><i
                                                    class="fab fa-telegram-plane"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="far fa-envelope"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>

                    @if ($blog->parts)
                        <div class="spacer" data-height="50" style="height: 50px;"></div>

                        <div class="row">
                            @foreach ($blog->parts as $key => $part)
                                @if ($part->part)
                                    {{-- item --}}
                                    <div class="col-6 col-md-3">
                                        <div class="card bd-card p-1 position-relative shadow-sm rounded bd-font">
                                            <a style="bottom: -16px; width:45px;"
                                                class="btn btn-default shadow text-white position-absolute start-50 translate-middle-x rounded-5"
                                                href="{{ route('blog.view', $part->part->slug) }}">{{ $key + 1 }}</a>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <a href="{{ route('blog.view', $part->part->slug) }}">
                                                            <h5 style="font-size: 13px;margin: 5px 0">
                                                                {{ $part->part->title }}
                                                            </h5>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="row" style="font-size: 11px">
                                                    <div class="col-6 text-secondary">
                                                        <span class="fw-bolder">khaalifa</span>
                                                    </div>
                                                    <div class="col-6 fw-bolder" style="text-align: end">
                                                        <p class="text-secondary"><span style="padding-right: 3px"><img
                                                                    src="{{ asset('Themes/Theme1/images/eye.svg') }}"
                                                                    alt=""></span>{{ number_format($part->part->view_count) }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                        </div>
                    @endif

                    <div class="spacer" data-height="50" style="height: 50px;"></div>

                    <!-- section header -->
                    <div class="section-header">
                        <h3 class="section-title">অনুরূপ</h3>
                        <img src="{{ asset('Themes/Theme1/images/wave.svg') }}" class="wave" alt="wave" />
                    </div>

                    <div class="row gy-5">
                        @foreach ($related as $blog)
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
                            </div>
                        </div>

                        <!-- widget popular posts -->
                        <div class="widget rounded">
                            <div class="widget-header text-center">
                                <h3 class="widget-title bd-font">চিরকাল বিখ্যাত</h3>
                                <img src="{{ asset('themes/Theme1/images/wave.svg') }}" class="wave" alt="wave" />
                            </div>
                            <div class="widget-content">
                                @foreach ($bests as $key => $best)
                                    <!-- post -->
                                    <div class="post post-list-sm circle">
                                        <div class="thumb circle">
                                            <a href="{{ route('blog.view', $best->slug) }}">
                                                <div class="inner">
                                                    <span
                                                        class="inner-text bd-font">{{ convert_to_bengali($key + 1) }}</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0 bd-font"><a
                                                    href="{{ route('blog.view', $best->slug) }}">{{ $best->title }}</a>
                                            </h6>
                                            <ul class="meta list-inline mt-1 mb-0">
                                                <li class="list-inline-item">{{ $best->gettingDate() }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- widget categories -->
                        <div class="widget rounded bd-font">
                            <div class="widget-header text-center">
                                <h3 class="widget-title">বিভাগ</h3>
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
                                            type="email">
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
                                    <!-- post -->
                                    @foreach ($recent as $blog)
                                        <div class="card bd-card p-1 position-relative shadow-sm rounded bd-font">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <a href="{{ route('blog.view', $blog->slug) }}">
                                                            <h5 class="fw-bolder" style="color: #C60B0D !important;">
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
