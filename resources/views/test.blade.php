@extends('main')

@section('content')
<h1>Welcome to Finla!</h1>
<table class="table">
	<tr>
		<th>Category</th>
		<th>Limit</th>
	</tr>
</table>

<?php var_dump($currentLimit) ?>
<br>
<?php var_dump($categories) ?>

@stop