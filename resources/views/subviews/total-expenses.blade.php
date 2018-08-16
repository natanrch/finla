<h3>Total expenses by categories</h3>
	<table class="table table-striped table-bordered">
		
	@foreach($totalExpenses as $key => $value)
		<tr>
			<th>{{$key}}</th>
			<td>R$ {{$value}}</td>
		</tr>
	@endforeach
	</table>