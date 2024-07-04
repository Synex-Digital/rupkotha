<div class="card bd-card p-1 position-relative shadow-sm rounded bd-font">
    <a style="bottom: -16px; width:160px;"
        class="btn btn-default shadow text-white position-absolute start-50 translate-middle-x rounded-5"
        href="{{ route('blog.view', $blog->slug) }}">Read</a>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <a href="{{ route('blog.view', $blog->slug) }}">
                    <h5 class="fw-bolder bd-font">{{ $blog->title }}</h5>
                </a>
                <p class="text-secondary mt-3">
                    {{ $blog->seo_description }}
                </p>
            </div>
        </div>
        <div class="row" style="font-size: 13px">
            <div class="col-6 text-secondary">
                by <span class="text-uppercase fw-bolder">khaalifa</span>
            </div>
            <div class="col-6 fw-bolder" style="text-align: end">
                <p class="text-secondary"><span style="padding-right: 3px"><img
                            src="{{ asset('Themes/Theme1/images/eyebig.svg') }}"
                            alt=""></span>{{ number_format($blog->view_count) }}</p>
            </div>
        </div>
    </div>
</div>
