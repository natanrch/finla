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
		
		//make this method usable to list expenses
		$list = DB::select("SELECT e.id, e.date, e.value, c.name from earnings as e 
			join categories_earnings as c 
			on e.category_earnings_id = c.id");
		return view('total-earnings')->with(['list' => $list]);
	}
	public function chooseEntry()
	{
		return view('choose-entry');
	}
}