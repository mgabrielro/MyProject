<?php

//use \Model\Auth_User;

class Controller_Account  extends Controller_Hybrid
{
	public function before()
	{
		//parent::before();
	}


	public function action_index()
	{
		return \Response::forge(View::forge('account/login'));
	}


	public function action_login()
	{	
		// Already logged in
		\Session::get('user_id') and Response::redirect('dashboard');

		$val = \Validation::forge();

		if (\Input::method() == 'POST')
		{
			//echo '<pre>'; print_r(\Input::post()); exit;

			/* Validations rules */

				$val->add('email', 'Email')
						->add_rule('required');

				$val->add('password', 'Password')
						->add_rule('required');

			/* -------------------------- */

			//try to find the user in our DB
			if ($val->run())
			{
				if ( $user = \Model_User::exists(\Input::post('email'), \Input::post('password')) )
				{						
					// login the user
					if (\Session::set('username', $user->username))
					{						 
						\View::set_global('current_user', $user);

						\Session::set_flash('success', 'You are logged in');
						\Response::redirect('dashboard');
					}
					else
					{
						\Session::set_flash('error', 'Unable to login !');
					}
				}
				else
				{
					\Session::set_flash('error', 'This user is not in the system !');
				}
			}
		}

		return Response::forge(View::forge('account/login', array('val'=>$val)));
	}

	
	public function action_register()
	{
		$val = \Validation::forge();
		
		if (\Input::method() == 'POST')
		{
			//echo '<pre>'; print_r(\Input::post()); exit;

			/* Validation rules */
				$val->add('first_name', 'first_name')
						->add_rule('required')
						->add_rule('trim');

				$val->add('last_name', 'last_name')
						->add_rule('required')
						->add_rule('trim');

				$val->add('email', 'email')
						->add_rule('required')
						->add_rule('trim')
						->add_rule('valid_email');

				$val->add('password', 'password')
						->add_rule('required')
						->add_rule('trim')
						->add_rule('min_length', 4);

				$val->add('password1', 'repeat-same-password')
						->add_rule('required')
						->add_rule('trim')
						->add_rule('min_length', 4)
						->add_rule('match_value', \Input::post('password'), true);
			/* end of Validation rules */

			if ($val->run())
			{	
				$first_name	  = trim(\Input::post('first_name', ''));
				$last_name	  = trim(\Input::post('last_name', ''));

				$username	  = trim(strtolower(\Input::post('email')));
				
				$email		  = trim(strtolower(\Input::post('email')));
				$password	  = \Input::post('password');

				// if the user exists in our DB
				if ($user = \Auth_User::find_by_email($email))
				{
					// ??? (no check for password, better redirect to login)
					\Auth::instance()->force_login((int) $user->id);
					
					\View::set_global('current_user', $user);

					\Response::redirect('dashboard');
				}
				else
				{
				 	//the user DOESN'T exists in our DB
					try
					{
						// call Auth to create this user
						$created = \Auth::create_user(
							$username,
							$password,
							$email,
							\Config::get('application.user.default_group', 3), //3 is for regular user
							array(
								//'fullname' => $fullname,		// for metadata
							)
						);

						if ($created)
						{
							// get the current logged-in user
							$user = \Auth_User::find_by_username($username);

							\View::set_global('current_user', $user);
						}
						else
						{
							Session::set_flash('error', 'account-creation-failed');
							\Response::redirect_back('account/login');
						}
					}
					// catch exceptions from the create_user() call
					catch (\SimpleUserUpdateException $e)
					{
						if ($e->getCode() == 2) {
							\Session::set_flash('error', 'email-already-exists');
						}
						elseif ($e->getCode() == 3) {
							\Session::set_flash('error', 'username-already-exists');
						}
						else {
							\Session::set_flash('error', $e->getMessage());
						}
					}
				}
			}
		}

		return \Response::forge(\View::forge('account/register')->set('val', $val));
	}


	public function action_logout()
	{
		\Session::delete('user_id');
		\Session::delete('username');

		\Session::set_flash('success', 'You are logged out');

		\Response::redirect('account/login');
	}

}

