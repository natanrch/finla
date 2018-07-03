<h3>Total expenses by categories</h3>
	<table class="table">
		
	@foreach($totalExpenses as $key => $value)
		<tr>
			<td>{{$key}}</td>
			<td>{{$value}}</td>
		</tr>
	@endforeach
	</table>