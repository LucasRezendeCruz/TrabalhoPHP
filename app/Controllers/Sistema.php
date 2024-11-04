<?php

namespace App\Controllers;

class Sistema extends BaseController
{
	/**
	 * home
	 *
	 * @return void
	 */
	public function home()
	{
		return view('admin/home');
	}
}