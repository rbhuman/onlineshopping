@extends('admin.layout.admin')
@section('content')
<h3>Products</h3>
 <table class="table table-hover">
     
    <tr>
                    <th>Name</th>
                    <th>price</th>
                    <th>description</th>
                    <th>Size</th>
                    <th>Category</th>
                    <th>Picture</th>
                    <th>Action</th>
    </tr>
           
  
        @forelse($products as $product)
              <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->size}}</td>
                <td>{{$product->category->name}}</td>
               
                
              <td><img src="{{Storage::url($product->image)}}" style="height:75px; width:75px;"/></td>
               
                <td> 
                    <a href="{{route('product.edit',$product->id)}}" class="btn btn-primary btn-sm"  style="float:left">Edit</a>
                    
                    <form action="{{route('product.destroy',$product->id)}}" method="post">
                      {{csrf_field()}}
                      {{method_field('DELETE')}}
                    <button type="submit" class="btn btn-danger btn-sm" value="DELETE" onclick="return confirm('Are you sure to delete?')">Delete</button>
                     </form>
                </td>
             </tr>
                @empty
                <h3>No Products</h3>
           
               @endforelse
    </div>
    @endsection