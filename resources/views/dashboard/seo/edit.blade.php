@extends('dashboard.layout.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa-solid fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="" class="disabled">SEO</a></li>
                <li class="breadcrumb-item"><a href="{{ route('seo.create') }}">View SEO List</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit SEO</a></li>
            </ol>
            @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
            <div class="col-lg-12">
                <form action="{{ route('seo.update', $seo->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit SEO</h4>
                        </div>
                        <div class="card-body">

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">SEO Title</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" placeholder="Enter SEO title" name="seo_title" value="{{ $seo->seo_title }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">SEO Description</label>
                                    <textarea class="from-control" rows="5" name="seo_description"></textarea>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">SEO Tags</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" placeholder="Enter SEO tags" name="seo_tags" value="{{ $seo->seo_tags }}">
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


                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
