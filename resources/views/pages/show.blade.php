@extends('base')

@section('content')

  <h1>
    {{ $page->name }}

    @if (Auth::check())
      @if ($currentUser->role->id == 1)
        <a href="{{ route('admin.pages.edit', array('id' => $page->id)) }}" class="btn btn-warning pull-right btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit page</a>
      @endif
    @endif

  </h1>
  {!! $page->content !!}

@endsection

@section('sidebar')
    @include('sidebar.special')
@endsection
