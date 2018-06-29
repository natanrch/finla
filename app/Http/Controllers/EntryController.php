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

	public function list()
	{
		$table = Request::input('entry');
		//make this method usable to list expenses
		$list = DB::select("SELECT e.id, e.date, e.value, c.name from ".$table." as e 
			join categories_".$table." as c 
			on e.category_".$table."_id = c.id
			ORDER BY e.date");
		$sum = DB::table($table)->sum('value');
		//$sum = DB::select("SELECT sum(value) from ".$table);
		return view('total-entries')->with(['list' => $list, 'entry' => $table, 'sum' => $sum]);
	}

	public function listMonth()
	{
		$table = 'earnings';
		//make this method usable to list expenses
		$list = DB::select("SELECT e.id, e.date, e.value, c.name from ".$table." as e 
			join categories_".$table." as c 
			on e.category_".$table."_id = c.id
			WHERE month(e.date) = 05
			ORDER BY e.date");
		$sum = DB::table($table)->where(DB::raw('month(date)'), '=', '06')->sum('value');
		return view('total-entries')->with(['list' => $list, 'entry' => $table, 'sum' => $sum]);
	}

	public function chooseEntry()
	{
		return view('choose')->with(['section' => 'form']);
	}

	public function chooseList()
	{
		return view('choose')->with(['section' => 'list']);
	}
}