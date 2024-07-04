@extends('Themes.theme1.layout.app')

@section('content')
    <section class="page-header">
        <div class="container-xl">
            <div class="text-center">
                <h1 class="mt-0 mb-2">About Us</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-items"><a href="{{ route('home') }}">Home</a></li><span
                            class="breadcrumb-breaker">/</span>
                        <li class="breadcrumb-items active" aria-current="page">Abouts</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <section class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <div class="page-content bordered rounded padding-30">
                    <p>Welcome to <strong>ChotiKotha</strong>, the premier online community for B's living abroad.
                        Our platform is dedicated to providing a space where members of the B' diaspora can share
                        and explore adult stories and confessions in a respectful and supportive environment.</p>

                    <h5>Our Mission</h5>
                    <p>Our mission is to create a safe, engaging, and inclusive space for B's around the world to
                        connect through storytelling. We believe in the power of shared experiences and the importance of
                        having a platform where adults can openly discuss and share their intimate stories without judgment.
                    </p>

                    <h5>What We Offer</h5>
                    <p>At ChotiKotha, we offer a unique platform where users can:</p>
                    <ul>
                        <li>Read a diverse collection of adult stories and confessions written by fellow members of the
                            B' community.</li>
                        <li>Share their own personal stories and confessions anonymously, fostering a sense of connection
                            and understanding.</li>
                        <li>Engage in discussions and provide feedback on the stories shared by others.</li>
                    </ul>

                    <h5>Why Choose ChotiKotha?</h5>
                    <p>We understand the unique cultural nuances and experiences of the B' diaspora. ChotiKotha is
                        more than just a website; it's a community where you can feel at home. Here are a few reasons why
                        our members love ChotiKotha:</p>
                    <ul>
                        <li><strong>Privacy and Anonymity:</strong> We prioritize your privacy and ensure that you can share
                            your stories without revealing your identity.</li>
                        <li><strong>Respectful Environment:</strong> We maintain a respectful and supportive community where
                            everyone is welcome to share and engage.</li>
                        <li><strong>Quality Content:</strong> Our platform features a wide range of high-quality, engaging
                            content tailored to the interests of our community.</li>
                    </ul>

                    <h5>Join Our Community</h5>
                    <p>We invite you to join our growing community of B' expatriates who are exploring and sharing
                        their stories on ChotiKotha. Whether you're here to read, share, or simply connect with others,
                        you'll find a welcoming and vibrant space.</p>

                    <p>Thank you for being a part of ChotiKotha. If you have any questions or need assistance, please don't
                        hesitate to reach out to us at <a href="mailto:support@chotikotha.com">support@chotikotha.com</a>.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="widget rounded">
                    <div class="widget-about data-bg-image text-center" data-bg-image="images/map-bg.png"
                        style="background-image: url(&quot;images/map-bg.png&quot;);">
                        <img src="{{ asset($config ? $config->logo : '') }}" alt="logo" class="mb-4">
                        <p class="mb-4">Hello, We’re content writer who is fascinated by content fashion, celebrity and
                            lifestyle. We helps clients bring the right content to the right people.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
