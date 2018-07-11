@extends('main')

@section('content')

<h1>Details for month: {{$month}}</h1>

@include('subviews.earnings-list')
@include('subviews.expenses-list')
@include('subviews.total-expenses')
@include('subviews.limits')
@include('subviews.diff')
@include('subviews.months')

<?php var_dump($discounts);
var_dump($moneyLeft); ?>

@stop
