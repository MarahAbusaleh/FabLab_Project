<div class="container">
        <div style="display: flex; justify-content: space-between;">
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
                        aria-labelledby="imageModalLabel" aria-hidden="true">
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
                        aria-labelledby="imageModalLabel" aria-hidden="true">
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
    