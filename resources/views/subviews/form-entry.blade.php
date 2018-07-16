<h2>New:</h2>
<form action="add" method="post" class="form-group">
<input type="hidden" name="_token" value="{{{ csrf_token() }}}">
<input type="hidden" name="table" value="{{$entry}}">
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
				<select name="category">
					<?php foreach($categories as $c): ?>
						<option value="{{$c->id}}">{{$c->name}}</option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td><button type="submit" class="btn btn-primary">Register</button></td>
			
		</tr>
	</table>
</form>