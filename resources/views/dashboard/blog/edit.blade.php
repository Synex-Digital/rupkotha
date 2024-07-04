@extends('dashboard.layout.app')

@section('style')
    <!-- include libraries(jQuery, bootstrap) -->

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa-solid fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="" class="disabled">Blogs</a></li>
                <li class="breadcrumb-item"><a href="{{ route('blog.create') }}">View Blogs List</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Blog</a></li>
            </ol>
            <div class="col-lg-12">
                <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                    <div class="card">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <div class="card-header">
                            <h4 class='card-title'>Edit Blog</h4>
                        </div>
                        <div class="card-body">

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Category Name</label>
                                    <select name="category_id" class="form-control">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                            <option value="" disabled>If category is not in the list, than firstly add the category's information</option>
                                    </select>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Author's Name</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" value="{{ $blog->author }}" name="author">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Blog Title</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" value="{{ $blog->title }}" name="title">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Image</label>
                                    <input class="form-control" type="file" id="formFile" name="image">
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Content</label>
                                    <textarea id="summernote" name="content"></textarea>
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
                                            <input class="form-check-input" type="radio" name="status" value="inactive" >
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
                                    <input type="text" class="form-control" value="{{ $blog->seo_title }}" name="seo_title">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">SEO Description</label>
                                <textarea class="from-control" rows="5" name="seo_description"></textarea>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">SEO Tags</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" value="{{ $blog->seo_tags }}" name="seo_tags">
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
