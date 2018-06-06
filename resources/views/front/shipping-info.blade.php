@extends('layout.main')

@section('content')
<div class="row">
    
        @if($errors->any())
        <div class="alert alert-danger">
          @foreach($errors->all() as $e)
            <li>{{$e}}</li>
          @endforeach
        </div>
      @endif
      
    <div class="small-6 small-centered column">
        <h3>Please Fill The Shipping Information</h3>
{!!Form::open(['route'=>'address.store','method'=>'post'])!!}

 <div class="form-group">
     {{Form::label('addressline','Address Line')}}
     {{Form::text('addressline',null,['class'=>'form-controller'])}}

     {{Form::label('city','City')}}
     {{Form::text('city',null,['class'=>'form-controller'])}}

     {{Form::label('state','State')}}
     {{Form::text('state',null,['class'=>'form-controller'])}}

     {{Form::label('zip','Zip')}}
     {{Form::text('zip',null,['class'=>'form-controller'])}}

     {{Form::label('country','Country')}}
     {{Form::text('country',null,['class'=>'form-controller'])}}

     {{Form::label('phonenumber','Phone number')}}
     {{Form::text('phonenumber',null,['class'=>'form-controller'])}}

     {{Form::submit('Proceed To Payment',['class'=>'button success'])}}
     {!!Form::close()!!}
 </div>
</div>
</div>
@endsection