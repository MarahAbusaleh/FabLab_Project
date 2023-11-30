@extends('admin.layouts.master')
@section('title', 'Edit Contact Info')
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Edit Info</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('contact-info.update', $contactInfo->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">Phone</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-numeric"></span>
                                        </div>
                                        <input type="tel" class="form-control" name="phone"
                                            value="{{ $contactInfo->phone }}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">Email</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-email"></span>
                                        </div>
                                        <input type="email" class="form-control" name="email"
                                            value="{{ $contactInfo->email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">Facebook</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-facebook" id="mdi-facebook"></span>
                                        </div>
                                        <input type="text" class="form-control" name="facebook"
                                            value="{{ $contactInfo->facebook }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">Youtube</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-youtube" id="mdi-youtube"></span>
                                        </div>
                                        <input type="text" class="form-control" name="youtube"
                                            value="{{ $contactInfo->youtube }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">Twitter</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-twitter" id="mdi-twitter"></span>
                                        </div>
                                        <input type="text" class="form-control" name="twitter"
                                            value="{{ $contactInfo->twitter }}">
                                    </div>
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
@endsection
