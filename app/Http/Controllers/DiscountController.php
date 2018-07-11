<?php namespace finla\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;
use finla\Discount;

class DiscountController
{



	public function form()
	{
		return view('form-discount');
	}

/*
	public function select()
	{
		$all = CategoryExpense::all();
		foreach ($all as $a) {
			echo $a->name.'<br>';
		}
	}
*/
	public function save()
	{
		$name = Request::input('name');
		$value = Request::input('value');
		$month = Request::input('month');
		$year = Request::input('year');

		$discount = new Discount;

		$discount->name = $name;
		$discount->value = $value;
		$discount->month = $month;
		$discount->year = $year;
		$discount->save();
		return 'Discount successfully inserted!';
	}

}