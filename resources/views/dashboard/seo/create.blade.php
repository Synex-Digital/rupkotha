@extends('dashboard.layout.app')
@section('content')
{{-- <div class="container-fluid"> --}}
    <div class="row">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa-solid fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="" class="disabled">SEO</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">View SEO List</a></li>
        </ol>
        <div class="col-lg-12">
            <div class="card">
                @if(session('danger'))
                    <div class="alert alert-danger">{{ session('danger') }}</div>
                @endif

                <div class="card-header">
                    <h4 class="card-title">
                        SEO List
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th><strong>Sl. No</strong></th>
                                    <th><strong>SEO Title</strong></th>
                                    <th><strong>SEO Description</strong></th>
                                    <th><strong>SEO Tags</strong></th>
                                    <th><strong>Page</strong></th>
                                    <th><strong>Action</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($seo as $sl=>$seo_page)
                                    <tr>
                                        <td><strong>{{ $sl+1 }}</strong></td>

                                        <td><span class="w-space-no">{{ $seo_page->seo_title }}</span></td>

                                        <td><span class="w-space-no">{{ $seo_page->seo_description }}</span></td>

                                        <td><span class="w-space-no">{{ $seo_page->seo_tags }}</span></td>

                                        <td><span class="badge light {{ $seo_page->page == 'about' ? 'badge-danger' : 'badge light' }} {{ $seo_page->page == 'privacy' ? 'badge-warning' : 'badge light' }} {{ $seo_page->page == 'contact' ? 'badge-info' : 'badge light' }}  badge-success">{{ $seo_page->page }}</span></td>

                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('seo.edit', $seo_page->id) }}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>

                                                <form action="{{ route('seo.destroy', $seo_page->id) }}" method="POST">
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
