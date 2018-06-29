@extends('main')

@section('content')
<h1>{{$entry}}</h1>
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

<form class="form-control" action="list-month" method="post">
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}">
	<input type="hidden" name="entry" value="{{$entry}}" >
	<button type="submit" class="btn btn-primary" name="month" value="05">May</button>
	<button type="submit" class="btn btn-primary" name="month" value="06">June</button>
</form>

@stop