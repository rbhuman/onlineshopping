@extends('layout.main')
@Section('title','Products')
@section('content')
</div>
 <!-- products listing -->

<div class="row">
    @forelse($products as $product)
   <div class="small-3 columns">
       <div class="item-wrapper">
           <div class="img-wrapper">
               <a class="button expanded add-to-cart">
                    <a  href="{{route('cart.edit',$product->id)}}"class="button expanded add-to-cart">
                   Add to Cart
               </a>
               <a href="#">
                   <img src=" {{Storage::url($product->image)}}" style="height:200px; width:300px;"/>
               </a>
           </div>
           <a href="shirt.html">
               <h3>
                  {{$product->name}}
               </h3>
           </a>
           <h5>
               ${{$product->price}}
           </h5>
           <p>
               {{$product->description}}
           </p>
       </div>
   </div>
  @empty
  <h3>No Products</h3>
  @endforelse
   
</div>
</body>


@endsection