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
		<td>R$ {{$l->value}} R$</td>
		<td>{{$l->name}}</td>
	</tr>
	<?php endforeach ?>

</table>
<h2>Total: R$ {{$sumExpenses}} R$</h2>