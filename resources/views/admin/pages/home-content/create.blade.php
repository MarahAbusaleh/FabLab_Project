@extends('admin.layouts.master')
@section('title', 'Add Home Content Section')
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Create Home Content Section</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('home-content.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xl-2">
                                <div class="mb-5">
                                    <img id="showImage" width="100px" src="{{ url('no-image.jpg') }}">
                                </div>
                            </div>
                            <div class="col-xl-10">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium" for="">Image #1</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-folder-image" id="mdi-account"></span>
                                        </div>
                                        <input type="file" class="form-control" name="image1" id="image">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-2">
                                <div class="mb-5">
                                    <img id="showImage2" width="100px" src="{{ url('no-image.jpg') }}">
                                </div>
                            </div>
                            <div class="col-xl-10">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium" for="">Image #2</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-folder-image" id="mdi-account"></span>
                                        </div>
                                        <input type="file" class="form-control" name="image2" id="image2">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-2">
                                <div class="mb-5">
                                    <img id="showImage3" width="100px" src="{{ url('no-image.jpg') }}">
                                </div>
                            </div>
                            <div class="col-xl-10">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium" for="">Image #3</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-folder-image" id="mdi-account"></span>
                                        </div>
                                        <input type="file" class="form-control" name="image3" id="image3">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">Home Page Content Section Header</label>
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
                                    <label class="text-dark font-weight-medium">Home Page Content Section
                                        Description</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-certificate" id="mdi-account"></span>
                                        </div>
                                        <input type="text" class="form-control" name="description"
                                            value="{{ old('description') }}">
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
        $(document).ready(function() {
            $('#image2').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage2').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            })
        });
        $(document).ready(function() {
            $('#image3').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage3').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            })
        });
    </script>
@endsection
