@extends('admin.layouts.master')
@section('title', 'Edit Home Page Header')
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Edit Home Page Header</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('home-page.update', $homePage->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xl-2">
                                <div class="mb-5">
                                    <img id="showImage" width="100px"
                                        src="{{ $homePage->media == '' ? url('no-image.jpg') : asset($homePage->media) }}">
                                </div>
                            </div>
                            <div class="col-xl-5">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium" for="">Image</label>
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
                                            <option value="video"{{ $homePage->mediaType === 'video' ? ' selected' : '' }}>
                                                Video</option>
                                            <option value="image"{{ $homePage->mediaType === 'image' ? ' selected' : '' }}>
                                                Image</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">Home Page Text</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-certificate" id="mdi-account"></span>
                                        </div>
                                        <input type="text" class="form-control" name="text"
                                            value="{{ $homePage->text }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">Home Page Header</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-certificate" id="mdi-account"></span>
                                        </div>
                                        <input type="text" class="form-control" name="header"
                                            value="{{ $homePage->header }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="mb-5">
                                <label class="text-dark font-weight-medium">Status</label>
                                <div class="input-group mb-3">
                                    <div class="custom-control custom-switch">
                                        <input type="hidden" name="status" value="off">
                                        <input type="checkbox" class="custom-control-input" id="statusSwitch" name="status"
                                            value="on" {{ old('status') ? 'checked' : '' }}
                                            {{ $homePage->status == 'on' ? 'checked' : '' }}>
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
