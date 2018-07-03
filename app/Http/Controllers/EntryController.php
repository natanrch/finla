<?php namespace finla\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;

class EntryController extends Controller
{

	public function form()
	{
		$table = Request::input('entry');
		$categories = DB::select('SELECT * FROM categories_'.$table);
		return view('form')->with(['table' => $table, 'categories' => $categories]);
	}

	public function addEntry()
	{
		$date = Request::input('date');
		$value = Request::input('value');
		$category = Request::input('category');
		$table = Request::input('table');

		DB::insert('insert into '.$table.' values (null, ?, ?, ?)', array($date, $value, $category));
		return 'Entry added!';
	}

	public function chooseEntry()
	{
		return view('choose')->with(['section' => 'form']);
	}

	public function chooseList()
	{
		return view('choose')->with(['section' => 'list']);
	}

	public function list()
	{
		$table = Request::input('entry');
		//make this method usable to list expenses
		$list = DB::select("SELECT e.id, e.date, e.value, c.name from ".$table." as e 
			join categories_".$table." as c 
			on e.category_".$table."_id = c.id
			ORDER BY e.date");
		$sum = DB::table($table)->sum('value');
		return view('total-entries')->with(['list' => $list, 'entry' => $table, 'sum' => $sum]);
	}

	public function listMonth()
	{
		$month = Request::input('month');
		$table = Request::input('entry');
		//make this method usable to list expenses
		$list = DB::select("SELECT e.id, e.date, e.value, c.name from ".$table." as e 
			join categories_".$table." as c 
			on e.category_".$table."_id = c.id
			WHERE month(e.date) = ".$month."
			ORDER BY e.date");
		$sum = DB::table($table)->where(DB::raw('month(date)'), '=', $month)->sum('value');
		$limits = $this->limits($month);
		$totalExpenses = $this->totalExpensesByCategories($month);
		$diff = $this->calcDiff($month);
		return view('total-entries')->with(['list' => $list, 'entry' => $table, 'sum' => $sum, 'limits' => $limits, 'totalExpenses' => $totalExpenses, 'diff' => $diff]);
	}

	private function totalExpensesByCategories($month)
	{
		$categories = array();
		$expenses = array();
		$list = DB::select("SELECT e.value, c.name, e.category_expenses_id from expenses as e 
			join categories_expenses as c
			on e.category_expenses_id = c.id");
		foreach ($list as $l) {
			if(!in_array($l->category_expenses_id, $categories)){
				$categories[$l->category_expenses_id] = $l->name;
			}
		}
		foreach ($categories as $key => $value) {
			$sum = DB::table('expenses')->where('category_expenses_id', '=', $key)->where(DB::raw('month(date)'), '=', $month)->sum('value');
			$expenses[$value] = $sum;
		}
		//return view('test')->with(['categories' => $categories, 'expenses' => $expenses]);
		return $expenses;
	}

	private function limits($month)
	{
		$limits = DB::select("SELECT l.id, l.category_expenses_id, l.value, c.name from limits as l
			join categories_expenses as c
			on l.category_expenses_id = c.id
			where month = ".$month);
		return $limits;
	}

	public function limitsTest($month)
	{
		
		$limits = array();
		$list = DB::select("SELECT l.id, l.category_expenses_id, l.value, c.name from limits as l
			join categories_expenses as c
			on l.category_expenses_id = c.id
			where month = ".$month);
		foreach($list as $l)
		{
			$limits[$l->name] = $l->value;
		}
		return $limits;
	}

	public function calcDiff($month)
	{
		
		$expenses = $this->totalExpensesByCategories($month);
		$limits = $this->limitsTest($month);
		$diff = array();
		foreach ($limits as $key => $value) {
			if(array_key_exists($key, $expenses)) {
				//echo $key.": ". ($value - $expenses[$key]).'<br>';
				$diff[$key] = ($value - $expenses[$key]);
			} else {
				$diff[$key] = $value;
			}
		}
		return $diff;
	}
}