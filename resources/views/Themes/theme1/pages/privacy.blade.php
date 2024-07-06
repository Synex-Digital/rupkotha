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
                   {{-- here privacy content --}}
                   {{-- here privacy content --}}
<h2>Privacy Policy</h2>

<p>Your privacy is important to us. It is {{-- config('app.name') --}}'s policy to respect your privacy regarding any information we may collect from you across our website {{-- config('app.url') --}} and other sites we own and operate.</p>

<h3>1. Information We Collect</h3>
<p>We only collect information about you if we have a reason to do so – for example, to provide our services, to communicate with you, or to improve our services.</p>

<h3>2. How We Use Your Information</h3>
<p>We use the information we collect in various ways, including to:</p>
<ul>
    <li>Provide, operate, and maintain our website</li>
    <li>Improve, personalize, and expand our website</li>
    <li>Understand and analyze how you use our website</li>
    <li>Develop new products, services, features, and functionality</li>
</ul>

<h3>3. Security of Your Information</h3>
<p>We value your trust in providing us your personal information, thus we are striving to use commercially acceptable means of protecting it. But remember that no method of transmission over the internet, or method of electronic storage is 100% secure and reliable, and we cannot guarantee its absolute security.</p>

<h3>4. Links to Other Sites</h3>
<p>Our website may contain links to other sites. If you click on a third-party link, you will be directed to that site. Note that these external sites are not operated by us. Therefore, we strongly advise you to review the Privacy Policy of these websites. We have no control over, and assume no responsibility for the content, privacy policies, or practices of any third-party sites or services.</p>

<h3>5. Changes to This Privacy Policy</h3>
<p>We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page. You are advised to review this Privacy Policy periodically for any changes. Changes to this Privacy Policy are effective when they are posted on this page.</p>

<h3>6. Contact Us</h3>
<p>If you have any questions about this Privacy Policy, please contact us:</p>
<ul>
    <li>By email: [Your contact email]</li>
    <li>By visiting this page on our website: [Your contact page URL]</li>
    <li>By phone number: [Your phone number]</li>
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
