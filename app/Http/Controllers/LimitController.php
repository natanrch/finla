<?php namespace finla\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;
use finla\Limit;

class LimitController
{
	public function main()
	{
		$list = DB::select("SELECT l.id, l.category_expenses_id, l.value, l.month, l.year, c.name from limits as l join categories_expenses as c on l.category_expenses_id = c.id");
		$categories = DB::select('SELECT * FROM categories_expenses');
		return view('main-limit')->with(['list' => $list, 'categories' => $categories]);
	}

	public function save()
	{
		$category = Request::input('category');
		$value = Request::input('value');
		$month = Request::input('month');
		$year = Request::input('year');

		$limit = new Limit;

		$limit->category_expenses_id = $category;
		$limit->value = $value;
		$limit->month = $month;
		$limit->year = $year;
		$limit->save();

		return redirect('limits')->withInput();

	}
}