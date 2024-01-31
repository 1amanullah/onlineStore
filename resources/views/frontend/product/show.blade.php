@extends('frontend.layouts.app')
@section('title',$viewData["title"])
@section('subtitle',$viewData["subtitle"])
@section('content')
<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-4">
            {{-- <img src="{{asset('/img/'.$viewData["product"]->getImage())}}" class="img-fluid rounded-start"> --}}
            <img src="{{asset('/storage/'.$viewData["product"]->image)}}" class="img-fluid rounded-start" alt="" srcset="">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card -title">
                  {{ $viewData["product"]->name}}(${{$viewData["product"]->price}})
                </h5>
                <p class="card-text">{{$viewData["product"]->description}}</p>
                {{-- <p class="cart-text"><small class="card-muted">Add to Cart</small></p> --}}
                <p class="card-text">
                    <form action="{{route('cart.add',['id'=>$viewData['product']->id])}}" method="post">
                     <div class="row">
                       @csrf
                       <div class="col-auto">
                        <div class="input-group col-auto">
                            <div class="input-group-text">Quantity</div>
                            <input type="number" min="1" max="10" class="form-control quantity-input" value="1" name="quantity">
                        </div>
                       </div>
                       <div class="col-auto">
                         <button style="background-color: #0096c7 !important;" type="submit" class="btn bg-primary text-white">Add to cart</button>
                       </div>
                     </div>
                    </form>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection