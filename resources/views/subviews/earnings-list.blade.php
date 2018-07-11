<h2>Earnings</h2>
<table class="table">
	<tr>
		<th>Date</th>
		<th>Value</th>
		<th>Category</th>
	</tr>
	<?php foreach ($listEarnings as $l): ?>
	<tr>
		<td>{{$l->date}}</td>
		<td>R$ {{$l->value}}</td>
		<td>{{$l->name}}</td>
	</tr>
	<?php endforeach ?>

</table>
<h2>Total: R$ {{$sumEarnings}}</h2>