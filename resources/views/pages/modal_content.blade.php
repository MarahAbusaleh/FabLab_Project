<div class="modal fade" id="imageModal{{ $component->id }}" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <img src="{{ asset($component->image) }}" class="img-fluid" alt="Popup Image">
            </div>
            <h3 class="mx-4">{{ $component->name }}</h3>
            <p class="mx-4">{{ $component->description }}</p>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="color: white">Close</button>
            </div>
        </div>
    </div>
</div>
