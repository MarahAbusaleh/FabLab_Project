@extends('admin.layouts.master')
@section('title', 'Home Page Header')
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="card card-default">
                <div class="card-header">
                    <h4>Manage Home Page</h4>
                    <a href="{{ route('home-page.create') }}" class="mb-1 btn btn-outline-primary">
                        <i class=" mdi mdi-checkbox-marked-outline mr-1"></i>
                        Create Home Page Slider
                    </a>
                </div>
                <div class="card-body table-responsive">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
