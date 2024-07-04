@extends('dashboard.layout.app')
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa-solid fa-home"></i></a></li>
    {{-- <li class="breadcrumb-item"><a href="" class="disabled">Settings</a></li> --}}
    <li class="breadcrumb-item active"><a href="javascript:void(0)">SEO</a></li>
</ol>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="card-header">
                        <h4 class="card-title">SEO</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('seo.store') }}" method="POST">
                        @csrf

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">SEO Title</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" @error('seo_title') is-invalid @enderror" placeholder="Enter SEO title" name="seo_title">
                                    @error('seo_title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">SEO Description</label>
                                <textarea class="from-control" rows="5" @error('seo_description') is-invalid @enderror" name="seo_description"></textarea>
                                @error('seo_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">SEO Tags</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" @error('seo_tags') is-invalid @enderror" placeholder="Enter SEO tags" name="seo_tags">
                                    @error('seo_tags')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">SEO for </label>
                                <div class="col-sm-9">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="page" value="home" checked>
                                        <label class="form-check-label">
                                            Home Page
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="page" value="about">
                                        <label class="form-check-label">
                                            About Page
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="page" value="privacy">
                                        <label class="form-check-label">
                                            Privacy Page
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="page" value="contact">
                                        <label class="form-check-label">
                                            Contact Page
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
