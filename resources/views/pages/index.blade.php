@extends('layout.master')
@section('content')
    <!-- Carousel Start -->


    <div class="container-fluid header-carousel px-0 mb-5">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($slider as $key => $slide)
                    @if ($slide->mediaType === 'video')
                        <!-- Video Slide -->
                        <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                            <div class="video-container position-relative">
                                <video src="{{ asset($slide->media) }}" autoplay muted loop playsinline
                                    class="w-100 h-100"></video>
                                <div class="carousel-caption">
                                    <div class="container">
                                        <div class="row justify-content-start">
                                            <div class="col-lg-7 text-start" style="margin-left: 100px">
                                                <h1 class="display-1 text-white animated slideInRight mb-3">
                                                    {{ $slide->header }}</h1>
                                                <p class="mb-5 animated slideInRight">{{ $slide->text }}</p>
                                                <a href=""
                                                    class="btn btn-primary py-3 px-5 animated slideInRight">Explore More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif ($slide->mediaType === 'image')
                        <!-- Image Slide -->
                        <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                            <img class="w-100" src="{{ asset($slide->media) }}" alt="Image">
                            <div class="carousel-caption">
                                <div class="container">
                                    <div class="row justify-content-start">
                                        <div class="col-lg-7 text-start" style="margin-left: 100px">
                                            <h1 class="display-1 text-white animated slideInRight mb-3">{{ $slide->header }}
                                            </h1>
                                            <p class="mb-5 animated slideInRight">{{ $slide->text }}</p>
                                            <a href=""
                                                class="btn btn-primary py-3 px-5 animated slideInRight">Explore More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>




    </div>
    <!-- Carousel End -->

    <div class="container-fluid container-team py-5">
        <div class="container pb-5">
            <h1> About JoRover </h1>
            <br>
            <div class="row">
                <div class="col-lg-6">
                    <img src="{{ asset($HomeAbout->image) }}" width="100%" />
                </div>
                <div class="col-lg-6">
                    <h1 class="display-6 mb-4">{{ $HomeAbout->header }}</h1>
                    <p class="mb-4">
                        {{ $HomeContent->description }}
                    </p>
                    <div style="width: 30%;margin:auto;display:flex;justify-content:center"> <a href={{ route('jorover') }}
                            class="btn btn-primary py-3 px-5 animated slideInRight">Explore More</a></div>
                </div>
            </div>
        </div>
    </div>

    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="row g-0">
                        <div class="col-6">
                            <img class="img-fluid" src="{{ asset($HomeContent->image1) }}">
                        </div>
                        <div class="col-6">
                            <img class="img-fluid" src="{{ asset($HomeContent->image2) }}">
                        </div>
                        <div class="col-6">
                            <img class="img-fluid" src="{{ asset($HomeContent->image3) }}">
                        </div>
                        <div class="col-6">
                            <div
                                class="bg-primary w-100 h-100 mt-n5 ms-n5 d-flex flex-column align-items-center justify-content-center">
                                <div class="icon-box-light">
                                    <i class="bi bi-award text-dark"></i>
                                </div>
                                <h1 class="display-1 text-white mb-0" data-toggle="counter-up">{{ $events->count() }}
                                </h1>
                                <small class="fs-5 text-white">Events</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="display-6 mb-4">{{ $HomeContent->header }}</h1>
                    <p class="mb-4">
                        {{ $HomeContent->description }}
                    </p>
                    <div class="row g-4 g-sm-5 justify-content-center">
                        <div class="col-sm-6">
                            <div class="about-fact btn-square flex-column rounded-circle bg-primary ms-sm-auto">
                                <p class="text-white mb-0">Instructors</p>
                                <h1 class="text-white mb-0" data-toggle="counter-up">{{ $instructors->count() }}</h1>
                            </div>
                        </div>
                        <div class="col-sm-6 text-start">
                            <div class="about-fact btn-square flex-column rounded-circle bg-secondary me-sm-auto">
                                <p class="text-white mb-0">Students</p>
                                <h1 class="text-white mb-0" data-toggle="counter-up">{{ $students->count() }}</h1>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="about-fact mt-n130 btn-square flex-column rounded-circle bg-dark mx-sm-auto">
                                <p class="text-white mb-0">Team</p>
                                <h1 class="text-white mb-0" data-toggle="counter-up">{{ $instructors->count() + $students->count() }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Features Start -->
    <div class="container-fluid container-team py-5">
        <div class="container pb-5">
            <h1> Events </h1>
            <br>
            <div class="row">
                @foreach ($events->reverse()->take(3) as $event)
                    <div class="col-lg-4 col-md-6  ftco-animate">
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
            <div style="width: 30%;margin:auto;display:flex;justify-content:center"> <a href={{ route('events') }}
                    class="btn btn-primary py-3 px-5 animated slideInRight">Explore More</a></div>
        </div>
    </div>
    <!-- Features End -->








    <!-- Service Start -->
    {{-- <div class="container-fluid container-service py-5">
    <div class="container pt-5">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="display-6 mb-3">Reliable & High-Quality Laboratory Service</h1>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tellus augue, iaculis
                id elit eget, ultrices pulvinar tortor.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item">
                    <div class="icon-box-primary mb-4">
                        <i class="bi bi-heart-pulse text-dark"></i>
                    </div>
                    <h5 class="mb-3">Pathology Testing</h4>
                        <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tellus
                            augue.</p>
                        <a class="btn btn-light px-3" href="">Read More<i
                                class="bi bi-chevron-double-right ms-1"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item">
                    <div class="icon-box-primary mb-4">
                        <i class="bi bi-lungs text-dark"></i>
                    </div>
                    <h5 class="mb-3">Microbiology Tests</h4>
                        <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tellus
                            augue.</p>
                        <a class="btn btn-light px-3" href="">Read More<i
                                class="bi bi-chevron-double-right ms-1"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item">
                    <div class="icon-box-primary mb-4">
                        <i class="bi bi-virus text-dark"></i>
                    </div>
                    <h5 class="mb-3">Biochemistry Tests</h4>
                        <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tellus
                            augue.</p>
                        <a class="btn btn-light px-3" href="">Read More<i
                                class="bi bi-chevron-double-right ms-1"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="service-item">
                    <div class="icon-box-primary mb-4">
                        <i class="bi bi-capsule-pill text-dark"></i>
                    </div>
                    <h5 class="mb-3">Histopatology Tests</h4>
                        <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tellus
                            augue.</p>
                        <a class="btn btn-light px-3" href="">Read More<i
                                class="bi bi-chevron-double-right ms-1"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item">
                    <div class="icon-box-primary mb-4">
                        <i class="bi bi-capsule text-dark"></i>
                    </div>
                    <h5 class="mb-3">Urine Tests</h4>
                        <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tellus
                            augue.</p>
                        <a class="btn btn-light px-3" href="">Read More<i
                                class="bi bi-chevron-double-right ms-1"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item">
                    <div class="icon-box-primary mb-4">
                        <i class="bi bi-prescription2 text-dark"></i>
                    </div>
                    <h5 class="mb-3">Blood Tests</h4>
                        <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tellus
                            augue.</p>
                        <a class="btn btn-light px-3" href="">Read More<i
                                class="bi bi-chevron-double-right ms-1"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item">
                    <div class="icon-box-primary mb-4">
                        <i class="bi bi-clipboard2-pulse text-dark"></i>
                    </div>
                    <h5 class="mb-3">Fever Tests</h4>
                        <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tellus
                            augue.</p>
                        <a class="btn btn-light px-3" href="">Read More<i
                                class="bi bi-chevron-double-right ms-1"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="service-item">
                    <div class="icon-box-primary mb-4">
                        <i class="bi bi-file-medical text-dark"></i>
                    </div>
                    <h5 class="mb-3">Allergy Tests</h4>
                        <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tellus
                            augue.</p>
                        <a class="btn btn-light px-3" href="">Read More<i
                                class="bi bi-chevron-double-right ms-1"></i></a>
                </div>
            </div>
        </div>
    </div>
</div> --}}
    <!-- Service End -->




    <!-- Team Start -->
    {{-- <div class="container-fluid container-team py-5">
    <div class="container pb-5">
        <div class="row g-5 align-items-center mb-5">
            <div class="col-md-6 wow fadeIn" data-wow-delay="0.3s">
                <img class="img-fluid w-100" src="img/team-1.jpg" alt="">
            </div>
            <div class="col-md-6 wow fadeIn" data-wow-delay="0.5s">
                <h1 class="display-6 mb-3">Dr. John Martin</h1>
                <p class="mb-1">CEO & Founder</p>
                <p class="mb-5">Labsky, New York, USA</p>
                <h3 class="mb-3">Biography</h3>
                <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tellus augue,
                    iaculis id elit eget, ultrices pulvinar tortor. Quisque vel lorem porttitor, malesuada arcu quis,
                    fringilla risus. Pellentesque eu consequat augue.</p>
                <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tellus augue,
                    iaculis id elit eget, ultrices pulvinar tortor. Quisque vel lorem porttitor, malesuada arcu quis,
                    fringilla risus. Pellentesque eu consequat augue.</p>
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
        <div class="row g-4">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/team-2.jpg" alt="">
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
                        <h5 class="mb-1">Alex Robin</h5>
                        <span>Lab Assistant</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/team-3.jpg" alt="">
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
                        <h5 class="mb-1">Andrew Bon</h5>
                        <span>Lab Assistant</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="team-item">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/team-4.jpg" alt="">
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
                        <h5 class="mb-1">Martin Tompson</h5>
                        <span>Lab Assistant</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="team-item">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/team-5.jpg" alt="">
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
                        <h5 class="mb-1">Clarabelle Samber</h5>
                        <span>Lab Assistant</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
    <!-- Team End -->
@endsection
