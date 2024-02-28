@extends('backend.layouts.admin')
@section('title',$viewData['title'])
@section('content')

<div class="card mb-4" >
    <div class="card-header">
        Create Products
    </div>
    <div class="card-body">
        @if ($errors->any())
            <ul class="alert alert-danger list-unstyled">
                @foreach ($errors->all() as $error)
                 <li>-{{$error}}</li>     
                @endforeach
            </ul>
        @endif

        <form action="{{route('admin.product.store')}}" enctype="multipart/form-data"  method="post">
         @csrf
         <div class="row">
            <div class="col">
                <div class="mb-3 row">
                    <label for="" class="col-lg-2 col-md-6 col-sm-12 col-form-label">
                        Name:
                    </label>
                    <div class="col-lg-10 col-md-6 col-sm-12">
                        <input type="text" name="name" id="" value="{{old('name')}}" class="form-control">
                    </div>
                </div>
               </div>
                
                 <div class="col">
                    <div class="mb-3 row">
                        <label for="" class="col-lg-2 col-md-6 col-sm-12 col-form-label">Price: </label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input type="number" name="price" id="" value="{{old('price')}}" class="form-control">
                        </div>
                    </div>
                 </div>

                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label for="" class="col-lg-2 col-md-6 col-sm-12 col-form-label">
                                Image
                            </label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="" class="form-label">Choose file</label>
                                    <input type="file" class="form-control" name="image"  value="{{old('image')}}"/>
                                </div>
                            </div>

                            <div class="col">
                                &nbsp;
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Description</label>
                    <textarea name="description" id="" rows="3" class="form-control">{{old('description')}}</textarea>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
         </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header">
        Manage Products
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope='col'>ID</th>
                    <th scope='col'>Name</th>
                    <th scope='col'>Edit</th>
                    <th scope='col'>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($viewData["products"] as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{strtoupper($product->name)}}</td>
                        <td>
                            {{-- <button class="btn btn-primary"> --}}
                                <a href="{{route('admin.product.edit',['id'=>$product->id])}}" class="btn btn-primary">
                                    <i class="bi-pencil"></i>
                                </a>
                            {{-- </button> --}}
                        </td>
                       
                        <td>
                            <form action="{{route('admin.product.delete',$product->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">
                                   <i class="bi-trash"></i>
                                </button>
                              </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$viewData['products']->links()}}
    </div>
</div>

@endsection  