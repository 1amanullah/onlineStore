@extends('frontend.layouts.app')
@section('title',$viewData["title"])
@section('subtitle',$viewData["subtitle"])
@section('content')
<div class="row">
   
    @foreach ($viewData["products"] as $product)
     
       <div class="col-md-4 col-md-3 mb-2">
          <div class="card">
            {{-- <img src="{{asset('/img/'.$product->getImage())}}" alt="" class="card-img-top img-card"> --}}
            @foreach ($viewData["products"] as $product)

             <img src="{{asset('/storage/'.$product->getImage())}}" class="card-img-top" alt="" srcset="">
              
            @endforeach
            <div class="card-body text-center">
                <a href="{{route('products.show',['id'=>$product->getId()])}}"
                  class=" btn bg-primary text-white">{{$product->getName()}}
                </a>
            </div>
          </div>
       </div>  

    @endforeach
    
</div>

@endsection