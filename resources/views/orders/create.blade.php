@extends('base')

@section('content')
	
	<h1>Create customer order</h1>

    {!! Form::open(array('action' => 'OrderController@employeeStore')) !!}

		<div class="form-group">
	        {!! Form::label('user', 'Customer'); !!}
	        <select name="user" class="form-control">
	        	<option value="1">-- Guest --</option>
	            @foreach ($users as $u)
	                <option value="{{ $u->id }}">{{ $u->lname }}, {{ $u->fname}}</option>
	            @endforeach
	        </select>
	    </div>

		<div class="panel panel-default">
			<div class="panel-heading">Order products</div>
			<div class="panel-body">
				<style>.form-inline {margin: 10px 0; width:100% !important;}</style>
				@foreach ($products as $p)
					<div class="form-inline">
					  <div class="form-group">
					  	<label for="quantity{{ $p->id }}" class="sr-only">{{ $p->name }}</label>
					    <div class="input-group">
					      <div class="input-group-addon"><a href="{{ route('product.item', array('id' => $p->id)) }}">{{ $p->name }}</a></div>
					      <input type="text" name="quantity{{$p->id}}" class="form-control" placeholder="${{$p->price}}">
					    </div>
					  </div>
					</div>
		    	@endforeach
		    </div>
		</div>

		<div class="form-group">
    		{!! Form::label('payment', 'Credit card number'); !!}
    		{!! Form::number('payment', null, array('class' => 'form-control', 'placeholder'=>'XXXX-XXXX-XXXX-XXXX')); !!}
		</div>
    	
		{!! Form::submit('Submit order', array('class'=>'btn btn-success pull-right')); !!}

	{!! Form::close() !!}
		
@endsection

@section('sidebar')
    @include('sidebar.admin')
@endsection