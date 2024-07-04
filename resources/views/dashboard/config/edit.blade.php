@extends('dashboard.layout.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa-solid fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="" class="disabled">Settings</a></li>
                <li class="breadcrumb-item"><a href="{{ route('category.create') }}">View Configurations List</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Configuration</a></li>
            </ol>
            @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
            <div class="col-lg-12">
                <form action="{{ route('config.update', $config->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Configuration</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="formFile" class="form-label">Favicon</label>
                            <div class="col-sm-12">
                                <input type="file" class="form-control" @error('favicon') is-invalid @enderror" type="file" id="formFile" name="favicon">
                                @error('favicon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="formFile" class="form-label">Logo</label>
                            <div class="col-sm-12">
                                <input type="file" class="form-control" @error('logo') is-invalid @enderror" type="file" id="formFile" name="logo">
                                @error('logo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" placeholder="Enter Category Name" name="name" value="{{ $config->name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-12">
                                    <input type="email" class="form-control" @error('email') is-invalid @enderror" placeholder="Enter Email Address" name="email" value="{{ $config->email }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Address</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" @error('address') is-invalid @enderror" placeholder="Enter Address" name="address" value="{{ $config->address }}">
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Number</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" @error('phone') is-invalid @enderror" placeholder="Enter Number" name="phone" value="{{ $config->phone }}">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
