@extends('layout.main')

@section('content')
 
<section class="hero text-center">
    <br/>
    <br/>
    <br/>
    <br/>
    <h2 >
        <strong>
            Hey! Welcome to ShopsNepal.com
        </strong>
    </h2>
    <br>
<a href={{url('/products')}}><button class="button large">Check out Our Products</button></a>
</section>
<br/>
<div class="subheader text-center">
     <h2>
    Our Latest products
</h2>
</div>

<!-- Latest SHirts -->
<div class="row">
    @forelse($products->chunk(4) as $chunk)
    @foreach($chunk as $product)
    <div class="small-3 columns">
        <div class="item-wrapper">
            <div class="img-wrapper">
                <a  href="{{route('cart.edit',$product->id)}}"class="button expanded add-to-cart">
                    Add to Cart
                </a>
                <a href="#">
                    <img src=" {{Storage::url($product->image)}}" style="height:200px; width:300px;"/>
                </a>
            </div>
            <a href="{{route('product')}}">
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
   @endforeach
   @empty
   <h3>No Product </h3>
  
  
   @endforelse

</div>
<!-- Footer -->
<br>

@endsection