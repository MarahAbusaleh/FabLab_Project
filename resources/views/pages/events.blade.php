@extends('layout.master')
@section('content')
    <!-- Events Start -->
    <div class="container-fluid container-team py-5">
        <div class="container pb-5">
            <h1> Events </h1>
            <div class="row">
                @foreach ($events as $event)
                    <div class="col-lg-4 col-md-6 d-flex ftco-animate">
                        <div class="blog-entry justify-content-end">
                            <img src="{{ $event->image }}"class="block-20" />
                            </a>
                            <div class="text p-4 float-right d-block">
                                @php
                                    $carbonDate = \Carbon\Carbon::parse($event->date);
                                @endphp
                                <div class="d-flex align-items-center pt-2 mb-4">
                                    <div class="one">
                                        <span class="day">{{ $carbonDate->format('d') }}</span>
                                    </div>
                                    <div class="two">
                                        <span class="yr">{{ $carbonDate->format('Y') }}</span>
                                        <span class="mos">{{ $carbonDate->format('F') }}</span>
                                    </div>
                                </div>
                                <h3 class="heading mt-2"><a href="#">{{ $event->name }}</a>
                                </h3>
                                <p>
                                    {{ $event->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Events End -->
@endsection
