@extends('frontend.layouts.app')
@section('title',$viewData["title"])
@section('content')
<div class="row">
    <div class="col-md-6 col-lg-4 mb-2">
        <img src="route('{{asset('img/game.png')}}')" class="img-fluid rounded" alt="">
    </div>

    <div class="col-md-6 col-lg-4 mb-2">
        <img src="route('{{asset('img/safe.png')}}')" class="img-fluid rounded" alt="">
    </div>

    <div class="col-md-6 col-lg-4 mb-2">
        <img src="route('{{asset('img/submarine.png')}}')" class="img-fluid rounded" alt="">
    </div>
</div>

@endsection