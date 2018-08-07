<?php namespace finla\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;
use finla\Limit;
use DateTime;

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

	public function formMonthLimits()
	{
		$categories = array();
		$currentLimits = array();
		$list = DB::select("SELECT c.name, l.category_expenses_id from limits as l 
			join categories_expenses as c
			on l.category_expenses_id = c.id");
		foreach ($list as $l) {
			if(!in_array($l->category_expenses_id, $categories)){
				$categories[$l->category_expenses_id] = $l->name;
				$currentLimit = $this->currentLimit($l->category_expenses_id);
				$currentLimits[$l->category_expenses_id] = $currentLimit;
			}
		}
		return view('test')->with(['categories' => $categories, 'currentLimits' => $currentLimits]);
	}

	private function currentLimit($categoryExpense)
	{
		$dateTime = new DateTime;
		$month = $dateTime->format('m');
		$currentLimit = DB::select("SELECT c.name, l.category_expenses_id, l.value from limits as l join categories_expenses as c on l.category_expenses_id = c.id where  (category_expenses_id = ".$categoryExpense." and month = ".$month.")");
		if(empty($currentLimit)) {
			while(empty($currentLimit) and $month > 0) {
				$month = $month - 1;
				$currentLimit = DB::select("SELECT c.name, l.category_expenses_id, l.value from limits as l join categories_expenses as c on l.category_expenses_id = c.id where  (category_expenses_id = ".$categoryExpense." and month = ".$month.")");
			}

		}
		return $currentLimit;
	}

	public function newMonthLimits()
	{
		$dateTime = new DateTime;
		$month = $dateTime->format('m');
		$year = $dateTime->format('Y');
		$all = Request::all();
		foreach ($all as $key => $value) {
			if($key != '_token') {

				$limit = new Limit;

				$limit->category_expenses_id = $key;
				$limit->value = $value;
				$limit->month = $month;
				$limit->year = $year;
				$limit->save();	
			}
		}
		return redirect('limits')->withInput();
	}

	public function delete()
	{
		$id = Request::input('id');
		
		Limit::where('id', $id)->delete();
		
		return redirect('limits')->withInput();
		
	}
}