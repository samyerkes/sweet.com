@extends('base')

@section('content')

	<h1>Edit page</h1>

	{!! Breadcrumbs::render('admin.pages.edit', $page) !!}

	{!! Form::open([ 'method'  => 'put', 'route' => [ 'admin.pages.update', $page->id ], 'id'=>'myform' ]) !!}

	{!! Form::hidden('id', $page->id) !!}

		<div class="form-group">
			{!! Form::label('name', 'Name'); !!}
			{!! Form::text('name', $page->name, array('class' => 'form-control', 'placeholder'=>$page->name)); !!}
		</div>

		<div class="form-group">
			{!! Form::label('slug', 'Slug'); !!}
			{!! Form::text('slug', $page->slug, array('class' => 'form-control', 'placeholder'=>$page->slug)); !!}
		</div>

		<div class="form-group">
			{!! Form::label('order', 'Order'); !!}
			{!! Form::number('order', $page->order, array('class' => 'form-control', 'placeholder'=>$page->order)); !!}
		</div>

		<div class="form-group">
			{!! Form::label('Description', 'Content'); !!}
			@include('partials.quill-open')
				{!! $page->content !!}
			@include('partials.quill-close')
			{!! Form::hidden('Description', 'Description', array('id' => 'quill')) !!}
		</div>

		{!! Form::submit('Update', array('class'=>'btn btn-success')); !!}

	{!! Form::close() !!}

@endsection

@section('sidebar')
    @include('sidebar.admin')
@endsection
