@extends('main')

@section('content')

<table class="table">
	<tr><th><h3>Limits</h3></th></tr>		
	@if($list != [] or $list == 0)
		<tr>
			<th>Goal</th>
			<th>Percentage</th>
			<th>Date set</th>
		</tr>
		<tr>
		@foreach($list as $l)
			<td>{{$l->name}}</td>
			<td>{{$l->value}} %</td>
			<td>{{$l->month}}/{{$l->year}}</td>
		@endforeach
		</tr>
	@else
		<tr><th><h4>No discounts established</h4></th></tr>
	@endif
</table>

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