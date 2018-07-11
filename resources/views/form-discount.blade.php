@extends('main')

@section('content')

<h1>New Discount</h1>

<form action="save-discount" method="post" class="form-control">
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}">
	<input type="text" name="name" placeholder="name">
	<input type="number" step="0.01" name="value" placeholder="percentage">
	<input type="number" name="month" placeholder="type the number of the month">
	<input type="number" name="year" placeholder="type the number of the year">
	<button type="submit" class="btn btn-primary">Send</button>
</form>
@stop