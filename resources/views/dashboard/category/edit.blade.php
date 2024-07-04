@extends('dashboard.layout.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa-solid fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="" class="disabled">Category</a></li>
                <li class="breadcrumb-item"><a href="{{ route('category.create') }}">View Categories List</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Category</a></li>
            </ol>
            @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
            <div class="col-lg-12">
                <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Category</h4>
                    </div>
                    <div class="card-body">

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" placeholder="Enter Category Name" name="name" value="{{ $category->name }}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Edit Category Image</label>
                                <input class="form-control" type="file" id="formFile" name="image">
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" value="active" checked>
                                        <label class="form-check-label">
                                            Active
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" value="inactive">
                                        <label class="form-check-label">
                                            Inactive
                                        </label>
                                    </div>
                                </div>
                            </div>


                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class='card-title'>SEO</h4>
                    </div>

                    <div class="card-body">

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">SEO Title</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" value="{{ $category->seo_title }}" name="seo_title">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">SEO Description</label>
                            <textarea class="from-control" rows="5" name="seo_description"></textarea>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">SEO Tags</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" value="{{ $category->seo_tags }}" name="seo_tags">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
