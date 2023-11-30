@extends('admin.layouts.master')
@section('title', 'Add Home Page Header')
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Create Home Page Header</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('home-page.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xl-2">
                                <div class="mb-5">
                                    <img id="showImage" width="100px" src="{{ url('no-image.jpg') }}">
                                </div>
                            </div>
                            <div class="col-xl-5">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium" for="">media</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-folder-image" id="mdi-account"></span>
                                        </div>
                                        <input type="file" class="form-control" name="media" id="image">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-5">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium" for="">Media Type</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-account" id="mdi-account"></span>
                                        </div>
                                        <select class="form-control" name="mediaType">
                                            <option value="image" selected>
                                                Select an option</option>
                                            <option value="video"{{ old('mediaType') === 'video' ? ' selected' : '' }}>
                                                Video</option>
                                            <option value="image"{{ old('mediaType') === 'image' ? ' selected' : '' }}>
                                                Image</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">Home Page Header</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-certificate" id="mdi-account"></span>
                                        </div>
                                        <input type="text" class="form-control" name="header"
                                            value="{{ old('header') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">Home Page Text</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-certificate" id="mdi-account"></span>
                                        </div>
                                        <input type="text" class="form-control" name="text"
                                            value="{{ old('text') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="mb-5">
                                <label class="text-dark font-weight-medium">Status</label>
                                <div class="input-group mb-3">

                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="statusSwitch" name="status"
                                            {{ old('status') ? 'Checked' : '' }} checked>
                                        <label class="custom-control-label" for="statusSwitch"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-footer pt-5 border-top">
                                <button type="submit" class="btn btn-primary btn-pill">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            })
        });
    </script>
@endsection
