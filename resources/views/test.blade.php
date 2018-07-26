@extends('main')

@section('content')

<form action="new-month-limits" method="post">
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}">
	<table class="table">
	@foreach($categories as $key => $value)
			<tr>
				<td><label for="{{$key}}" class="form-control">{{$value}}</label></td>
				<td><input class="form-control" type="number" name="{{$key}}" value="{{$currentLimits[$key][0]->value}}" required></td>
			</tr>
		
	@endforeach
	</table>
	<button class="btn btn-primary" type="input">Send</button>

	
	
</form>
@stop