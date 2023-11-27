@extends("layout.master")
@section("content")

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<div class="slide-container" style="background-image: url('{{ asset($Feature[0]->mainImage) }}')">
    @foreach ($components as $component)
        <div class="slide" data-slide-no="{{ $component->id }}" style="background-image: url('{{ asset($component->image) }}')"  data-toggle="modal" data-target="#imageModal{{ $component->id }}">
         
        </div>

        <!-- Modal for each component -->
        <div class="modal fade" id="imageModal{{ $component->id }}" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <img src="{{ asset($component->image) }}" class="img-fluid" alt="Popup Image">
                    </div>
                    <p>{{ ($component->description) }}</p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
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

$('#buttons').click(function(){
  $('.pop-up').addClass('open');
});

$('.pop-up .close').click(function(){
  $('.pop-up').removeClass('open');
});
    // <!-- Add this in the head section of your HTML file -->
    
</script>

