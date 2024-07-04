@extends('dashboard.layout.app')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa-solid fa-home"></i></a></li>
        <li class="breadcrumb-item"><a href="" class="disabled">Settings</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Configurations</a></li>
    </ol>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Configurations</h4>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="card-body">
                        <form action="{{ route('config.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="formFile" class="form-label">Favicon</label>
                                    <div class="col-sm-12">
                                        <input type="file" class="form-control" @error('favicon') is-invalid @enderror"
                                            type="file" id="formFile" name="favicon">
                                        @error('favicon')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="formFile" class="form-label">Logo</label>
                                    <div class="col-sm-12">
                                        <input type="file" class="form-control" @error('logo') is-invalid @enderror"
                                            type="file" id="formFile" name="logo">
                                        @error('logo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" @error('name') is-invalid @enderror"
                                            placeholder="Enter Name" name="name">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-12">
                                        <input type="email" class="form-control" @error('email') is-invalid @enderror"
                                            placeholder="Enter Email Address" name="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="col-sm-3 col-form-label">Address</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" @error('address') is-invalid @enderror"
                                            placeholder="Enter Address" name="address">
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="col-sm-3 col-form-label">Number</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" @error('phone') is-invalid @enderror"
                                            placeholder=017-0000-0000" name="phone">
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="col-sm-3 col-form-label">URL</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" @error('url') is-invalid @enderror"
                                            placeholder="https://" name="url">
                                        @error('url')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Configure</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card">
                @if (session('danger'))
                    <div class="alert alert-danger">{{ session('danger') }}</div>
                @endif

                <div class="card-header">
                    <h4 class="card-title">
                        Configuation List
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th><strong>Sl. No</strong></th>
                                    <th><strong>Favicon</strong></th>
                                    <th><strong>Logo</strong></th>
                                    <th><strong>Name</strong></th>
                                    <th><strong>Email</strong></th>
                                    <th><strong>Address</strong></th>
                                    <th><strong>Number</strong></th>
                                    <th><strong>Status</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($config as $sl => $configs)
                                    <tr>
                                        <td><strong>{{ $sl + 1 }}</strong></td>

                                        <td><img src="{{ url('/' . $configs->favicon) }}" class="rounded-lg me-2"
                                                width="20" alt=""></td>

                                        <td><img src="{{ url('/' . $configs->logo) }}" class="rounded-lg me-2"
                                                width="20" alt=""></td>

                                        <td><span class="w-space-no">{{ $configs->name }}</span></td>

                                        <td><span class="w-space-no">{{ $configs->email }}</span></td>

                                        <td><span class="w-space-no">{{ $configs->address }}</span></td>

                                        <td><span class="w-space-no">{{ $configs->phone }}</span></td>

                                        <td><span
                                                class="badge light {{ $configs->status == 'inactive' ? 'badge-danger' : 'badge light' }} badge-success">{{ $configs->status }}</span>
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
@endsection
