<table class="table">
	<tr><th><h3>Limits</h3></th></tr>		
	@if($limits != [] or $limits == 0)
		<tr>
		@foreach($limits as $l)
			<tH>{{$l->name}}: </tH>
			<td>R$ {{$l->value}}</td>
		@endforeach
		</tr>
	@else
		<tr><th><h4>No limits established</h4></th></tr>
	@endif
</table>