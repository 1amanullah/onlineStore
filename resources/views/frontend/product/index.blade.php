@extends('frontend.layouts.app')
@section('title',$viewData["title"])
@section('subtitle',$viewData["subtitle"])
@section('content')
<div class="row">
   
    @foreach ($viewData["products"] as $product)
     
       <div class="col-md-4 col-md-3 mb-2" >
          <div class="card" style="height: 100%">
            {{-- <img src="{{asset('/img/'.$product->getImage())}}" alt="" class="card-img-top img-card"> --}}
            
             <img src="{{asset('/storage/'.$product->image)}}" class="card-img-top"  alt="" srcset="">
            <div class="card-body text-center">
                <a href="{{route('products.show',['id'=>$product->id])}}"
                  class=" btn bg-primary text-white">{{strtoupper($product->name)}}
                </a>
            </div>
          </div>
       </div>  
 
    @endforeach
    {{-- {{$products->links()}} --}}

</div>

@endsection