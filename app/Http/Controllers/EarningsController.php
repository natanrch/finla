<?php namespace finla\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;

class EarningsController extends Controller
{

	public function form()
	{
		$table = Request::input('entry');
		return view('add-earning')->with('table', $table);
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
		$list = DB::select("select date, value, type from earnings");
		return view('total-earnings')->with('list', $list);
		// $html = '<ul>';
		// foreach ($list as $l) {
		// 	$html .= '<li> Date: '.$l->date.', Value: '.$l->value.', Type: '.$l->type.'</li>';
		// }
		// $html .= '</ul>';
		// return $html;
	}
	public function choose()
	{
		return view('choose');
	}
}