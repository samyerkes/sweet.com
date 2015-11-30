@extends('base')

@section('content')

	<h1>Create new page</h1>

	{!! Breadcrumbs::render('admin.pages.create') !!}

    {!! Form::open(array('action' => 'PagesController@store', 'id'=>'myform')) !!}

		<div class="form-group">
			{!! Form::label('name', 'Name'); !!}
			{!! Form::text('name', null, array('class' => 'form-control', 'placeholder'=>'Name')); !!}
		</div>

		<div class="form-group">
			{!! Form::label('slug', 'Slug'); !!}
			{!! Form::text('slug', null, array('class' => 'form-control', 'placeholder'=>'Slug')); !!}
		</div>

		<div class="form-group">
			{!! Form::label('Description', 'Content'); !!}
			@include('partials.quill-open')
			@include('partials.quill-close')
			{!! Form::hidden('Description', 'Content', array('id' => 'quill')) !!}
		</div>

		{!! Form::submit('Update', array('class'=>'btn btn-success')); !!}

	{!! Form::close() !!}

@endsection

@section('sidebar')
    @include('sidebar.admin')
@endsection
