@extends('main')

@section('content')

@if($section == 'form')
	<h1>Do you want to register an earning or expense?</h1>
@elseif($section == 'list')
	<h1>Which list you want to see?</h1>
@else
	<h1>Which category you want to create?</h1>
@endif

<form class="form-control" action="{{$section}}" method="post">
<input type="hidden" name="_token" value="{{{ csrf_token() }}}">
	<button type="submit" class="btn btn-primary" name="entry" value="earnings">Earning</button>
	<button type="submit" class="btn btn-primary" name="entry" value="expenses">Expense</button>
</form>
@stop