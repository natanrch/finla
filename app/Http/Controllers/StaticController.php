<?php namespace finla\Http\Controllers;

class StaticController
{
	public function mainPage()
	{
		return view('start');
	}
}