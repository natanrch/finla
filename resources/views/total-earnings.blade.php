@extends('main')

@section('content')
<h1>Earnings</h1>
<table class="table">
	<tr>
		<th>Date</th>
		<th>Value</th>
		<th>Category</th>
	</tr>
	<?php foreach ($list as $l): ?>
	<tr>
		<td>{{$l->date}}</td>
		<td>{{$l->value}}</td>
		<td>{{$l->name}}</td>
	</tr>
	<?php endforeach ?>

</table>
@stop