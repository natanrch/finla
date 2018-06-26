@extends('main')

@section('content')
<h1>Do you want to register an earning or expense?</h1>
<form class="form-control" action="add-entry" method="post">
<input type="hidden" name="_token" value="{{{ csrf_token() }}}">
	<button type="submit" class="btn btn-primary" name="entry" value="earnings">Earning</button>
	<button type="submit" class="btn btn-primary" name="entry" value="expenses">Expense</button>
</form>