@extends('dashboard.layout.app')
@section('style')
    <!-- include libraries(jQuery, bootstrap) -->

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa-solid fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="" class="disabled">Blogs</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Create or Add Blog</a></li>
            </ol>
            <div class="col-lg-12">
                <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <div class="card-header">
                            <h4 class='card-title'>Create / Add Blogs</h4>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="form-label ">Category Name
                                        *</label>
                                    <select name="category_id"
                                        class="form-control @error('category_id') is-invalid @enderror">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                        <option value="" disabled>If category is not in the list, than firstly add the
                                            category's information</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="col-sm-3 col-form-label">Author's Name</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control @error('author') is-invalid @enderror"
                                            placeholder="Author's Name" name="author" value="{{ old('author') }}">
                                        @error('author')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="col-sm-3 col-form-label">Blog Title <span
                                            class="required-tag">*</span></label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            placeholder="Enter blog title" name="title" value="{{ old('title') }}">
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="formFile" class="form-label">Image <span
                                            style="font-size: 12px;font-style: italic">width-110px / height-80px</span>
                                    </label>
                                    <input class="form-control @error('image') is-invalid @enderror" type="file"
                                        id="formFile" name="image" value="{{ old('image') }}">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-sm-3 col-form-label">Blog Part <span
                                            style="font-size: 11px;font-style: italic">Alternate</span></label>
                                    <select name="blog_id" class="form-control @error('blog_id') is-invalid @enderror">
                                        <option value="">Select blog</option>
                                        @foreach ($blogs as $blog)
                                            <option value="{{ $blog->id }}">{{ $blog->slug }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 col-form-label">Content <span
                                            class="required-tag">*</span></label>
                                    <textarea id="summernote" class="@error('content') is-invalid @enderror" name="content">{{ old('content') }}</textarea>
                                    @error('content')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4 class='card-title'>SEO</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="col-sm-3 col-form-label">slug <span class="required-tag">*</span></label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                            placeholder="blog slug" name="slug" value="{{ old('slug') }}">
                                        @error('slug')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-sm-3 col-form-label">SEO Title</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" placeholder="Title" name="seo_title"
                                            value="{{ old('seo_title') }}">
                                        @error('seo_title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-sm-3 col-form-label">SEO Description</label>
                                    <textarea class="form-control" rows="5" @error('seo_description') is-invalid @enderror" name="seo_description"
                                        placeholder="Write description" is-invalid>{{ old('seo_title') }}</textarea>
                                    @error('seo_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-sm-3 col-form-label">SEO Tags</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" placeholder="Tags" name="seo_tags"
                                            value="{{ old('seo_tags') }}">
                                        @error('seo_tags')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#summernote').summernote({
            placeholder: 'Write content for your blog',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>
@endsection
