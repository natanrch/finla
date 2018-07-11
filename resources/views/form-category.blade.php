@extends('main')

@section('content')

@if($table == 'expenses')
	<h1>New Expense Category</h1>
@else
	<h1>New Earning Category</h1>
@endif
<form action="save-category" method="post" class="form-control">
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}">
	<input type="hidden" name="table" value="{{$table}}">
	<input type="text" name="name" placeholder="name">
	<button type="submit" class="btn btn-primary">Send</button>
</form>
@stop