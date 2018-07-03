@extends('main')

@section('content')
<table class="table">
	
@foreach($expenses as $key => $value)
<tr>
	<td>{{$key}}</td>
	<td>{{$value}}</td>
</tr>
@endforeach
</table>
@stop