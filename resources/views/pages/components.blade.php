@extends('layout.master')
@section('content')
    <!-- Component Start -->
    <div class="container-fluid container-team py-5">
        <div class="container pb-5">
            <h1> {{ $component->name }} </h1>
            <div class="row g-5 align-items-center mb-5">
                <div class="col-md-6 wow fadeIn" data-wow-delay="0.3s">
                    <img class="img-fluid w-100" src="{{ asset($component->image) }}" alt="" height="100%">
                </div>
                <div class="col-md-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="display-6 mb-3">{{ $component->name }}</h1>
                    <p class="mb-4">
                        {{ $component->description }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Component End -->
@endsection
