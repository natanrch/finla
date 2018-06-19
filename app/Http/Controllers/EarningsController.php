<?php namespace finla\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;

class EarningsController extends Controller
{

	public function form()
	{
		return view('register-earning');
	}
	public function add()
	{
		$date = Request::input('date');
		$value = Request::input('value');
		$type = Request::input('type');

		DB::insert('insert into earnings values (null, ?, ?, ?)', array($date, $value, $type));
		return 'Produto adicionado!';
	}
}