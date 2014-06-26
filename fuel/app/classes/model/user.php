<?php

use Orm\Model;

class Model_User extends Model
{

	/**
	 * @var  string  table name to overwrite assumption
	 */
	protected static $_table_name = 'users';


	/**
	 * @var array	model properties
	 */
	protected static $_properties = array(
		
		'id',

		'username'        => array(
			'label'		  => 'lang.register.username',
			'default' 	  => 0,
			'null'		  => false,
			'validation'  => array('required', 'max_length' => array(255))
		),

		'email'           => array(
			'label'		  => 'lang.register.email',
			'default' 	  => 0,
			'null'		  => false,
			'validation'  => array('required', 'valid_email')
		),

		'group_id'        => array(
			'label'		  => 'auth_model_user.group_id',
			'default' 	  => 0,
			'null'		  => false,
			'form'  	  => array('type' => 'select'),
			'validation'  => array('required', 'is_numeric')
		),

		'password'        => array(
			'label'		  => 'lang.register.password',
			'default' 	  => 0,
			'null'		  => false,
			'form'  	  => array('type' => 'password'),
			'validation'  => array('min_length' => array(8), 'match_field' => array('confirm'))
		),

		'last_login'	  => array(
			'form'  	  => array('type' => false),
		),

		'previous_login'  => array(
			'form'  	  => array('type' => false),
		),

		'login_hash'	  => array(
			'form'  	  => array('type' => false),
		),

		'user_id'         => array(
			'default' 	  => 0,
			'null'		  => false,
			'form'  	  => array('type' => false),
		),

		'profile_type'         => array(
			'default' 	  => 0,
			'null'		  => false,
			'form'  	  => array('type' => false),
		),
		
		'confirmation_hash' => array(
			'default' 	  => '',
			'null'		  => false,
			'form'  	  => array('type' => false),
		),
		
		'confirmation_created' => array(
			'default' 	  => 0,
			'null'		  => false,
			'form'  	  => array('type' => false),
		),
		
		'forgotpassword_hash' => array(
			'default' 	  => '',
			'null'		  => false,
			'form'  	  => array('type' => false),
		),
		
		'forgotpassword_created' => array(
			'default' 	  => 0,
			'null'		  => false,
			'form'  	  => array('type' => false),
		),

		'resetpassword_hash' => array(
			'default' 	  => '',
			'null'		  => false,
			'form'  	  => array('type' => false),
		),
		
		'resetpassword_created' => array(
			'default' 	  => 0,
			'null'		  => false,
			'form'  	  => array('type' => false),
		),

		'confirmed' => array(
			'default' 	  => 0,
			'null'		  => false,
			'form'  	  => array('type' => false),
		),

        'newsletter' => array(
            'default'     => 1,
            'null'        => false,
            'form'        => array('type' => false),
        ),

		'created_at'      => array(
			'default' 	  => 0,
			'null'		  => false,
			'form'  	  => array('type' => false),
		),

		'updated_at'      => array(
			'default' 	  => 0,
			'null'		  => false,
			'form'  	  => array('type' => false),
		),
	);


	/**
	 * @var array	defined observers
	 */
	protected static $_observers = array(
		'Orm\\Observer_CreatedAt' => array(
			'events'          => array('before_insert'),
			'property'        => 'created_at',
			'mysql_timestamp' => false
		),
		'Orm\\Observer_UpdatedAt' => array(
			'events'          => array('before_update'),
			'property'        => 'updated_at',
			'mysql_timestamp' => false
		),
		'Orm\\Observer_Typing' => array(
			'events' => array('after_load', 'before_save', 'after_save')
		),
		'Orm\\Observer_Self' => array(
			'events'   => array('before_insert', 'before_update'),
			'property' => 'user_id'
		),
	);


	public static function exists($email, $password)
	{
		$query = DB::query("SELECT * FROM users WHERE email = :email AND password = :password LIMIT 1");
		
		$query->parameters(array('email' => $email, 'password' => $password));

		$result = \DB::query($query)->as_object('Model_User')->execute();

		return isset($result[0]) ? $result[0] : null;
	}


	/**
	 * set a new username for this user
	 * 
	 * @param  string   $newUsername [the new username]
	 * @return boolean
	 */
	public function setUsername($id, $newUsername)
	{
		if ($user = \Model_User::find($id)) {
			
			$user->username = $newUsername;

			if ($user->save()) {
				return true;
			}
		}

		return false;
	}


	/**
	 * set a new email for this user
	 * 
	 * @param  string   $newEmail [the new email]
	 * @return boolean
	 */
	public function setEmail($id, $newEmail)
	{
		if ($user = \Model_User::find($id)) {
			
			$user->email = $newEmail;

			if ($user->save()) {
				return true;
			}
		}

		return false;
	}

}