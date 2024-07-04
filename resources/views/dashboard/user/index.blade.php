@extends('dashboard.layout.app')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa-solid fa-home"></i></a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Profile</a></li>
            </ol>
            <div class="col-lg-12">
                <div class="profile card card-body px-3 pt-3 pb-0">
                    <div class="profile-head">
                        <div class="photo-content">
                            <div class="cover-photo"></div>
                        </div>
                        <div class="profile-info">
                            <div class="profile-photo">
                                <img src="{{asset('dashboards/Theme1/images/profile/admin.jpg')}}" class="img-fluid rounded-circle" alt="">
                            </div>
                            <div class="profile-details">
                                <div class="profile-name px-3 pt-2">
                                    <h4 class="text-primary mb-0">{{ auth()->user()->name }}</h4>
                                    <p>Name</p>
                                </div>
                                <div class="profile-email px-2 pt-2">
                                    <h4 class="text-muted mb-0">{{ auth()->user()->email }}</h4>
                                    <p>Email</p>
                                </div>


                                <div class="col-xl-8">
                                    <div class="card h-auto">
                                        <div class="card-body">
                                            <div class="profile-tab">
                                                <div class="custom-tab-1">
                                                    <ul class="nav nav-tabs">
                                                        <li class="nav-item"><a href="#profile-settings" data-bs-toggle="tab" class="nav-link">Settings</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div id="profile-settings" class="tab-pane fade">
                                                            <div class="pt-3">
                                                                <div class="settings-form">
                                                                    @if(session('success'))
                                                                        <div class="alert alert-success">{{ session('success') }}</div>
                                                                    @endif
                                                                    <h4 class="text-primary">Account Settings</h4>
                                                                    <br>
                                                                    <form action="{{ route('user.update', auth()->user()->id) }}" method="POST" >
                                                                        @method('PUT')
                                                                        @csrf
                                                                        <div class="row">
                                                                            <div class="form-group col-md-6">
                                                                                <label>Name</label>
                                                                                <input type="name" placeholder="Name"
                                                                                name="name" class="form-control">
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label>Email</label>
                                                                                <input type="email" placeholder="Email"
                                                                                name="email" class="form-control">
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label>Password</label>
                                                                                <input type="password" placeholder="Password" name="password" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        </div>

                                                                        <button class="btn btn-primary" type="submit">Update</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

