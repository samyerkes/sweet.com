@extends('base')

@section('styles')
  <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('content')

	{!! Breadcrumbs::render('admin.products.index') !!}

    <div class="panel panel-default">
		<div class="panel-heading">
			All products <a href="{{ route('admin.products.create') }}" class="btn btn-success pull-right btn-xs"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> New</a>
		</div>
	    <table class="table table-striped">
	    	<thead>
					<th></th>
	    		<th>ID</th>
		    	<th>Name</th>
		    	<th>Category</th>
		    	<th>Price</th>
		    	<th>Quantity</th>
	    	</thead>
				<tbody class="sortable" data-entityname="products">
	    	@foreach ($products as $p)
	    		<tr data-itemId="{{{ $p->id }}}">
						<td class="sortable-handle"><span class="glyphicon glyphicon-sort" aria-hidden="true"></span></td>
	    			<td>
							<a href="{{ route('admin.products.show', array('id' => $p->id)) }}">{{ $p->id }}</a>
						</td>
		    		<td>
							{{ $p->name }}
							@if ($p->special == 1)
								<span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
							@endif
						</td>
		    		<td>{{ $p->category->name }}</td>
		    		<td>${{ $p->price }}</td>
		    		<td>{{ $p->inventory }}</td>
		    	</tr>
	    	@endforeach
	    </table>
	</div>

@endsection

@section('scripts')
  <script src='//code.jquery.com/ui/1.10.4/jquery-ui.js'></script>
  <script src="../../js/sort.js"></script>
@endsection

@section('sidebar')
    @include('sidebar.admin')
@endsection
