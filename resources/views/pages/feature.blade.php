@extends('layout.master')
@section('content')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .bg-primary {
            background-color: #ff7903 !important;
        }

        .btn-primary {
            color: #fff;
            background-color: #ff7903;
            border-color: #ff7903;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50px;
            font-weight: normal;
        }

        p {
            font-family: "Roboto", sans-serif;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #8a91ac;
        }

        .modal {
            margin-top: 150px !important
        }

        .slide-container .slide {
            width: 5vw !important;
            height: 5vw !important;
            margin-left: -3vw !important;
            margin-top: -3vw !important;
        }

        .content {
            display: flex;
            justify-content: space-between;
        }

        @media (max-width:1260px) {
            .content {
                flex-direction: column;
            }
        }
    </style>
    <div class="container ">
        <div class="content">
            <div class="slide-container" style="background-image: url('{{ asset($JoRover->mainImage) }}')">
                @foreach ($components as $component)
                    @if ($component->type == 'joRover')
                        <div class="slide" data-slide-no="{{ $component->id }}"
                            style="background-image: url('{{ asset($component->image) }}')" data-toggle="modal"
                            data-target="#imageModal{{ $component->id }}">
                        </div>
                    @endif

                    <!-- Modal for each component -->
                    <div class="modal fade" id="imageModal{{ $component->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="imageModalLabel" aria-hidden="true" style="margin-top:50px !important">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <img src="{{ asset($component->image) }}" class="img-fluid" alt="Popup Image">
                                </div>
                                <h3 class="mx-4">{{ $component->name }}</h3 class="mx-2">
                                <p class="mx-4">{{ $component->description }}</p class="mx-2">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                        style="color: white">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div style="margin: 0 50px"></div>
            <div class="slide-container" style="background-image: url('{{ asset($Remote->mainImage) }}')">
                @foreach ($components as $component)
                    @if ($component->type == 'remote')
                        <div class="slide" data-slide-no="{{ $component->id }}"
                            style="background-image: url('{{ asset($component->image) }}')" data-toggle="modal"
                            data-target="#imageModal{{ $component->id }}">
                        </div>
                    @endif

                    <!-- Modal for each component -->
                    <div class="modal fade" id="imageModal{{ $component->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="imageModalLabel" aria-hidden="true" style="margin-top:50px !important">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <img src="{{ asset($component->image) }}" class="img-fluid" alt="Popup Image">
                                </div>
                                <h3 class="mx-4">{{ $component->name }}</h3 class="mx-2">
                                <p class="mx-4">{{ $component->description }}</p class="mx-2">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                        style="color: white">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>



    <div class="button-wrap">
        <button type="button" class="btn btn-prev" style="display: none">prev</button>
        <button type="button" class="btn btn-next" style="display: none">next</button>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    $('#buttons').click(function() {
        $('.pop-up').addClass('open');
    });

    $('.pop-up .close').click(function() {
        $('.pop-up').removeClass('open');
    });
    // <!-- Add this in the head section of your HTML file -->
</script>
