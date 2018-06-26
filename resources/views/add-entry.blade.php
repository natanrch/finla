@extends('main')

@section('content')

@if($table == 'earnings')
<h1>Register an Earning</h1>
@else
<h1>Register an Expense</h1>
@endif

<form action="add" method="post" class="form-group">
<input type="hidden" name="_token" value="{{{ csrf_token() }}}">
<input type="hidden" name="table" value="{{$table}}">
	<table>
		<tr>
			<th>Date:</th>
			<td><input type="date" name="date"></td>
		</tr>
		<tr>
			<th>Value:</th>
			<td><input type="number" step="0.01" name="value"></td>
		</tr>
		<tr>
			<th>Type</th>
			<td>
				<select name="type">
					<option value="option1">Option 1</option>
					<option value="option2">Option 2</option>
				</select>
			</td>
		</tr>
		<tr>
			<td><button type="submit" class="btn btn-primary">Register</button></td>
			
		</tr>
	</table>
</form>
@stop