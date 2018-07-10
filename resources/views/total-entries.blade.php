@extends('main')

@section('content')

@if(isset($entry))
	<h1>{{ucfirst($entry)}}</h1>
@else
	<h1>Details for month: {{$month}}</h1>
@endif


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
<h2>Total: <?php echo($sum)?></h2>
@include('subviews.months')
@stop
