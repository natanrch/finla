<?php namespace finla\Http\Controllers;

class StaticController
{
	public function mainPage()
	{
		return view('start');
	}

	public function details()
	{
		return view('details');
	}
}