<?php use finla\DateFormat; ?>
@extends('main')

@section('content')

<h1 class="text-center">Limits</h1>

<h3>New Limit</h3>

<form action="save-limit" method="post" class="form-control">
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}">
	<label for="category">Category: </label>
	<select name="category">
		@foreach($categories as $c)
			<option value="{{$c->id}}">{{$c->name}}</option>
		@endforeach
	</select>
	<input type="number" step="0.01" name="value" placeholder="value">
	<input type="number" name="month" placeholder="number of the month">
	<input type="number" name="year" placeholder="number of the year">
	<button type="submit" class="btn btn-primary">Send</button>
</form>
<table class="table">
	<tr>
		<th>Name</th>
		<th>Value</th>
		<th>Date set</th>
	</tr>
	@foreach($list as $l)
	<tr>
		<td>{{$l->name}}</td>
		<td>R$ {{$l->value}}</td>
		<td>{{DateFormat::monthName($l->month)}}/{{$l->year}}</td>
		<td><a href="delete-limit?id={{$l->id}}" class="btn btn-danger">Delete</a></td>
	</tr>
	@endforeach
	
</table>


@stop