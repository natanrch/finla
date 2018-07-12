<?php namespace finla\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;
use finla\Discount;

class DiscountController
{



	public function main()
	{
		$list = $this->select();
		return view('main-discount')->with(['list' => $list]);
	}


	public function select()
	{
		$all = Discount::all();
		return $all;
	}

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