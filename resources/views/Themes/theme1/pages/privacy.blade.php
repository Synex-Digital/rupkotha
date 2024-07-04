@extends('Themes.theme1.layout.app')

@section('content')
    <section class="page-header">
        <div class="container-xl">
            <div class="text-center">
                <h1 class="mt-0 mb-2">Privacy</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-items"><a href="{{ route('home') }}">Home</a></li><span
                            class="breadcrumb-breaker">/</span>
                        <li class="breadcrumb-items active" aria-current="page">Privacy</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <section class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <div class="page-content bordered rounded padding-30">
                    <p>Welcome to ChotiKotha, an 18+ website dedicated to sharing adult stories and confessions. This
                        privacy policy outlines how we collect, use, and protect your personal information when you visit
                        our website. By using our website, you agree to the collection and use of information in accordance
                        with this policy.</p>

                    <h2>Information Collection and Use</h2>
                    <p>We collect several types of information for various purposes to provide and improve our service to
                        you:</p>
                    <ul>
                        <li><strong>Personal Data:</strong> While using our website, we may ask you to provide us with
                            certain personally identifiable information that can be used to contact or identify you.
                            Personally identifiable information may include, but is not limited to, your email address and
                            usage data.</li>
                        <li><strong>Usage Data:</strong> We may also collect information on how the website is accessed and
                            used. This usage data may include information such as your computer's Internet Protocol (IP)
                            address, browser type, browser version, the pages of our website that you visit, the time and
                            date of your visit, the time spent on those pages, and other diagnostic data.</li>
                    </ul>

                    <h2>Cookies and Tracking Technologies</h2>
                    <p>We use cookies and similar tracking technologies to track the activity on our website and hold
                        certain information. Cookies are files with a small amount of data which may include an anonymous
                        unique identifier. You can instruct your browser to refuse all cookies or to indicate when a cookie
                        is being sent. However, if you do not accept cookies, you may not be able to use some portions of
                        our website.</p>

                    <h2>Use of Data</h2>
                    <p>ChotiKotha uses the collected data for various purposes:</p>
                    <ul>
                        <li>To provide and maintain our website</li>
                        <li>To notify you about changes to our website</li>
                        <li>To allow you to participate in interactive features of our website when you choose to do so</li>
                        <li>To provide customer support</li>
                        <li>To gather analysis or valuable information so that we can improve our website</li>
                        <li>To monitor the usage of our website</li>
                        <li>To detect, prevent and address technical issues</li>
                    </ul>

                    <h2>Transfer of Data</h2>
                    <p>Your information, including Personal Data, may be transferred to — and maintained on — computers
                        located outside of your state, province, country, or other governmental jurisdiction where the data
                        protection laws may differ from those of your jurisdiction. If you are located outside Bangladesh
                        and choose to provide information to us, please note that we transfer the data, including Personal
                        Data, to Bangladesh and process it there.</p>

                    <h2>Disclosure of Data</h2>
                    <p>We may disclose your personal information in the good faith belief that such action is necessary to:
                    </p>
                    <ul>
                        <li>To comply with a legal obligation</li>
                        <li>To protect and defend the rights or property of ChotiKotha</li>
                        <li>To prevent or investigate possible wrongdoing in connection with the website</li>
                        <li>To protect the personal safety of users of the website or the public</li>
                        <li>To protect against legal liability</li>
                    </ul>

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
