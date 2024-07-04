@extends('dashboard.layout.app')
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa-solid fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="" class="disabled">Settings</a></li>
    <li class="breadcrumb-item active"><a href="javascript:void(0)">Custom Codes</a></li>
</ol>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Custom Codes</h4>
                    </div>
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="card-body">
                        <form action="{{ route('custom_code.store') }}" method="POST">
                        @csrf
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Header</label>
                                <textarea class="from-control custom-code" rows="5" @error('header') is-invalid @enderror" name="header" value="">{{ $custom_code?$custom_code->header:''}}</textarea>
                                @error('header')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Footer</label>
                                <textarea class="from-control custom-code" rows="5" @error('footer') is-invalid @enderror" name="footer" value="">{{ $custom_code?$custom_code->footer:''}}</textarea>

                                @error('footer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
