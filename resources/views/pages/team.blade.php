@extends('layout.master')
@section('content')
    <!-- Team Start -->
    <div class="container-fluid container-team py-5">
        <div class="container pb-5">
            <section class="speaker-section spad">
                <h1> Instructors </h1>
                <div class="container">
                    <div class="row">
                        @foreach ($instructors as $instructor)
                            <div class="col-sm-6">
                                <div class="speaker-item">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="si-pic">
                                                <img src="{{ asset($instructor->image) }}" alt="" width="100%">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="si-text">
                                                <div class="si-title">
                                                    <h4>{{ $instructor->name }}</h4>
                                                    <span>{{ $instructor->role }}</span>
                                                </div>
                                                <div class="d-flex">
                                                    <a class="btn btn-lg-square btn-primary me-2" href=""><i
                                                            class="fab fa-facebook-f"></i></a>
                                                    <a class="btn btn-lg-square btn-primary me-2" href=""><i
                                                            class="fab fa-twitter"></i></a>
                                                    <a class="btn btn-lg-square btn-primary me-2" href=""><i
                                                            class="fab fa-linkedin-in"></i></a>
                                                    <a class="btn btn-lg-square btn-primary me-2" href=""><i
                                                            class="fab fa-youtube"></i></a>
                                                </div>
                                                <p class="mb-4">
                                                    {{ $instructor->description }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <h1> Instructors </h1>
            @foreach ($instructors as $instructor)
                <div class="row g-5 align-items-center mb-5">
                    <div class="col-md-6 wow fadeIn" data-wow-delay="0.3s">
                        <img class="img-fluid w-100" src="{{ asset($instructor->image) }}" alt="" height="100%">
                    </div>
                    <div class="col-md-6 wow fadeIn" data-wow-delay="0.5s">
                        <h1 class="display-6 mb-3">{{ $instructor->name }}</h1>
                        <p class="mb-1">{{ $instructor->email }}</p>
                        <h3 class="mb-3">{{ $instructor->role }}</h3>
                        <p class="mb-4">
                            {{ $instructor->description }}
                        </p>
                        <div class="d-flex">
                            <a class="btn btn-lg-square btn-primary me-2" href=""><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-lg-square btn-primary me-2" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-lg-square btn-primary me-2" href=""><i
                                    class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-lg-square btn-primary me-2" href=""><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="row g-4">
                <h1> Instructors </h1>
                @foreach ($instructors as $instructor)
                    <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="{{ asset($instructor->image) }}" alt="">
                                <div class="team-social">
                                    <a class="btn btn-square btn-light mx-1" href=""><i
                                            class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square btn-light mx-1" href=""><i
                                            class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square btn-light mx-1" href=""><i
                                            class="fab fa-linkedin-in"></i></a>
                                    <a class="btn btn-square btn-light mx-1" href=""><i
                                            class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                            <div class="text-center p-4">
                                <h5 class="mb-1">{{ $instructor->name }}</h5>
                                <span>{{ $instructor->email }}</span>
                                <br>
                                <span>{{ $instructor->role }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <br>
            <br>
            <br>
            <br>
            <div class="row g-4">
                <h1> Students </h1>
                @foreach ($students as $student)
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="{{ asset($student->image) }}" alt="">
                            </div>
                            <div class="text-center p-4">
                                <h5 class="mb-1">{{ $student->name }}</h5>
                                <span>{{ $student->email }}</span>
                                <br>
                                <span>{{ $student->role }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Team End -->
@endsection
