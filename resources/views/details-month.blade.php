@extends('main')

@section('content')

<h1>Details for month: {{$month}}</h1>

@include('subviews.earnings-list')
@include('subviews.expenses-list')
@include('subviews.total-expenses')
@include('subviews.limits')
@include('subviews.diff')


<form class="form-control" action="list-month" method="post">
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}">
	<!--<input type="hidden" name="entry" value="entry" >-->
	<button type="submit" class="btn btn-primary" name="month" value="01">January</button>
	<button type="submit" class="btn btn-primary" name="month" value="02">February</button>
	<button type="submit" class="btn btn-primary" name="month" value="03">March</button>
	<button type="submit" class="btn btn-primary" name="month" value="04">April</button>
	<button type="submit" class="btn btn-primary" name="month" value="05">May</button>
	<button type="submit" class="btn btn-primary" name="month" value="06">June</button>
	<button type="submit" class="btn btn-primary" name="month" value="07">July</button>
	<button type="submit" class="btn btn-primary" name="month" value="08">August</button>
	<button type="submit" class="btn btn-primary" name="month" value="09">September</button>
	<button type="submit" class="btn btn-primary" name="month" value="10">October</button>
	<button type="submit" class="btn btn-primary" name="month" value="11">November</button>
	<button type="submit" class="btn btn-primary" name="month" value="12">December</button>
</form>
@stop
