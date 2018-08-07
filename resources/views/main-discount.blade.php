<?php use finla\DateFormat; ?>
@extends('main')

@section('content')

<h1 class="text-center">Discounts</h1>

<h3>New Discount</h3>

<form action="save-discount" method="post" class="form-control">
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}">
	<input type="text" name="name" placeholder="name">
	<input type="number" step="0.01" name="value" placeholder="percentage">
	<input type="number" name="month" placeholder="number of the month">
	<input type="number" name="year" placeholder="number of the year">
	<button type="submit" class="btn btn-primary">Send</button>
</form>

<table class="table">
			
	@if($list != [] or $list == 0)
		<tr>
			<th>Goal</th>
			<th>Percentage</th>
			<th>Date set</th>
		</tr>
		@foreach($list as $l)
			<tr>
				<td>{{$l->name}}</td>
				<td>{{$l->value}} %</td>
				<td>{{DateFormat::monthName($l->month)}}/{{$l->year}}</td>
				<td><a href="delete-discount?id={{$l->id}}" class="btn btn-danger">Delete</a></td>
			</tr>
		@endforeach
	@else
		<tr><th><h4>No discounts established</h4></th></tr>
	@endif
</table>


@stop