@extends('main')

@section('content')


<h1 class="text-center">{{ucfirst($entry)}}</h1>

@if(old('table'))
	<div class="alert alert-success">
		New entry added to {{old('table')}}!!
	</div>
@endif

@include('subviews.form-entry')

<table class="table table-bordered">
	<tr>
		<th>Date</th>
		<th>Value</th>
		<th>Category</th>
	</tr>
	<?php foreach ($list as $l): ?>
	<tr>
		<td>{{$l->date}}</td>
		<td>R$ {{$l->value}}</td>
		<td>{{$l->name}}</td>
		<td><a href="delete-entry?id={{$l->id}}&entry={{$entry}}" class="btn btn-danger">Delete</a></td>
	</tr>
	<?php endforeach ?>

</table>
<h2>Total: R$ {{$sum}}</h2>
@include('subviews.months')
@stop
