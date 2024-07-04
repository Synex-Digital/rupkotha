@extends('dashboard.layout.app')
@section('content')
{{-- <div class="container-fluid"> --}}
    <div class="row">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa-solid fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="" class="disabled">Settings</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">View Configurations</a></li>
        </ol>
        <div class="col-lg-12">
            <div class="card">
                @if(session('danger'))
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
                                    <th><strong>Action</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($config as $sl=>$configs)
                                    <tr>
                                        <td><strong>{{ $sl+1 }}</strong></td>

                                        <td><img src="{{ url('/'.$configs->favicon)}}" class="rounded-lg me-2" width="20" alt=""></td>

                                        <td><img src="{{ url('/'.$configs->logo)}}" class="rounded-lg me-2" width="20" alt=""></td>

                                        <td><span class="w-space-no">{{ $configs->name }}</span></td>

                                        <td><span class="w-space-no">{{ $configs->email }}</span></td>

                                        <td><span class="w-space-no">{{ $configs->address }}</span></td>

                                        <td><span class="w-space-no">{{ $configs->phone }}</span></td>

                                        <td><span class="badge light {{ $configs->status == 'inactive' ? 'badge-danger' : 'badge light' }} badge-success">{{ $configs->status }}</span></td>

                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('config.edit', $configs->id) }}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>

                                                <form action="{{ route('config.destroy', $configs->id) }}" method="POST">
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
