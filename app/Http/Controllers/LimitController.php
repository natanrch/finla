<?php namespace finla\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;
use finla\Limit;

class LimitController
{
	public function main()
	{
		$list = DB::select("SELECT l.id, l.category_expenses_id, l.value, l.month, l.year, c.name from limits as l join categories_expenses as c on l.category_expenses_id = c.id");
		return view('main-limit')->with(['list' => $list]);
	}
}