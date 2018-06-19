@extends('main')

@section('content')
<h1>Register a Earning</h1>
<form action="#" method="post" class="form-group">
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
					<option value="#">Option 1</option>
					<option value="#">Option 2</option>
				</select>
			</td>
		</tr>
		<tr>
			<td><button type="submit" class="btn btn-primary">Register</button></td>
			
		</tr>
	</table>
</form>
@stop