<h3>How much can I expend?</h3>
	<table class="table">
		
	@foreach($diff as $key => $value)
		<?php
			if($value >= 0) {
				$alert = 'alert-success';
			} else {
				$alert = 'alert-danger';
			}
		?>
		<tr class="{{$alert}}">
			<th>{{$key}}</th>
			<td>{{$value}}</td>
		</tr>
	@endforeach
	</table>