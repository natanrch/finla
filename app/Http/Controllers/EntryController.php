<?php namespace finla\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;
use finla\Earning;

class EntryController extends Controller
{

	public function addEntry()
	{
		$date = Request::input('date');
		$value = Request::input('value');
		$category = Request::input('category');
		$table = Request::input('table');

		DB::insert('insert into '.$table.' values (null, ?, ?, ?)', array($date, $value, $category));
		return redirect('/'.$table)->withInput();
	}

	public function chooseEntry()
	{
		return view('choose')->with(['section' => 'form']);
	}

	public function chooseList()
	{
		return view('choose')->with(['section' => 'list']);
	}
	public function listTotalEarnings()
	{
		$list = DB::select("SELECT e.id, e.date, e.value, c.name from earnings as e 
			join categories_earnings as c 
			on e.category_earnings_id = c.id
			ORDER BY e.date");
		$sum = DB::table('earnings')->sum('value');
		$categories = DB::select('SELECT * FROM categories_earnings');
		return view('total-entries')->with(['list' => $list, 'entry' => 'earnings', 'sum' => $sum, 'categories' => $categories]);
	}

	public function listTotalExpenses()
	{
		$list = DB::select("SELECT e.id, e.date, e.value, c.name from expenses as e 
			join categories_expenses as c 
			on e.category_expenses_id = c.id
			ORDER BY e.date");
		$sum = DB::table('expenses')->sum('value');
		$categories = DB::select('SELECT * FROM categories_expenses');
		return view('total-entries')->with(['list' => $list, 'entry' => 'expenses', 'sum' => $sum, 'categories' => $categories]);
	}

	public function listMonth()
	{
		$month = Request::input('month');
		$listExpenses = $this->listExpenses($month);
		$sumExpenses = $this->sumExpenses($month);
		$listEarnings = $this->listEarnings($month);
		$sumEarnings = $this->sumEarnings($month);
		$limits = $this->limitsList($month);
		$totalExpenses = $this->totalExpensesByCategories($month);
		$diff = $this->calcDiff($month);
		$discounts = $this->totalDiscounts($sumEarnings, $month);
		$moneyLeft = $this->calcMoneyLeft($sumEarnings, $sumExpenses, $discounts);
		return view('details-month')->with(['listExpenses' => $listExpenses, 'sumExpenses' => $sumExpenses, 'listEarnings' => $listEarnings, 'sumEarnings' => $sumEarnings, 'limits' => $limits, 'totalExpenses' => $totalExpenses, 'diff' => $diff, 'month' => $month, 'discounts' => $discounts, 'moneyLeft' => $moneyLeft]);
	}

	private function listExpenses($month)
	{
		$listExpenses = DB::select("SELECT e.id, e.date, e.value, c.name from expenses as e 
			join categories_expenses as c 
			on e.category_expenses_id = c.id
			WHERE month(e.date) = ".$month."
			ORDER BY e.date");
		return $listExpenses;
	}

	private function sumExpenses($month)
	{
		$sumExpenses = DB::table('expenses')->where(DB::raw('month(date)'), '=', $month)->sum('value');
		return $sumExpenses;
	}

	private function listEarnings($month)
	{
		$listEarnings = DB::select("SELECT e.id, e.date, e.value, c.name from earnings as e 
			join categories_earnings as c 
			on e.category_earnings_id = c.id
			WHERE month(e.date) = ".$month."
			ORDER BY e.date");
		return $listEarnings;
	}

	private function sumEarnings($month)
	{
		$sumEarnings = DB::table('earnings')->where(DB::raw('month(date)'), '=', $month)->sum('value');
		return $sumEarnings;
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

	private function limitsList($month)
	{
		$limits = DB::select("SELECT l.id, l.category_expenses_id, l.value, c.name from limits as l
			join categories_expenses as c
			on l.category_expenses_id = c.id
			where month = ".$month);
		if (empty($limits)) {
			while(empty($limits) and $month > 0) {
				$month = $month - 1;
				$limits = DB::select("SELECT l.id, l.category_expenses_id, l.value, c.name from limits as l
				join categories_expenses as c
				on l.category_expenses_id = c.id
				where month = ".$month);
			}
		}
		return $limits;
	}

	private function limitsWithRef($month)
	{
		
		$limits = array();
		$list = $this->limitsList($month);
		foreach($list as $l)
		{
			$limits[$l->name] = $l->value;
		}
		return $limits;
	}

	private function calcDiff($month)
	{
		
		$expenses = $this->totalExpensesByCategories($month);
		$limits = $this->limitsWithRef($month);
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

	private function totalDiscounts($sumEarnings, $month)
	{
		$percentage = DB::table('discounts')->where('month', '=', $month)->sum('value');
		if (empty($percentage)) {
			while(empty($percentage) and $month > 0) {
				$month = $month - 1;
				$percentage = DB::table('discounts')->where('month', '=', $month)->sum('value');
			}
		}
		$totalDiscounts = ($sumEarnings * $percentage)/100;
		return $totalDiscounts; 
	}

	private function calcMoneyLeft($sumEarnings, $sumExpenses, $discounts)
	{
		$moneyLeft = $sumEarnings - $sumExpenses - $discounts;
		return $moneyLeft;
	}
}