<?php namespace finla\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;

class EntryController extends Controller
{

	public function form()
	{
		$table = Request::input('entry');
		return view('add-entry')->with('table', $table);
	}

	public function addEntry()
	{
		$date = Request::input('date');
		$value = Request::input('value');
		$type = Request::input('type');
		$table = Request::input('table');

		DB::insert('insert into '.$table.' values (null, ?, ?, ?)', array($date, $value, $type));
		return 'Entry added!';
	}

	public function list()
	{
		//make this method usable to list expenses
		$list = DB::select("select date, value, type from earnings");
		return view('total-earnings')->with('list', $list);
	}
	public function choose()
	{
		return view('choose');
	}
}