@extends('main')

@section('content')
<h1>Earnings</h1>
<table class="table">
	<tr>
		<th>Date</th>
		<th>Value</th>
		<th>Type</th>
	</tr>
	<?php foreach ($list as $l): ?>
	<tr>
		<th>{{$l->date}}</th>
		<th>{{$l->value}}</th>
		<th>{{$l->type}}</th>
	</tr>
	<?php endforeach ?>

</table>
@stop