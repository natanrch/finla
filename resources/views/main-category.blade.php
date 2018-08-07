@extends('main')

@section('content')

@if(old('table'))
	<div class="alert alert-success">
		New category added to {{old('table')}}!!
	</div>
@endif

<h1>New Category</h1>
<form action="save-category" method="post" class="form-control">
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}">
	<select name="table">
		<option value="earnings">Earning</option>
		<option value="expenses">Expense</option>
	</select>
	<input type="text" name="name" placeholder="name">
	<button type="submit" class="btn btn-primary">Send</button>
</form>

<h1>Earning Categories</h1>
<table class="table">
	@foreach($allEarnings as $a)
		<tr>
			<td>{{$a->name}}</td>
			<td><a href="delete?id={{$a->id}}&category=earning">Delete</a></td>
		</tr>
	@endforeach
</table>

<h1>Expense Categories</h1>
<table class="table">
	@foreach($allExpenses as $a)
		<tr>
			<td>{{$a->name}}</td>
			<td><a href="delete?id={{$a->id}}&category=expense">Delete</a></td>
		</tr>
	@endforeach
</table>
@stop