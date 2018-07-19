@extends('main')

@section('content')

<h1>Limits</h1>
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
		<td>{{$l->month}}/{{$l->year}}</td>
	</tr>
	@endforeach
	
</table>

@stop