@extends('main')

@section('content')
<h1>New Expense Category</h1>
<form action="save" method="post" class="form-control">
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}">
	<input type="text" name="name" placeholder="name">
	<button type="submit" class="btn btn-primary">Send</button>
</form>
@stop