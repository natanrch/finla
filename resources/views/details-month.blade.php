@extends('main')

@section('content')

<h1>Details for month: {{$month}}</h1>

<h2>Expenses</h2>
<table class="table">
	<tr>
		<th>Date</th>
		<th>Value</th>
		<th>Category</th>
	</tr>
	<?php foreach ($listExpenses as $l): ?>
	<tr>
		<td>{{$l->date}}</td>
		<td>{{$l->value}}</td>
		<td>{{$l->name}}</td>
	</tr>
	<?php endforeach ?>

</table>
<h2>Total: {{$sumExpenses}}</h2>


@include('subviews.total-expenses')
@include('subviews.limits')
@include('subviews.diff')


<form class="form-control" action="list-month" method="post">
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}">
	<!--<input type="hidden" name="entry" value="entry" >-->
	<button type="submit" class="btn btn-primary" name="month" value="01">January</button>
	<button type="submit" class="btn btn-primary" name="month" value="02">February</button>
	<button type="submit" class="btn btn-primary" name="month" value="03">March</button>
	<button type="submit" class="btn btn-primary" name="month" value="04">April</button>
	<button type="submit" class="btn btn-primary" name="month" value="05">May</button>
	<button type="submit" class="btn btn-primary" name="month" value="06">June</button>
	<button type="submit" class="btn btn-primary" name="month" value="07">July</button>
	<button type="submit" class="btn btn-primary" name="month" value="08">August</button>
	<button type="submit" class="btn btn-primary" name="month" value="09">September</button>
	<button type="submit" class="btn btn-primary" name="month" value="10">October</button>
	<button type="submit" class="btn btn-primary" name="month" value="11">November</button>
	<button type="submit" class="btn btn-primary" name="month" value="12">December</button>
</form>
@stop
