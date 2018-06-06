@extends('layout.main')

@section('content')
<div class="row">
  <div class="col-12 col-md-8">
 <h3><center>Cart items</center></h3>
<hr>
 <table class="table table-bordered table-hover">
     <thead>
         <tr>
             <th>Name</th>
             <th>price</th>
             <th>Quantity</th>
             <th>Size</th>
             <th>Action</th>
         </tr>
     </thead>
     <tbody>
            @foreach($cartItems as $cartItem)
         <tr>
             <td>{{$cartItem->name}}</td>
             <td>{{$cartItem->price}}</td>
             <td width=150px >
                {!!Form::open(['route'=>['cart.update',$cartItem->rowId],'method'=>'put','class'=>'form-control'])!!}
                    <input type="text"  name="qty" value="{{$cartItem->qty}}">
             </td>
             <td>
                   <div>{!! Form::select('size',['small'=>'small','medium'=>'medium','large'=>'large'],$cartItem->options->has('size')?$cartItem->options->size:'')!!}</div>
             </td>
                
            </td>
            <td>
            <input style="float:left" type="submit" class="button success small" value="ok">
            {!!Form::close()!!}
             
             <form action="{{route('order',$cartItem->rowId)}}"method="POST">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <input class="button small" type="submit" value="DELETE">
             </form>
             </td>
         </tr>
         @endforeach
         <tr>
             <td></td>
             <td>Tax:{{Cart::tax()}}<br>
                 Sub-Total: {{Cart::subtotal()}}<br>
                 Grand Total:{{Cart::total()}}

            </td>
         <td>Total Items:{{Cart::count()}}</td>
         <td></td>
         <td></td>
         </tr>
     </tbody>
 </table>

<a href="{{url('/checkout')}}" class="button">Checkout</a>
</div>
</div>
@endsection
