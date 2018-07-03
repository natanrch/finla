<?php namespace finla\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;
use finla\CategoryExpense;

class CategoryExpenseController
{

	public function form()
	{
		return view('form-category');
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

		$categoryExpense = new CategoryExpense;
		$categoryExpense->name = $name;
		$categoryExpense->save();
		return 'Category successfully inserted!';
	}
}