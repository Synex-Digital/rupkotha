@extends('dashboard.layout.app')
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa-solid fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="" class="disabled">Settings</a></li>
    <li class="breadcrumb-item active"><a href="javascript:void(0)">Social Links</a></li>
</ol>
    {{-- <div class="container-fluid"> --}}
        <div class="row">

                <div class="col-lg-5">
                    <div class="card">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <div class="card-header">
                            <h4 class="card-title">Social Links</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('social.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
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
                                    <label class="col-sm-3 col-form-label">Link</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" @error('link') is-invalid @enderror" placeholder="Enter Link Address" name="link">
                                        @error('link')
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
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>

                @if(session('danger'))
                    <div class="alert alert-danger">{{ session('danger') }}</div>
                @endif
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-header">
                            <h4 class='card-title'>All Social Links</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-responsive-md">
                                    <thead>
                                        <tr>
                                            <th><strong>Sl. No</strong></th>
                                            <th><strong>Logo</strong></th>
                                            <th><strong>Link</strong></th>
                                            <th><strong>Status</strong></th>
                                            <th><strong>Action</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($social as $sl=>$social_links)
                                            <tr>
                                                <td width="5%"><strong>{{ $sl+1 }}</strong></td>

                                                <td width="10%"><div class="d-flex align-items-center"><img src="{{ url('/'.$social_links->logo)}}" class="rounded-lg me-2" width="20" alt=""> </div></td>

                                                <td width="20%"><span class="w-space-no">{{ $social_links->link }}</span></td>

                                                <td width="20%"><span class="badge light {{ $social_links->status == 'inactive' ? 'badge-danger' : 'badge light' }} badge-success">{{ $social_links->status }}</span></td>

                                                <td width="20%">
                                                    <div class="d-flex">
                                                        <a href="{{ route('social.edit', $social_links->id) }}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>

                                                        <form action="{{ route('social.destroy', $social_links->id) }}" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    {{-- </div> --}}
@endsection
