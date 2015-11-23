@extends('base')

@section('styles')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.9.4/chartist.min.css" />
@endsection

@section('content')
	
	{!! Breadcrumbs::render('admin.supplier.show', $supplier) !!}

	<div class="panel panel-default">
		<div class="panel-heading">
			{{ $supplier->name }} 
			<a href="{{ route('admin.supplier.edit', array('id' => $supplier->id)) }}" class="btn btn-warning pull-right btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit </a>
		</div>
		<div class="panel-body">
			<p>
				{{ $supplier->email }}<br />
				{{ $supplier->phone }}<br />
				{{ $supplier->address }}<br />
			</p>			
	    </div>
	</div>
	
@endsection

@section('sidebar')
    @include('sidebar.admin')
@endsection