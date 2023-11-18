@extends('layout.master')
@section('content')
    <!-- Road Map Start -->
    <div class="container-fluid container-team py-5">
        <div class="container pb-5">
            <h1> Road Map </h1>
            <img src="{{ $roadmap->image }}" alt="" width="100%">
        </div>
    </div>
    <!-- Road Map End -->
@endsection
