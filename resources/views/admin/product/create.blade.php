@extends('admin.layout.admin')
@section('content')

  

   <div class="row">
      @if($errors->any())
    <div class="alert alert-danger">
      @foreach($errors->all() as $e)
        <li>{{$e}}</li>
      @endforeach
    </div>
  @endif
       
       <div class="col-md-6 col-md-offset-3">
            <h3>Add Products</h3><hr>
       {!! Form::open(['route'=>'product.store','method'=>'post','files'=>true])!!}
          
       <div class="form-group">
            {{Form::label('name','Name')}}
            {{Form::text('name',null,['class'=>'form-control'])}}

            {{Form::label('description','Description')}}
            {{Form::text('description',null,['class'=>'form-control'])}}

            {{Form::label('size','Size')}}
            {{Form::select('size',['small'=>'Small','medium'=>'Medium','large'=>'Large'],null,['placeholder'=>'select Size','class'=>'form-control'])}}

            {{Form::label('price','Price')}}
            {{Form::text('price',null,['class'=>'form-control'])}}

            {{Form::label('category','Category')}}
            {{Form::select('category_id',$categories,null,['class'=>'form-control','placeholder'=>'select Category'])}}

            {{Form::label('image','Image')}}
            {{Form::file('image',['class'=>'form-control'])}}<br>
            {{Form::submit('Insert',['class'=>'btn btn-default'])}}

          {!!Form::close()!!}
    </div>

    </div>
   </div>

@endsection