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

	public function listCategoriesEarnings()
	{
		$allEarnings = CategoryEarning::all();
		return $allEarnings;
	}

	public function allCategories()
	{
		$allEarnings = $this->listCategoriesEarnings();
		$allExpenses = $this->listCategoriesExpenses();
		return view('main-category')->with(['allEarnings' => $allEarnings, 'allExpenses' => $allExpenses]);
	}

	public function listCategoriesExpenses()
	{
		$allExpenses = CategoryExpense::all();
		return $allExpenses;
	}


	public function choose()
	{
		return view('choose')->with(['section' => 'form-category']);
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
		return redirect('categories')->withInput();
	}

	public function delete()
	{
		$id = Request::input('id');
		$category = Request::input('category');
		if($category == 'expense') {
			CategoryExpense::where('id', $id)->delete();
		}
		if($category == 'earning') {
			CategoryEarning::where('id', $id)->delete();
		}
		return redirect('categories')->withInput();
		
	}
}