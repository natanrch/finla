@extends('main')

@section('content')

<h1>Details for month: {{$month}}</h1>

@include('subviews.earnings-list')
@include('subviews.expenses-list')
@include('subviews.total-expenses')
@include('subviews.limits')
@include('subviews.diff')
@include('subviews.total-discounts')
@include('subviews.money-left')
@include('subviews.months')


@stop
