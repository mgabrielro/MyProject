<?php

class Controller_Dashboard extends Controller_Hybrid
{
	public function before()
	{
		//parent::before();
		if ( ! \Session::get('username') ) {
			\Session::set_flash('error', 'Please login first !');
			\Response::redirect('account/login');
		}
	}

	public function action_index()
	{
		return \Response::forge(View::forge('dashboard'));
	}
}