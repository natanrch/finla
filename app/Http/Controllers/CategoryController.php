<?php namespace finla\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;
use finla\CategoryExpense;
use finla\CategoryEarning;

class CategoryController
{

	public function form()
	{
		$table = Request::input('entry');
		return view('form-category')->with(['table' => $table]);
	}

	public function choose()
	{
		return view('choose')->with(['section' => 'form-category']);
	}

	public function select()
	{
		$all = CategoryExpense::all();
		foreach ($all as $a) {
			echo $a->name.'<br>';
		}
	}

	public function save()
	{
		$name = Request::input('name');
		$table = Request::input('table');

		if ($table == 'expenses') {
			$category = new CategoryExpense;
		}
		if ($table == 'earnings') {
			$category = new CategoryEarning;
		}

		$category->name = $name;
		$category->save();
		return 'Category successfully inserted!';
	}
}