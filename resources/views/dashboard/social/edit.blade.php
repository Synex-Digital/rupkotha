@extends('dashboard.layout.app')
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa-solid fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="" class="disabled">Settings</a></li>
    <li class="breadcrumb-item"><a href="{{ route('social.index') }}">Social Links</a></li>
    <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Social Link</a></li>
</ol>
    <div class="container-fluid">
        <div class="row">
            @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
            <div class="col-lg-12">
                <form action="{{ route('social.update', $social->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Social Link</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Edit Logo</label>
                                <input class="form-control" type="file" id="formFile" name="logo">
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Link</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" placeholder="Enter Link Address" name="link" value="{{ $social->link }}">
                                </div>
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
